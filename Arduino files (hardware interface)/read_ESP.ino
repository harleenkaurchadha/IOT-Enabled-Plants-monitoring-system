

//This function goes and finds a keyword received from the ESP

boolean read_ESP(const char keyword1[], int key_size, int timeout_val, byte mode){
  timeout_start_val=millis();
  char data_in[20];
  int scratch_length=1;
  key_size--;
 
  for(byte i=0; i<key_size; i++){  
           
            while(!Serial2.available()){
              if((millis()-timeout_start_val)>timeout_val){
                Serial.println("timeout");
                return 0;
              }
            }
   
    data_in[i]=Serial2.read();
  
    if(mode==1){//this will save all of the data to the data_from_ESP
      data_from_ESP[scratch_length]=data_in[i];
      data_from_ESP[0]=scratch_length;
      scratch_length++;
    }
    
  }

  while(1){   //until keyword is found or timeout occurs

          for(byte i=0; i<key_size; i++){
       if(keyword1[i]!=data_in[i])
       break;
       if(i==(key_size-1)){
       return 1; 
       }
     }
     

    //start rolling the buffer
    for(byte i=0; i<(key_size-1); i++){
      data_in[i]=data_in[i+1];
      }
 
         
            while(!Serial2.available()){
              if((millis()-timeout_start_val)>timeout_val){
                Serial.println("timeout");
                return 0;
              }
            }
    
    data_in[key_size-1]=Serial2.read();//save the new data in the last position in the buffer
    
      if(mode==1){
      data_from_ESP[scratch_length]=data_in[key_size-1];
      data_from_ESP[0]=scratch_length;
      scratch_length++;
    }
    
  }
  
}
