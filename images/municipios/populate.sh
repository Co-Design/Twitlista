#!/bin/bash
for (( c=1; c<=${2}; c++ ))
do
   cp $1 $c.jpg
done

