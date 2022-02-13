#!/bin/bash
imageName=cronmaster
containerName=cronm

docker build -t $imageName  cronmaster

echo Delete old container...
docker rm -f $containerName

echo Run new container...
docker run -d --name $containerName $imageName