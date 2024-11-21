#!/bin/sh
ssh -p 443 -R0:localhost:80 -o StrictHostKeyChecking=no -o ServerAliveInterval=30 1pDpXhEzpW4@a.pinggy.io
