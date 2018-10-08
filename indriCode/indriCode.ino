#include <SPI.h>              //tambahkan librari spi
#include <MFRC522.h>          //tambahkan library untuk rfid
#include <ESP8266WiFi.h>      //tambahkan library wifi

#define PD_SCK  5             //definisi pin yg di gunakan pada port SCK load cell
#define DOUT  4               //definisi pin yg digunakan di DOUT
#define GAIN  1               //penguatan 1x
#define calibration_factor -10095.0 //nilai kalibrasi loadcell

#define buzzer  15  //pin pada buzzer

float SCALE;        
long OFFSET;
float toKg;

const char* ssid = "SFE";             //SSID wifi yg akan di gunakan
const char* password = "7777777777";  //password wifi
WiFiServer server(80);                //port yg digunakan
const char* host = "bumilproject.000webhostapp.com";  //alamat website
unsigned long timeout;  

constexpr uint8_t RST_PIN = 3;     // Configurable, see typical pin layout above
constexpr uint8_t SS_PIN = 2;     // Configurable, see typical pin layout above
 
MFRC522 rfid(SS_PIN, RST_PIN); // Instance of the class

MFRC522::MIFARE_Key key;  //object untuk RFID 

// Init array that will store new NUID 
byte nuidPICC[4];

void setup() { 
  Serial.begin(9600);     //kecepatan pertukaran data nodemcu dengan PC
  Serial.println();
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);
  WiFi.begin(ssid, password);                 //lakukan koneksi ke WIFI
  while (WiFi.status() != WL_CONNECTED) {     //tunggu koneksi dengan WIFI
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.println("WiFi connected");         //jika berhasil terkoneksi print pesan ke serial komunikasi
  delay(5000);
  SPI.begin(); // Init SPI bus
  rfid.PCD_Init(); // Init MFRC522 
  for (byte i = 0; i < 6; i++) {
    key.keyByte[i] = 0xFF;                  //kosongkan semua variable yg digunakan untuk menyimpan data nilai RFID
  }
  Serial.println(F("This code scan the MIFARE Classsic NUID."));
  Serial.print(F("Using the following key:"));
  printHex(key.keyByte, MFRC522::MF_KEY_SIZE);
  
  pinMode(PD_SCK, OUTPUT);          //setting pin SCK sebagai output
  pinMode(DOUT, INPUT);             //setting DOUT pin sebagai input
  pinMode(buzzer, OUTPUT);
  digitalWrite(PD_SCK, LOW);        
  readHx();                         //panggil function readHx() [ada di bawah]
  set_scale(calibration_factor);    //set kalibrasi factor [lihat variable calibration factor]
  tare(10);                         //setting nilai tare dari HX711
  digitalWrite(buzzer, HIGH);
  delay(100);
  digitalWrite(buzzer, LOW);
  delay(50);
  digitalWrite(buzzer, HIGH);
  delay(100);
  digitalWrite(buzzer, LOW);
  Serial.println("starting...");
}
int x=4;
void loop() {
  toKg = get_units(1)*0.453592;           //conversi ke KG
  Serial.print("Reading: ");
  Serial.print(get_units(1), 1); //scale.get_units() returns a float
  Serial.print(" lbs "); //You can change this to kg but you'll need to refactor the calibration_factor
  Serial.print(toKg);
  Serial.println(" Kg");
 
  // Look for new cards
  if ( ! rfid.PICC_IsNewCardPresent())  //jika ada kartu RFID baru
    return;

  // Verify if the NUID has been readed
  if ( ! rfid.PICC_ReadCardSerial())  //baca kartu yg terdeteksi
    return;

  Serial.print(F("PICC type: "));
  MFRC522::PICC_Type piccType = rfid.PICC_GetType(rfid.uid.sak);  //baca tipe dari RFID
  Serial.println(rfid.PICC_GetTypeName(piccType));

  // Check is the PICC of Classic MIFARE type
  if (piccType != MFRC522::PICC_TYPE_MIFARE_MINI &&  
    piccType != MFRC522::PICC_TYPE_MIFARE_1K &&
    piccType != MFRC522::PICC_TYPE_MIFARE_4K) {
    Serial.println(F("Your tag is not of type MIFARE Classic.")); //jika card reader tidak sesuai dengan tipe pembacanya
    return;
  }
    Serial.println(F("The NUID tag is:"));
    Serial.print(F("In hex: "));
    printHex(rfid.uid.uidByte, rfid.uid.size);    //tampilkan nilai hexa dari RFID
    Serial.println();
    Serial.print(F("In dec: "));
    printDec(rfid.uid.uidByte, rfid.uid.size);    //tampilkan nilai decimal dari RFID
    Serial.println();
    
    if(rfid.uid.uidByte[0] != 0 && rfid.uid.uidByte[1] != 0
      && rfid.uid.uidByte[2] != 0 && rfid.uid.uidByte[3] != 0)  //jika ada new card terdeteksi
    {
      Serial.print("connecting to ");
      Serial.println(host);
      
      // Use WiFiClient class to create TCP connections
      WiFiClient client;
      const int httpPort = 80;
      if (!client.connect(host, httpPort)) {          //koneksikan ke webserver
        Serial.println("connection failed");
        return;
      }
      String url = "/getRfid.php";                    //file yg akan di akses dari webserver

      String valRfid = String(rfid.uid.uidByte[0]);   //kirim nilai dari RFID
      valRfid += ",";
      valRfid += String(rfid.uid.uidByte[1]);
      valRfid += ",";
      valRfid += String(rfid.uid.uidByte[2]);
      valRfid += ",";
      valRfid += String(rfid.uid.uidByte[3]);

      if(toKg <= 5)                                   //RFID untuk daftar new card
      {
        url += "?rfid="+valRfid;                      //hanya di kirim nilai RFID saja
      }
      else                                            //jika tidak untuk daftar maka..
      {
        url += "?rfid="+valRfid+"&berat="+String(toKg);   //kirimkan nilai RFID dan nilai berat
      }
      Serial.print("Requesting URL: ");
      Serial.println(url);
      // This will send the request to the server
      client.print(String("GET ") + url + " HTTP/1.1\r\n" +   //kirim data ke webserver dengan metode GET
                   "Host: " + host + "\r\n" + 
                   "Connection: close\r\n\r\n");
      timeout = millis();
      while (client.available() == 0) {
        if (millis() - timeout > 5000) {                      //jika tidak ada balasan dari server selama 5 detik maka di anggap RTO
          Serial.println(">>> Client Timeout !");
          client.stop();                                      //close client
          return;
        }
      }
      
      // Read all the lines of the reply from server and print them to Serial
      while(client.available()){                            //read data serial dari server
        String line = client.readStringUntil('\r');
        Serial.print(line);                                 //tampilkan balasan ke serial monitor
      }
      
      Serial.println();
      Serial.println("closing connection");

      digitalWrite(buzzer, HIGH);                         //nyalakan buzzer
      delay(100);
      digitalWrite(buzzer, LOW);
      delay(50);
      digitalWrite(buzzer, HIGH);
      delay(100);
      digitalWrite(buzzer, LOW);
      
      delay(5000);
      rfid.uid.uidByte[0]=0;
      rfid.uid.uidByte[0]=0;
      rfid.uid.uidByte[0]=0;
      rfid.uid.uidByte[0]=0;
    }
  // Halt PICC
  rfid.PICC_HaltA();                        //matikan pembacaan rfid

  // Stop encryption on PCD
  rfid.PCD_StopCrypto1();                 //stop enksipsi dari RFID
  
}


/**
 * Helper routine to dump a byte array as hex values to Serial. 
 */
void printHex(byte *buffer, byte bufferSize) {    //fungsi untuk menampilkan nilai hexa dari RFID
  for (byte i = 0; i < bufferSize; i++) {
    Serial.print(buffer[i] < 0x10 ? " 0" : " ");
    Serial.print(buffer[i], HEX);
  }
}

/**
 * Helper routine to dump a byte array as dec values to Serial.
 */
void printDec(byte *buffer, byte bufferSize) {      //fungsi untuk menampilkan nilai desimal dari RFID
  for (byte i = 0; i < bufferSize; i++) {
    Serial.print(buffer[i] < 0x10 ? " 0" : " ");
    Serial.print(buffer[i], DEC);
  }
}

long readHx() {                           //fungsi untuk pembacaan nilai load cell
  // wait for the chip to become ready
  while (!is_ready());
    unsigned long valueData = 0;
    byte data[3] = { 0 };
    byte filler = 0x00;

  // pulse the clock pin 24 times to read the data
    data[2] = shiftIn(DOUT, PD_SCK, MSBFIRST);
    data[1] = shiftIn(DOUT, PD_SCK, MSBFIRST);
    data[0] = shiftIn(DOUT, PD_SCK, MSBFIRST);

  // set the channel and the gain factor for the next reading using the clock pin
  for (unsigned int i = 0; i < GAIN; i++) {
    digitalWrite(PD_SCK, HIGH);
    digitalWrite(PD_SCK, LOW);
  }

    // Datasheet indicates the value is returned as a two's complement value
    // Flip all the bits
    data[2] = ~data[2];
    data[1] = ~data[1];
    data[0] = ~data[0];

    // Replicate the most significant bit to pad out a 32-bit signed integer
    if ( data[2] & 0x80 ) {
        filler = 0xFF;
    } else if ((0x7F == data[2]) && (0xFF == data[1]) && (0xFF == data[0])) {
        filler = 0xFF;
    } else {
        filler = 0x00;
    }

    // Construct a 32-bit signed integer
    valueData = ( static_cast<unsigned long>(filler) << 24
            | static_cast<unsigned long>(data[2]) << 16
            | static_cast<unsigned long>(data[1]) << 8
            | static_cast<unsigned long>(data[0]) );

    // ... and add 1
    return static_cast<long>(++valueData);
}
bool is_ready() {
  return digitalRead(DOUT) == LOW;
}
void set_scale(float scale) {
  SCALE = scale;
}
void tare(byte times) {
  double sum = read_average(times);
  set_offset(sum);
}
long read_average(byte times) {
  long sum = 0;
  for (byte i = 0; i < times; i++) {
    sum += readHx();
  }
  return sum / times;
}
void set_offset(long offset) {
  OFFSET = offset;
}
float get_units(byte times) {
  return get_value(times) / SCALE;
}
double get_value(byte times) {
  return read_average(times) - OFFSET;
}
