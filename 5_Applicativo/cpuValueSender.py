#!/usr/bin/python3

import time
import psutil
import socket

<<<<<<< HEAD
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

=======
# Define the port on which you want to connect
PORT = 9999

<<<<<<< HEAD
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


=======
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
>>>>>>> 6135c36bf8de0bfa62b2b6955c3c2b34e6a56e83
>>>>>>> 998d88735ac64765c9b10aa239b9637add4f14cb
