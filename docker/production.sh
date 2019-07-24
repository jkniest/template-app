#!/bin/bash

PROJECT_DIR=$(dirname "${BASH_SOURCE[0]}")/..
BASE_IMAGE_PATH=registry.gitlab.com/jkniest/template-registry

function tag() {
	SERVICE_NAME=${1}
	DOCKERFILE_PATH=${2}

	docker pull ${BASE_IMAGE_PATH}/${SERVICE_NAME}:develop
	docker tag ${BASE_IMAGE_PATH}/${SERVICE_NAME}:develop ${BASE_IMAGE_PATH}/${SERVICE_NAME}:master
	docker push ${BASE_IMAGE_PATH}/${SERVICE_NAME}:master
}

tag redis ${PROJECT_DIR}/docker/redis/Dockerfile
tag fpm ${PROJECT_DIR}/docker/fpm/Dockerfile
tag nginx ${PROJECT_DIR}/docker/nginx/Dockerfile
tag cron ${PROJECT_DIR}/docker/cron/Dockerfile
tag horizon ${PROJECT_DIR}/docker/horizon/Dockerfile
tag build ${PROJECT_DIR}/docker/build/Dockerfile
