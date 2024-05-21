    #include <ESP8266WiFi.h>
    #include <DHT.h>
#include <DHT_U.h>
#define DHTPIN D2
  #define DHTTYPE DHT11
  DHT dht(DHTPIN, DHTTYPE);
  const char* ssid     = "POCOPHONE F1"; //SSID name
  const char* password = "123456789"; //Password

  const char* host = "192.168.43.228"; //ip address of the host you want to connect

  float temp;
  float humidity;
    
  void setup() {
    dht.begin();
  Serial.begin(9600);
  delay(10);

  Serial.println();
  Serial.println();
  Serial.print("Connecting...");
  Serial.println(ssid);

  WiFi.begin(ssid, password);

  while(WiFi.status() !=WL_CONNECTED)
  {
      delay(500);
      Serial.print(".");
      
  }

  Serial.println("");
  Serial.println("WiFi Connected");
  Serial.println("IP Address :");
  Serial.println(WiFi.localIP());


  }
  
  void loop() {
    
  Serial.print("Connecting to ");
  Serial.println(host);

  WiFiClient client;

  const int httpPort = 80; //port number
  if(!client.connect(host, httpPort)){
      Serial.println("connection Failed");
      return;  
    }
    humidity = dht.readHumidity();
	temp = dht.readTemperature();
  float t = dht.readTemperature(true);
  if(isnan(humidity) || isnan(t) || isnan(temp)){
    Serial.print("Failed");
    return;
  }
  Serial.print("Humidity: ");
  Serial.print(humidity);
  Serial.print(" %\t");
  Serial.print("Temperature: ");
  Serial.print(temp);
  Serial.print(" C");
  Serial.println();
    //Creating URI
    String url = "/temperature/nodecmu_insert.php?";
          url += "&temp=";
          url += temp;
          url += "&humidity=";
          url += humidity;

    Serial.print("Requesting URL :");
    Serial.println(url);

  //This will send the request to the server and print them
    client.print(String("GET /") + url + "HTTP/1.1\r\n" + 
                "HOST :" + host + "\r\n" + 
                "Connection: close \r\n\r\n");

    unsigned long timeout =millis();             
    while(client.available() == 0){
      if(millis() - timeout > 5000){
        Serial.println(">>>Client Timeout");
        client.stop();
        return;
        }
    }

    while(client.available()){
      String line = client.readStringUntil('\r');
      Serial.print(line);
    }
    Serial.println();
    Serial.println("Closing Connection");

  delay(5000);
  }