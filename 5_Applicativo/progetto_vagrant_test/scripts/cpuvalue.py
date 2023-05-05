#!/usr/bin/python3

import time
import psutil
import socket

# LoadBalancer IP
IP = '192.168.56.30'
# Define the port on which you want to connect
PORT = 9999

while True:
    # Create a socket object that send data
    s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    s.setsockopt(socket.SOL_SOCKET, socket.SO_REUSEADDR, 1)
    print('socket created')
    if s:
        try:
            s.bind(('', PORT))
            s.listen()
            print('socket listening')
            conn, addr = s.accept()
            with conn:
                print(f"Connected by {addr}")
                agent_request = conn.recv(1024).decode().strip()
                print(f'agent request: {agent_request}')

                cpu = psutil.cpu_percent(interval=1, percpu=False)
                print(f"current cpu: {cpu}%")
                response = ""
                if cpu > 10:
                    # Set server weight to half
                    response = "50%\n"
                else:
                    response = "100%\n"
                conn.sendall( response.encode(encoding="ascii",errors="ignore")  )
                print(f'weight data sent: {response.strip()}' )
                conn.close()
        except Exception as e:
            print(e)

        try:
            s.shutdown(socket.SHUT_RDWR)
            s.close()
            print('socket closed')
            pass
        except Exception as e:
            print(e)

    time.sleep(0.1)

