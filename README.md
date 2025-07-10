
# Project Setup Guide

## Installation

From the project root directory:

1. Start Docker containers
   `docker-compose up -d`
2. Run Laravel database migrations and populate database with minimal projects and tasks set
   `docker exec -it laravel_app php artisan migrate:fresh --seed`
3. Install frontend dependencies
`   docker exec -it react_app npm install`
4. 
## Running the Application

1. Start the Laravel backend server (automatically runs on http://localhost:8000)
    - This starts automatically with docker-compose

2. Start the Vite development server (accessible at http://localhost:5173)
   `docker exec -it react_app npm run dev -- --host`

## Project Structure

- `/backend` - Laravel API (PHP)
- `/frontend` - React application (JavaScript)
    - `/frontend/src` - React source files
    - `/frontend/src/main.jsx` - Application entry point
    - `/frontend/src/App.jsx` - Root component

## Available Services

- Frontend: http://localhost:5173
- Backend API: http://localhost:8000
- Database: MariaDB (accessible on port 3306)
    - Database name: laravel
    - Username: root
    - Password: root
