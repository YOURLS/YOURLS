#!/bin/bash

####################################################################
# This file is part of YOURLS
#
# Remove unneeded files for production
#
# Update this script and run it when adding, updating or removing
# a 3rd party library that goes in the `vendor` directory.
#
# Typical use:
#
# $ composer update --no-dev --prefer-dist
# $ ./includes/vendor/build-script/yourls-build.sh
# $ commit & push
#
####################################################################


# Files & dirs to keep in each library directory
# Must be explicit names, no jocker eg "README.*"
#
PRESERVE=(
    'src'
    'library'
    'lib'
    'composer.json'
    'README.md'
)


####################################################################

NC='\033[0m'
RED='\033[0;31m'
GREEN='\033[0;32m'
PURPLE='\033[0;35m' 


# Base directory (eg /path/to/includes/vendor)
ROOT=$(dirname "`cd "$(dirname "${BASH_SOURCE[0]}" )" && pwd`")


# in_array NEEDLE HAYSTACK
in_array () {
  local e
  for e in "${@:2}"; do [[ "$e" == "$1" ]] && return 0; done
  return 1
}


# The func that cleans the mess
cleanup () {
    # Return if function called with no parameter
    if [ -z "$1" ]
    then
        return
    fi

    # Directory we are in
    CUR=$1
    
    # Loop over each file and delete those we don't want to keep
    echo -e "${PURPLE}Cleaning: $(basename $(dirname "$CUR"))/$(basename "$CUR") $NC"
    for FILE in $(ls -A $CUR)
    do

        if in_array $FILE "${PRESERVE[@]}"
        then
            echo -e "${GREEN}+${NC} KEEP: $FILE"
        else
            echo -e "${RED}-${NC} del : $FILE"
            rm -rf "${CUR}${FILE}"
        fi

    done;
    
    # If directory is empty, delete
    if [ ! "$(ls -A $CUR)" ]
    then
        echo -e "${RED}-${NC} del : $(basename "$CUR") (empty dir)"
        rm -rf "$CUR"
    fi
    
    echo ""

}


####################################################################


# 1. Get list of all directory in /vendor, except "build-script"
#    and "composer" that we dont want to touch
#
VENDORS=$(ls -d $ROOT/*/)
EXCLUDE[0]="$ROOT/build-script/"
EXCLUDE[1]="$ROOT/composer/"
for DEL in ${EXCLUDE[@]}
do
    VENDORS=("${VENDORS[@]/$DEL}")
done


# 2. Loop over each directory and clean up
#    
for DIR in $VENDORS
do
    SUBDIRS=$(ls -d $DIR*/ 2>/dev/null)
    if [ ! -z "$SUBDIRS" ]
    then
    
        # This VENDORS directory has subdirectory: process each subdir
        for SUBDIR in $SUBDIRS
        do
            cleanup $SUBDIR 
        done;
        
    else

        # This directory contains no subdirectory
        cleanup $DIR 

    fi
done

echo -e "... all done $GREEN ;) $NC"