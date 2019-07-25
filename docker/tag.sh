#!/bin/bash

PROJECT_DIR=$(dirname "${BASH_SOURCE[0]}")/..
BASE_IMAGE_PATH=registry.gitlab.com/jkniest/template-registry

ORIGINAL_TAG=${1}
NEW_TAG=${2}

function tag() {
	SERVICE_NAME=${1}
	DOCKERFILE_PATH=${2}

	docker pull ${BASE_IMAGE_PATH}/${SERVICE_NAME}:${ORIGINAL_TAG}
	docker tag ${BASE_IMAGE_PATH}/${SERVICE_NAME}:${ORIGINAL_TAG} ${BASE_IMAGE_PATH}/${SERVICE_NAME}:${NEW_TAG}
	docker push ${BASE_IMAGE_PATH}/${SERVICE_NAME}:${NEW_TAG}
}

tag redis ${PROJECT_DIR}/docker/redis/Dockerfile
tag fpm ${PROJECT_DIR}/docker/fpm/Dockerfile
tag nginx ${PROJECT_DIR}/docker/nginx/Dockerfile
tag cron ${PROJECT_DIR}/docker/cron/Dockerfile
tag horizon ${PROJECT_DIR}/docker/horizon/Dockerfile
tag build ${PROJECT_DIR}/docker/build/Dockerfile
