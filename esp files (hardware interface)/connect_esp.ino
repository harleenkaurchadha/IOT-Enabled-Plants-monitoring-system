boolean connect_ESP() //returns 1 if successful or 0 if not
{
  Serial.println("CONNECTING");
  Serial2.println("AT+CIPSTART=0,\"TCP\",\"www.hique.in\",80");//connect to your web server
 
  
  if(read_ESP(keyword_con,sizeof(keyword_con),5000,0)){
  //serial_dump_ESP();
  delay(500);
  Serial.println("CONNECTED");
  Serial2.print("AT+CIPSEND=0,");
  Serial2.println(payload_size);
 
  
  if(read_ESP(keyword_arrow,sizeof(keyword_arrow),5000,0)){
    
    Serial.println("READY TO SEND");
    for(int i=0; i<payload_size; i++)
    Serial2.print(payload[i]);
  
    
    if(read_ESP(keyword_sendok,sizeof(keyword_sendok),5000,0)){
    
    Serial.println("SENT");
    return 1;
  }
 else
  Serial.println("FAILED TO SEND");
  
  }
  else
  Serial.println("FAILED TO GET >");
  
  }
  else{
  Serial.println("FAILED TO CONNECT");
  setup_ESP();
  }
  
}
