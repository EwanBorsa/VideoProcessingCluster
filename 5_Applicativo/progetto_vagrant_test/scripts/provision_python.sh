#!/bin/bash

echo "python provisioning - begin"
sudo apt install python3
sudo apt install python3-pip -y
pip install psutil

python3 /vagrant/scripts/cpuvalue.py &