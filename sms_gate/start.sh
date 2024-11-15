#!/bin/sh
ssh -p 443 -o StrictHostKeyChecking=no -o ServerAliveInterval=30 -R0:localhost:8000 a.pinggy.io
