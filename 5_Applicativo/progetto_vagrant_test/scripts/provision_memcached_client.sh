#!/bin/bash

echo "memcached client provisioning - begin"

sudo apt-get install memcached
sudo apt-get install php-memcache

echo "memcached client provisioning - end"