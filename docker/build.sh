#!/bin/bash

PROJECT_DIR=$(dirname "${BASH_SOURCE[0]}")/..
BASE_IMAGE_PATH=registry.gitlab.com/jkniest/template-registry

function build() {
	SERVICE_NAME=${1}
	DOCKERFILE_PATH=${2}
	BRANCH=develop
	CACHE_TAG=develop

	docker pull ${BASE_IMAGE_PATH}/${SERVICE_NAME}:${BRANCH}

	if [ $? -ne 0 ]; then
		docker pull ${BASE_IMAGE_PATH}/${SERVICE_NAME}:develop
		CACHE_TAG=develop
	fi

	docker build --cache-from ${BASE_IMAGE_PATH}/${SERVICE_NAME}:${CACHE_TAG} -t ${BASE_IMAGE_PATH}/${SERVICE_NAME}:${BRANCH} -f ${DOCKERFILE_PATH} .
	docker push ${BASE_IMAGE_PATH}/${SERVICE_NAME}:${BRANCH}
}

build redis ${PROJECT_DIR}/docker/redis/Dockerfile
build fpm ${PROJECT_DIR}/docker/fpm/Dockerfile
build nginx ${PROJECT_DIR}/docker/nginx/Dockerfile
build cron ${PROJECT_DIR}/docker/cron/Dockerfile
build horizon ${PROJECT_DIR}/docker/horizon/Dockerfile
build build ${PROJECT_DIR}/docker/build/Dockerfile
