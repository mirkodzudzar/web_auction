#!/bin/bash
# set -x

# install nvm
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.2/install.sh | bash

export NVM_DIR="$([ -z "${XDG_CONFIG_HOME-}" ] && printf %s "${HOME}/.nvm" || printf %s "${XDG_CONFIG_HOME}/nvm")"
[ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh" # This loads nvm

PS3='Please chose NODE version to be installed: '
NODE_VERSIONS=("10" "12" "14" "16")
select NODE_VERSION in "${NODE_VERSIONS[@]}"
do
    case $NODE_VERSION in
        "10")
            echo -e $BLUE$NODE_VERSION$NC
            break
            ;;
        "12")
            echo -e $BLUE$NODE_VERSION$NC
            break
            ;;
        "14")
            echo -e $BLUE$NODE_VERSION$NC
            break
            ;;
        "16")
            echo -e $BLUE$NODE_VERSION$NC
            break
            ;;
        *) echo -e $RED"Invalid option '$REPLY'"$NC;;
    esac
done
nvm install 16.14.0
nvm use 16

npm install
npm run build