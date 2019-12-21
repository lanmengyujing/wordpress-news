#!/bin/bash -eu

cd $(dirname $0)/..

docker-sync start
docker-compose build  
docker-comopse up -d