#!/usr/bin/python

import psutil
import socket
import sys
import time

# LoadBalancer IP
IP = '192.168.56.30'
# Define the port on which you want to connect
PORT = 9999

# Create a socket object that send data
with socket.socket(socket.AF_INET, socket.SOCK_STREAM) as s:
    # Bind socket to localhost and port 9999
    try:
        s.bind(('', PORT))
    except socket.error as msg:
        print('\nBind failed. Error Code : ' + str(msg[0]) + ' Message ' + msg[1])
        sys.exit()
    print('\nSocket bind complete')
    s.listen()
    print('\nSocket now listening')
    conn, addr = s.accept()
    with conn:
        print(f"\nConnected by {addr}")
        while 1:
            cpu = psutil.cpu_percent(interval=1, percpu=False)
            print(f"\nCpu value sent: {cpu}%")
            if cpu > 50:
                # Set server weight to half
                conn.sendall(bytes(ascii("50%\n")))
            elif cpu < 10:
                conn.sendall(bytes(ascii("100%\n")))
            time.sleep(1)
    conn.close()
