boolean setup_ESP(){//returns a '1' if successful
  delay(1000);
  if(read_ESP(keyword_Ready,sizeof(keyword_Ready),5000,0))
  Serial.println("MODULE STARTED");
  Serial2.println("AT");// to make sure the ESP is responding
   if(read_ESP(keyword_OK,sizeof(keyword_OK),1000,0))
   { Serial.println("ESP CHECK OK");
    delay(500);
    }
  else
   { Serial.println("ESP CHECK FAILED");
  serial_dump_ESP();
   }
  Serial2.println("AT+CWQAP");
//  if(read_ESP(keyword_OK,sizeof(keyword_OK),2000,0))
//  Serial.println("WIFI DISCONNECTED");
//  delay(500);

   Serial2.print("AT+CWMODE=");// set the CWMODE
   Serial2.println(CWMODE);
   if(read_ESP(keyword_OK,sizeof(keyword_OK),2000,0))
 {  Serial.println("ESP CWMODE SET");
     delay(500);
 }  
  else
  {
    Serial.println("ESP CWMODE SET FAILED");
   serial_dump_ESP();  
  }
   
   String cmd="AT+CWJAP=\"";
       cmd+=SSID_ESP;
       cmd+="\",\"";
       cmd+=SSID_PASS;
       cmd+="\"";
Serial2.println(cmd);
       Serial.println(cmd);
   if(read_ESP(keyword_co,sizeof(keyword_co),50000,0))
    {Serial.println("WIFI CONNECTED");
    delay(1000);}
  else
    {Serial.println("ESP SSID SET FAILED");   
  serial_dump_ESP();
    }
    Serial2.print("AT+CIPMODE=0");// set the CIPMODE
    if(read_ESP(keyword_OK,sizeof(keyword_OK),5000,0))
      {
        Serial.println("ESP SET TO NORMAL MODE");
      delay(500);
      }
      else
      {
        Serial.println("CIPMODE=0 NOT EXECUTED");
        serial_dump_ESP();
      }
   Serial2.print("AT+CIPMUX=");// set the CIPMUX
   Serial2.println(CIPMUX);
   if(read_ESP(keyword_OK,sizeof(keyword_OK),5000,0))//go look for keyword "OK" or "no change
   { Serial.println("ESP CIPMUX SET");
   delay(500);
    }
  else
    {Serial.println("ESP CIPMUX SET FAILED"); 
  serial_dump_ESP();
 
    }
 
  
}
