
void serial_dump_ESP(){
  char temp;
  while(Serial2.available()){
    temp =Serial2.read();
    delay(1);
  }
  
  
}
