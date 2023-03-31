#!/usr/bin/python

# imports that will be installed:
# pip install psutil
# pip install socket

import psutil
import socket


def getCpuData():
    while 1:
        cpu_perc = psutil.cpu_percent(interval=1, percpu=False)  # avg of all CPUs
        str_perc = cpu_perc.__str__()  # in String
        return str_perc.encode('cp1252')  # in ASCII


# LoadBalancer IP
HOST = '192.168.56.30'
# Define the port on which you want to connect
PORT = 9999

# Create a socket object that send data
with socket.socket(socket.AF_INET, socket.SOCK_STREAM) as s:
    s.bind((HOST, PORT))
    s.listen()
    conn, addr = s.accept()
    with conn:
        print(f"Connected by {addr}")
        while True:
            conn.sendall(getCpuData())
            # data = conn.recv(1024)
            # if not data:
            #    break
            # conn.sendall(data)
