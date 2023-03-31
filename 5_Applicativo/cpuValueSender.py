#!/usr/bin/python3

import time
import psutil
import socket

# HOST = '192.168.56.30'  # LoadBalancer IP

PORT = 9999  # Socket Port

while True:
    s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    print("socket created")
    if s:
        try:
            try:
                s.bind(('', PORT))
                print("Socket bound")
            except socket.error as msg:
                print('\nBind failed. Error Code : ' + str(msg[0]) + ' Message ' + msg[1])
                exit()
            s.listen()
            print(f"Socket({PORT}) is listening")
            with s.accept() as (conn, addr):
                print(f"Connected by {addr}")
                agent_request = conn.recv(1024).decode()
                print(f'agent request: {agent_request}')
                cpu = psutil.cpu_percent(interval=1, percpu=False)
                print(f"Cpu: {cpu}%")
                response = ""
                if cpu > 10.0:
                    # Set server weight to half
                    response = "50%\n"
                else:
                    response = "100%\n"
                    ascii_response = response.encode(encoding="ascii", errors="ignore")
                conn.sendall(ascii_response)
                print(f'data sent: {response}')
            s.shutdown(socket.SHUT_RDWR)
            print('socket down')
            s.close()
            print('socket closed')
        except Exception as e:
            print(e)
    time.sleep(0.1)
    print('.', end='')

