# Variables
DOCKER_COMPOSE = docker-compose
APP_CONTAINER = yii2_basic

# Default target
.DEFAULT_GOAL := help

# Commands

up: ## Start all services
	$(DOCKER_COMPOSE) up -d

down: ## Stop all services
	$(DOCKER_COMPOSE) down

restart: ## Restart all services
	$(DOCKER_COMPOSE) down && $(DOCKER_COMPOSE) up -d

build: ## Build/rebuild containers
	$(DOCKER_COMPOSE) build

logs: ## Show logs from containers
	$(DOCKER_COMPOSE) logs -f

bash: ## Access the app container shell
	$(DOCKER_COMPOSE) exec $(APP_CONTAINER) bash

migrate: ## Run Yii2 migrations
	$(DOCKER_COMPOSE) exec $(APP_CONTAINER) php yii migrate --interactive=0

clear-cache: ## Clear Yii2 cache
	$(DOCKER_COMPOSE) exec $(APP_CONTAINER) php yii cache/flush-all

permissions: ## Set proper folder permissions
	$(DOCKER_COMPOSE) exec $(APP_CONTAINER) chmod -R 777 /var/www/html/runtime /var/www/html/web/assets

composer-install: ## Run composer install in the app container
	$(DOCKER_COMPOSE) exec $(APP_CONTAINER) composer install

help: ## Display this help
	@echo "Usage: make [target]"
	@echo ""
	@echo "Available targets:"
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "  \033[36m%-20s\033[0m %s\n", $$1, $$2}'
