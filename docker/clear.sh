#!/bin/bash

# First of all, urlencode the given repository name
PROJECT_DIR=$(dirname "${BASH_SOURCE[0]}")/..
REPOSITORY=$(${PROJECT_DIR}/docker/encode.sh "${1}")
TOKEN=${2}

# Next we need to fetch all repositories
echo "Fetching all repositories for '${1}'"
echo
ALL=$(curl -s "https://gitlab.com/api/v4/projects/${REPOSITORY}/registry/repositories" --header "Private-Token: ${TOKEN}")

for row in $(echo "${ALL}" | jq -r '.[] | @base64'); do
  _jq() {
    echo ${row} | base64 --decode | jq -r ${1}
  }

  ID=$(echo $(_jq '.id'))
  NAME=$(echo $(_jq '.name'))

  echo "Found: ${ID} (${NAME})"
  echo "Cleaning old tags"

  curl -s -X DELETE "https://gitlab.com/api/v4/projects/${REPOSITORY}/registry/repositories/${ID}/tags" --header "Private-Token: ${TOKEN}" -F "name_regex=(.*)-(.*)"
  echo

  echo
done
