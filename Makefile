# Those variables are only used for the Vagrant command!
VAGRANT_BOX=bento/ubuntu-20.04
VAGRANT_PROJECT_NAME=statamic
VAGRANT_MEMORY=4096
VAGRANT_CPUS=2
VAGRANT_DOCKER_COMPOSE_VERSION=1.27.3

# Start the Docker Compose stack.
up:
	docker compose up -d

# Stop the Docker Compose stack.
down:
	docker compose down

# Run bash in the web service.
web:
	docker exec -ti odyssey_life_explorer_web bash
