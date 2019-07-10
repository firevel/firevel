#!/bin/bash
APP_FILE=app.yaml
if [ ! -f "$APP_FILE" ]; then
    cp "$APP_FILE.example" "$APP_FILE"
fi
for i in $(printenv)
do
ENV_KEY="\${$(echo $i | cut -d '=' -f1)}"
ENV_VALUE="$(echo $i | cut -d '=' -f 2-)"
sed -i "s|$ENV_KEY|$ENV_VALUE|g" "$APP_FILE"
done