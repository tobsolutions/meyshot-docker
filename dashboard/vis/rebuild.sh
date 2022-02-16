#!/bin/bash
imageName=xx:visserver
containerName=vis

docker build -t $imageName -f Dockerfile  .

echo Delete old container...
docker rm -f $containerName

echo Run new container...
docker run -d -p 8081:80 --name $containerName --restart always $imageName