void connect_webhost(){

URL_withPacket = URL_webhost;//pull in the base URL
//URL_withPacket += "&te=";//unit id 1
URL_withPacket += String(temp_value);//temp sensor value
URL_withPacket += "&mo=";
URL_withPacket += String(moist_value);
URL_withPacket += "&ul=";
URL_withPacket += String(distance);
URL_withPacket += payload_closer;
  
  
  payload_size=0;
  for(int i=0; i<(URL_withPacket.length()); i++){//using a string this time, so use .length()
    payload[i] = URL_withPacket[i];//build up the payload
   payload_size++;//increment the counter
  }
  
  if(connect_ESP()) {
    
       if(read_ESP(keyword_f,sizeof(keyword_f),5000,0)){
          if(read_ESP(keyword_hash,sizeof(keyword_hash),5000,1)){
            f_from_ESP=data_from_ESP[1];

        if(read_ESP(keyword_p,sizeof(keyword_p),5000,0)){
          if(read_ESP(keyword_hash,sizeof(keyword_hash),5000,1)){
             p_from_ESP=data_from_ESP[1];
                
    
        if(read_ESP(keyword_l,sizeof(keyword_l),5000,0)){
          if(read_ESP(keyword_hash,sizeof(keyword_hash),5000,1)){
            l_from_ESP=data_from_ESP[1];
          
            
            if(read_ESP(keyword_closed,sizeof(keyword_closed),5000,0)){
              // delay(10);
              Serial.println("FOUND DATA & DISCONNECTED");
              serial_dump_ESP();//now we can clear out the buffer and read whatever is still there
           
                 fan_value=f_from_ESP - 48;    //parse ASCII char and convert into integer

                 pump_value=p_from_ESP - 48; 

                 light_value=l_from_ESP - 48;

              Serial.println("");
               
             
                }
              }
            }
          }
          }       
      }
    }
  }


}

