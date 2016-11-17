//SSID + KEY
const char SSID_ESP[] = /*"MotoG3 4069";"KARMAN SINGH";/*"HaRrleen's iPhone"*/"karan";
const char SSID_PASS[] =/*"gurleenzzz";"parvinder";/*"123456789"*/"9810596666";

// URLs
String URL_webhost = "GET http://iot.hique.in/micro.php?te=";
//MODES
const char CWMODE = '1';//CWMODE 1=STATION, 2=APMODE, 3=BOTH
const char CIPMUX = '1';//CWMODE 0=Single Connection, 1=Multiple Connections


//DEFINE ALL FUNCTIONS HERE`
boolean setup_ESP();
boolean read_ESP(const char keyword1[], int key_size, int timeout_val, byte mode);
void serial_dump_ESP();
boolean connect_ESP();
void connect_webhost();

//DEFINE ALL GLOBAL VAARIABLES HERE
//int unit_id = 1;
int temp_value ;
int moist_value ;
int fan_value;
int pump_value;
int light_value;

 int duration,distance;
unsigned long timeout_start_val;
char data_from_ESP[20];//first byte is the length of bytes
char payload[150];
byte payload_size=0;
String URL_withPacket ;
String payload_closer = " HTTP/1.0\r\n\r\n";
const int tempPin=A0;
const int moistPin=A2;
const int trigPin=11;
const int  echoPin=12;
const int fanPin=4;
const int pumpPin=6;
const int lightPin=8;
char f_from_ESP;
char p_from_ESP;
char l_from_ESP;

//DEFINE KEYWORDS HERE
const char keyword_OK[] = "OK";
const char keyword_Ready[] = "ready";
const char keyword_co[]="WIFI CONNECTED";
const char keyword_con[]="CONNECT";
const char keyword_arrow[] = ">";
const char keyword_sendok[] = "SEND OK";
const char keyword_closed[] = "CLOSED";
const char keyword_f[] = "_f";
const char keyword_p[] = "_p";
const char keyword_l[] = "_l";
const char keyword_hash[] = "#";


void setup(){
  
  Serial2.begin(115200);//default baudrate for ESP
   Serial.begin(115200); //for status and debug
  pinMode(tempPin,INPUT);
  pinMode(moistPin,INPUT);
  pinMode(trigPin,OUTPUT);
  pinMode(echoPin,INPUT);
  pinMode(fanPin,OUTPUT);
  pinMode(pumpPin,OUTPUT);
  pinMode(lightPin,OUTPUT);
 
  setup_ESP(); 
}

void loop(){
   
  temp_value = analogRead(tempPin);
  temp_value=((5.0*temp_value*100.0)/1024.0);
   moist_value = analogRead(moistPin);
  moist_value=map(moist_value,1023,230,0,100);
  digitalWrite(trigPin,HIGH);
 delayMicroseconds(1000);
 digitalWrite(trigPin,LOW);
 duration=pulseIn(echoPin,HIGH);
 distance=(duration/2)*0.034; 
   connect_webhost();
  digitalWrite(fanPin,fan_value);
  digitalWrite(pumpPin,!pump_value);
  digitalWrite(lightPin,!light_value);
  

  delay(3000);//3 seconds between tries

}
