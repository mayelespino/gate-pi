#!/bin/sh
# /snap/bin/ngrok start home --config /home/pi/gate-pi/source/ngrok.yaml > /dev/null &
ssh -p 443 -o StrictHostKeyChecking=no -o ServerAliveInterval=30 -R0:localhost:8000 a.pinggy.io
