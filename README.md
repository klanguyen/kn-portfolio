# KN Portfolio Site

## Launch environment
First, create environment file and update variables.
```shell
cp .env.example .env
```

Then, execute the docker-compose.yml file: 
```shell
docker compose up -d
```

Lastly, set up required plugins using WP CLI
   ```
   wp plugin delete hello akismet
   wp plugin install health-check query-monitor loco-translate font-awesome --activate
   ```

### WordPress
<http://localhost>

### phpMyAdmin
<http://localhost:8081>

### MailHog
<http://localhost:8025>

## WP CLI
You can run a single command:
```shell
docker exec -it docker-dock-it-wpcli-1 wp user list
```
or login via the terminal:
```shell
docker exec -it docker-dock-it-wpcli-1 bash
```
