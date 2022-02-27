#!/bin/sh
echo "Setting up the environment"
sudo service nginx stop
sudo service mysql stop
sudo docker-compose up -d --remove-orphans
echo "Navigate here http://127.0.0.1"