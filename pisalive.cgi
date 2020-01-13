#!/bin/bash


echo -e "Content-type: text/html\n\n"

echo "<h1>Raspberry Pi Status:</h1>"
echo "<pre>$(./rpistatus3)"
