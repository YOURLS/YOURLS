#!/bin/bash

####################################################################
# This file is part of YOURLS
#
# Remove unneeded files for production
#
# Run this script when adding, updating or removing a 3rd party
# library that goes in the `vendor` directory.
#
# Typical use:
#
# $ composer update --no-dev --prefer-dist
# $ ./includes/vendor/build-script/yourls-build.sh
# $ commit & push
#
####################################################################


## OPTIONS ##########################################################

# This directories in /vendor won't be cleaned up
# Must be explicit names, no jocker eg "README.*"
#
PRESERVE_IN_VENDOR=(
    'composer'
    'build-script'
)

# Files & dirs to keep in each library directory
# Must be explicit names, no jocker eg "README.*"
#
PRESERVE_IN_LIB=(
    'src'
    'library'
    'lib'
    'README.md'
)

# Nothing to edit past this line !


## VARS #############################################################

# Default values.
TESTRUN=false

# Colors and fancyness
RED='\033[0;31m'
NORM='\033[0m'
BOLD='\033[1m'
GREEN='\033[0;32m'
PURPLE='\033[0;35m'

# Set Script Name variable
SCRIPT=`basename ${BASH_SOURCE[0]}`


## FUNCS ############################################################

# Print help
rtfm () {
    echo -e "\nUsage: "
    echo -e "   ${BOLD}${SCRIPT}${NORM} [-th] <directory to cleanup>"
    echo -e ""
    echo -e "Examples: "
    echo -e "   ${BOLD}${SCRIPT}${NORM} [-th] ."
    echo -e "   ${BOLD}${SCRIPT}${NORM} [-th] /some/path/to/clean"
    echo -e ""
    echo -e "Options:"
    echo -e "  ${BOLD}-h${NORM}           Display this help message"
    echo -e "  ${BOLD}-t${NORM}           Test mode to see what would be deleted without deleting"
    echo -e ""
    exit 1
}


# in_array NEEDLE HAYSTACK
# Return 0/1
in_array () {
  local e
  for e in "${@:2}"; do [[ "$e" == "$1" ]] && return 0; done
  return 1
}


# Cleans the mess
cleanup () {
    # Return if function called with no parameter
    if [ -z "$1" ]
    then
        return
    fi

    # Directory we are in
    CUR=$1
    
    # Loop over each file and delete those we don't want to keep
    echo -e "${PURPLE}Cleaning: $(basename $(dirname "$CUR"))/$(basename "$CUR") ${NORM}"
    for FILE in $(ls -A $CUR)
    do

        if in_array $FILE "${PRESERVE_IN_LIB[@]}"
        then
            echo -e "${GREEN}+${NORM} KEEP: $FILE"
        else
            echo -e "${RED}-${NORM} del : $FILE"
            maybe_delete "${CUR}${FILE}"
        fi

    done;
    
    # If directory is empty, delete
    if [ ! "$(ls -A $CUR)" ]
    then
        echo -e "${RED}-${NORM} del : $(basename "$CUR") (empty dir)"
        maybe_delete "$CUR"
    fi
    
    echo ""

}

# Delete file if not in test run
maybe_delete () {
    if [ "$TESTRUN" = false ]
    then
        rm -rf "$1"
    fi
}

# Check the number of arguments. If none are passed, print help and exit.
args_or_die () {
    if [ $1 -eq 0 ]; then
        rtfm
    fi
}


## WORK #############################################################

# We should have some arguments
args_or_die "$#"

# Check options
while getopts "th" opt; do
  case $opt in
    t)
      TESTRUN=true
      ;;
    h)
      rtfm
      ;;
    \?)
      rtfm
      ;;
  esac
done

shift $((OPTIND-1))  #This tells getopts to move on to the next argument.

# Again, we should have some arguments after dealing with options if any
# Yes, this isn't perfect, there should be one test. Will do.
args_or_die "$#"

# Check for valid dir
if [ ! -d "$1" ]
then
    echo -e "Need a valid directory, '${RED}$1${NORM}' is not."
    rtfm
else
    # Resolve directory (expand '.' or '../stuff' as full path)
    TARGETDIR=$(cd "$1"; pwd)
fi

# Dry run notice if applicable
if [ "$TESTRUN" = true ]
then
    echo -e "Test mode. ${RED}Nothing will be deleted${NORM}.\n"
fi


# 1. Get list of all directories in target directory, except the one 
#    listed in PRESERVE_IN_VENDOR that we don't want to touch
#
VENDORS=($(ls -d $TARGETDIR/*/))
TEMP=(${VENDORS[@]})

for (( i=0; i<${#VENDORS[@]}; i++ ))
do
    DIR=$(basename "${VENDORS[i]}")
    if in_array "$DIR" "${PRESERVE_IN_VENDOR[@]}"
    then
        unset TEMP[$i]
    fi
done

VENDORS=(${TEMP[@]})

# 2. Loop over each directory and clean up
#    
for DIR in ${VENDORS[@]}
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

echo -e "... all done $GREEN ;) $NORM\n"

