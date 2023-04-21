#!/bin/bash

echo "memcached provisioning - begin"

sudo apt install memcached
sudo apt install libmemcached-tools
sudo ss -plunt #verify memcached bound
sudo systemctl start memcached

echo "memcached provisioning - end"