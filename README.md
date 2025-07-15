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

