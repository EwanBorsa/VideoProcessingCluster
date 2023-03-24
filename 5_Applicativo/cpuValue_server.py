#!/usr/bin/python

#imports that will be installed:
#pip install thread$
#pip install socket

import socket
from threading import Thread
  
port = 9999  

s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
print ("Socket successfully created")

s.bind(('', port))        
print ("socket binded to %s" %(port))

s.listen(5)    
print ("socket is listening")   

# a forever loop until we interrupt it or
# an error occurs
while True:
 
# Establish connection with client.
  c, addr = s.accept()    
  print ('Got connection from', addr )
 
  # send a thank you message to the client. encoding to send byte type.
  c.send('Thank you for connecting'.encode())
 
  # Close the connection with the client
  c.close()
   
  # Breaking once connection closed
  break

