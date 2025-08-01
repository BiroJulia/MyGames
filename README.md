# Product Requirements Document

## Project Title: MyGames

## Tech Stack
- Backend: Laravel 12  
- Frontend: Vue.js  
- Data Source: IGDB API

## Overview
MyGames is a web application that allows users to track, search, and explore video games using the IGDB API. It is built with Laravel 12 and Vue.js, and supports both guest and registered user functionality.

## Core Features

### For Guests (Unauthenticated Users):
- Search for video games via the IGDB API.
- View basic information about each game (e.g., title, genre, cover image, description, etc.).
- Browse featured content and see how the app works.

### For Registered Users:
In addition to guest features, registered users can:
- Save games to one of three personal lists:
  - Played
  - Currently Playing
  - Want to Play
- Write and edit personal reviews for each game.
- Rate games using a star-based or numerical system.
- View their saved games and reviews on their profile page, with separate sections for each list.

##  Tech Stack

### Frontend
- **Vue 3** – Modern component-based JavaScript framework  
- **Vite** – Lightning-fast development server and bundler  
- **Tailwind CSS** – Utility-first CSS for rapid, responsive UI  
- **Inertia.js (Vue 3)** – Bridges Laravel and Vue for server-driven SPA

### Backend
- **Laravel 11** – Full-featured PHP framework for APIs and business logic

### Game Data APIs
- **IGDB API**  
  - Format: JSON, REST  
  - Rate Limit: ~240 requests per minute  
  - More technical, highly detailed game data

### API Handling Tool
- **IGDB Laravel Wrapper** – Simplifies IGDB usage with Laravel-style models , made directly for the API

---

## Getting Started

1. Clone the repository  
2. Install dependencies  
  ```bash
  composer install
  ```
  ```bash
  npm install
  ```
3. Set up your `.env` file 
  ```bash 
  cp .env.example .env
  ```
4. Connect to database 
(for example)
  ```bash 
  DB_CONNECTION=pgsql
  DB_HOST=127.0.0.1
  DB_PORT=5432
  DB_DATABASE=my_games
  DB_USERNAME=postgres
  ```
5. Run migrations 
```bash
php artisan migrate
```

6. Start the server 
```bash
composer run dev
```