#!/usr/bin/python

import psutil
import socket

# LoadBalancer IP
IP = '192.168.56.30'
# Define the port on which you want to connect
PORT = 9999

# Create a socket object that send data
with socket.socket(socket.AF_INET, socket.SOCK_STREAM) as s:
    s.bind(('', PORT))
    s.listen()
    conn, addr = s.accept()
    with conn:
        print(f"Connected by {addr}")
        while True:
            cpu = psutil.cpu_percent(interval=1, percpu=False)
            print(f"Cpu value sent: {cpu}%")
            if cpu < 10:
                # Set server weight to half
                conn.sendall("50%\n")
            else:
                conn.sendall("100%\n")
