include .env

# BUILD command
.PHONY: build
build:
	docker stop $$(docker ps -aq)
	docker compose build
	docker compose up -d
	docker exec -it ${APP_NAME}_app sh -c "composer install"
	exit
	@echo "\033[0;32mBuild done\033[0m"

# RUN command
.PHONY: run
run:
	docker compose up -d
	@echo "\033[0;32mDone\033[0m"

# STOP command
.PHONY: stop
stop:
	docker compose down
	@echo "\033[0;32mDone\033[0m"

# START command
.PHONY: start
start:
	@echo "\e[96mEnter the number of participants (an integer between 0 and 8): \e[0m" && \
    read participants; \
    echo "\e[96mEnter the type of recreation (education, recreational, social, diy, charity, cooking, relaxation, music, busywork): \e[0m" && \
    read type; \
    echo "\e[96mMethod of sending value message: file, console: \e[0m" && \
    read save; \
    php index.php --participants=$$participants --type=$$type --save=$$save

# ECS command
.PHONY: ecs
ecs:
	docker exec -it ${APP_NAME}_app sh -c "vendor/bin/ecs --fix"


