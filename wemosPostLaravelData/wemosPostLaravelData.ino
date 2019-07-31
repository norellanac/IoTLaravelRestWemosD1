#include <ESP8266WiFi.h>
#include <WiFiClient.h> 
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>
//https://github.com/esp8266/Arduino

// Incluimos librería
#include <DHT.h>
//adafruit
 
// Definimos el pin digital donde se conecta el sensor
#define DHTPIN D1
// Dependiendo del tipo de sensor
#define DHTTYPE DHT11
// Inicializamos el sensor DHT11
DHT dht(DHTPIN, DHTTYPE);

/* Set these to your desired credentials. */
const char *ssid = "DevOps";  //ENTER YOUR WIFI SETTINGS
const char *password = "Tenx6971";
const int   sleepMin=1;

//Web/Server address to read/write from 
const char *host = "192.168.43.128";   //https://circuits4you.com website or IP address of server


//=======================================================================
//                    Power on setup
//=======================================================================

void setup() { 
  Serial.begin(115200);
}

//=======================================================================
//                    Main Program Loop
//=======================================================================
void loop() {
  readConnectPost();
  
  //delay(1800000);
  Serial.print("zzzzZZZZZzzzz: ");
  Serial.print(sleepMin * 1000 *60 );
  WiFi.forceSleepBegin(15000);
  Serial.print(" zzzZZz por:  ");
  Serial.print(sleepMin);
  Serial.print(" minuto ");
  delay(sleepMin *60 *1000);
  
}



void readConnectPost(){
  dht.begin();// Comenzamos el sensor DHT
  String sensorData, Hum, Temp;
  // Leemos la humedad relativa
  float h = dht.readHumidity();
  Hum=String(h);
  // Leemos la temperatura en grados centígrados (por defecto)
  float t = dht.readTemperature();
  Temp=String(t);
  // Comprobamos si ha habido algún error en la lectura
  if (isnan(h) || isnan(t)) {
    Serial.println("Error obteniendo los datos del sensor DHT11");
    return;
  }
  Serial.print("Humedad: ");
  Serial.print(h);
  Serial.print(" %\t");
  Serial.print("Temperatura: ");
  Serial.print(t);
  Serial.println(" C");
  sensorData= "string1=Humedad&string2=Temperatura&number1="+ Hum + "&number2=" + Temp + "&method=POST"; 
  Serial.println(sensorData);

  WiFi.mode(WIFI_OFF);        //Prevents reconnection issue (taking too long to connect)
  delay(1000);
  WiFi.mode(WIFI_STA);        //This line hides the viewing of ESP as wifi hotspot
  
  WiFi.begin(ssid, password);     //Connect to your WiFi router
  Serial.println("");

  Serial.print("Connecting");
  // Wait for connection
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print("... ");
  }

  //If connection successful show IP address in serial monitor
  Serial.println("");
  Serial.print("Connected to ");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());  //IP address assigned to your ESP
  HTTPClient http;    //Declare object of class HTTPClient
  Serial.println("se creó el clinete Http");
  http.begin("http://192.168.1.126:3000/api/arduino");              //Specify request destination
  Serial.println("http://192.168.1.126:3000/api/arduino");
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");    //Specify content-type header

  int httpCode = http.POST(sensorData);   //Send the request
  String payload = http.getString();    //Get the response payload

  Serial.println(httpCode);   //Print HTTP return code
  Serial.println(payload);    //Print request response payload

  http.end();  //Close connection
  }
//=======================================================================
