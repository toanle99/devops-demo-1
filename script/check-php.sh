#!/bin/bash
container_name="laravel-vue2-php8-1" 
if [ "$(docker inspect --format '{{.State.Running}}' $container_name)" == "true" ];
then echo Docker running
fi
