# Bitboard

A Pinterest-inspired art sharing platform where users can discover, share, and get inspired by artwork across various categories.

## Features

- **Landing page** — Hero section with image carousel, category search, and group board collaboration highlights
- **User authentication** — Register and log in with email/password
- **Artwork upload** — Share your own artwork with a title and category
- **Explore** — Browse all uploaded artworks in the community
- **Responsive UI** — Built with Bootstrap 5, works across all screen sizes

## Tech Stack

| Layer      | Technology         |
|------------|--------------------|
| Backend    | PHP 8.3-FPM        |
| Database   | MySQL 8.0          |
| Web server | Nginx (Alpine)     |
| Frontend   | Bootstrap 5, vanilla JS |
| DB access  | PDO (PHP)          |

## Project Structure

```
bitboard/
├── src/                        # PHP application source
│   ├── index.php               # Landing page
│   ├── login.php               # Login page
│   ├── register.php            # Registration / sign-up page
│   ├── upload.php              # Artwork upload page
│   ├── explore.php             # Browse community artworks
│   ├── logout.php              # Session logout
│   └── includes/
│       ├── config.php          # App bootstrap (session, db, timezone)
│       ├── db.php              # PDO database connection
│       ├── functions.php       # Shared helper functions
│       ├── head.php            # HTML <head> partial
│       ├── header.php          # Navigation bar partial
│       └── footer.php          # Page footer partial
│   └── assets/
│       ├── css/                # Stylesheets (Bootstrap + custom)
│       ├── js/                 # JavaScript (Bootstrap + custom)
│       └── images/             # Static images
├── database/
│   ├── bitboard.sql            # Schema — auto-loaded by Docker on first run
│   └── seeders/
│       └── seeder.sql          # Sample users and artworks
├── docker/
│   ├── nginx/
│   │   └── default.conf        # Nginx virtual host config
│   └── php/
│       ├── Dockerfile          # PHP-FPM image definition
│       └── php.ini             # Custom PHP settings (upload limits, etc.)
├── docker-compose.yml
├── .env                        # Environment variables (see below)
├── composer.json
└── package.json
```

## Database Schema

```sql
users    (id, username, email, password, created_at)
artworks (id, user_id, title, category, image_path, uploaded_at)
```

`artworks.user_id` references `users.id` with `ON DELETE CASCADE`.

---

## Local Development with Docker

### Prerequisites

- [Docker](https://docs.docker.com/get-docker/) and [Docker Compose](https://docs.docker.com/compose/install/) installed

### 1. Clone the repository

```bash
git clone <repo-url>
cd bitboard
```

### 2. Configure environment variables

An `.env` file is already provided with default values for Docker:

```env
DB_HOST=db
DB_PORT=3306
DB_NAME=bitboard_db
DB_USERNAME=root
DB_PASSWORD=root_password
```

Update `DB_PASSWORD` if desired — make sure the value matches in both `DB_PASSWORD` and `MYSQL_ROOT_PASSWORD` (they both read from the same variable via Docker Compose).

### 3. Build and start the containers

```bash
docker compose up -d --build
```

This starts three services:

| Service    | Description                     | Exposed port |
|------------|---------------------------------|--------------|
| `nginx`    | Web server / reverse proxy      | `8080`       |
| `php-app`  | PHP 8.3-FPM application         | (internal)   |
| `db`       | MySQL 8.0 database              | `3306`       |

The database schema (`database/bitboard.sql`) is automatically applied on the first run via Docker's `entrypoint-initdb.d` mechanism.

### 4. Open the app

```
http://localhost:8080
```

### 5. (Optional) Seed sample data

```bash
docker compose exec db mysql -u root -proot_password bitboard_db < database/seeders/seeder.sql
```

### 6. Stop the containers

```bash
docker compose down
```

To also remove the persisted database volume:

```bash
docker compose down -v
```

---

## Code Formatting

The project uses [Prettier](https://prettier.io/) (with the PHP plugin) for consistent formatting.

```bash
# Install Node dev dependencies (first time only)
npm install

# Format all files
npx prettier --write .
```

PHP-specific formatting via [PHP-CS-Fixer](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer) is configured in `.php-cs-fixer.dist.php`.

---

## License

See [LICENSE](LICENSE).
