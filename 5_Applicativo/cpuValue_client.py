#!/usr/bin/python

#imports that will be installed:
#pip install psutil
#pip install thread
#pip install socket

import psutil
import socket
from threading import Thread

def sendData(s):
    while(1):
        cpuPerc = psutil.cpu_percent(interval=1, percpu=False))#avg of all CPUs
        sendstr = cpuPerc.encode('cp1252')#in ASCII
        s.sendall(sendstr)#Send data to the LB
        
# LoadBalancer IP
ip = '192.168.56.30' 

# Create a socket object
s = socket.socket((socket.AF_INET, socket.SOCK_STREAM)		

# Define the port on which you want to connect
port = 9999			

# connect to the server on local computer
s.connect((ip, port))

# receive data from the server and decoding to get the string.
print (s.recv(1024).decode())

# close the connection
#s.close()	
	
thread = Thread(target=sendData())
thread.start()
thread.join()



