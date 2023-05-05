#!/bin/bash

sudo apt update
sudo apt -y -o Dpkg::Options::="--force-overwrite" install haproxy
