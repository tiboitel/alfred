# Alfred 

Alfred Pennyworth or maybe... Pelfred Anyworth ? 

## Setup Instructions

1. Clone the repository:
   ```bash
   git clone https://github.com/your-repo.git
   cd your-repo
   ```

2. Copy the `.env.example` file to `.env`:
   ```bash
   cp .env.example .env
   ```

3. Update `.env` with your environment-specific variables:
   - Set the database credentials (`DB_HOST`, `DB_DATABASE`, etc.).
   - Leave `APP_KEY` blank for now (it will be generated in the next step).

4. Start the Docker containers:
   ```bash
   docker-compose up -d --build
   ```

5. Generate the Laravel application key:
   ```bash
   docker exec -it alfred-app bash
   php artisan key:generate
   ```

6. Clear and cache the configuration:
   ```bash
   docker exec -it alfred-app bash
   php artisan config:clear
   php artisan config:cache
   ```

7. Your application should now be accessible at `http://localhost:8080`.


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
