# Simple Polling App

A **lightweight polling application** built with **Laravel 12** and **TailwindCSS**. This project allows users to **create polls with multiple options**, **submit votes via AJAX**, and **view real-time voting results** in a clean and responsive UI.

## Screenshots

**Index Page (Empty State — No Polls Yet)**  

<img width="1280" height="712" alt="image" src="https://github.com/user-attachments/assets/7af28f7e-7146-4000-b19c-b60255b8a0f0" /><br>

**Index Page (With Polls)**  

<img width="1280" height="712" alt="image" src="https://github.com/user-attachments/assets/2156b431-4e37-4685-a25e-668da29091b3" /><br>

**Create Poll**

<img width="1280" height="712" alt="image" src="https://github.com/user-attachments/assets/63e60ca4-3084-4b49-b3d6-2676a4233c0d" /><br>

**Show and Vote**

<img width="1280" height="712" alt="image" src="https://github.com/user-attachments/assets/cf427ae9-ef00-4810-9e4d-7a9500fed093" /><br>

**Delete Confirmation**

<img width="1280" height="712" alt="image" src="https://github.com/user-attachments/assets/c483ebf2-21e7-4f8f-b6de-064a833e6136" /><br>

## Tech Stack

- **Backend:** Laravel 12  
- **Frontend:** Blade Templates + TailwindCSS  
- **Database:** MySQL 
- **Version Control:** GitHub  

## Quick Start

```bash
# Clone repository
git clone https://github.com/fahrilhadi/simple-polling.git
cd simple-polling

# Install dependencies
composer install
npm install
npm run dev

# Setup environment
cp .env.example .env
php artisan key:generate

# Run migrations
php artisan migrate

# Serve application
php artisan serve
