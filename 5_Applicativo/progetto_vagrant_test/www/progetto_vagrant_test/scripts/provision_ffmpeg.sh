#!/bin/bash

echo "ffmpeg provisioning - begin"

git clone https://git.ffmpeg.org/ffmpeg.git ffmpeg  #cloning ffmpeg repository from github

sudo apt-get -y install ffmpeg

echo "ffmpeg provisioning - end"