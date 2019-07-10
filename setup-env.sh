#!/bin/bash
for i in $(printenv)
do
ENV_KEY="\${$(echo $i | cut -d '=' -f1)}"
ENV_VALUE="$(echo $i | cut -d '=' -f 2-)"
sed -i "s|$ENV_KEY|$ENV_VALUE|g" app.yaml
done