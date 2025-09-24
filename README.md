# Laravel Blog App

A simple blog platform built with **Laravel 8**, where users can view posts from others and manage their own posts after logging in.

<img width="1536" height="971" alt="Web Preview" src="https://github.com/user-attachments/assets/df468537-befe-4da8-b9f9-2442b177a8ac" />

<img width="1536" height="971" alt="Web Preview" src="https://github.com/user-attachments/assets/9a27089e-1816-44b4-90d6-a0f78d1f1337" />

<img width="1536" height="971" alt="Web Preview" src="https://github.com/user-attachments/assets/3cbaccc0-75de-4c01-99ee-3a46f576b518" />

---

## 💻 Key Features

* **Post Viewing:** View all blog posts from different users.
* **User Authentication:** Securely log in and register to access personal features.
* **Post Management:** Create, edit, and delete your own blog posts.
* **Responsive Design:** The layout is optimized for a seamless experience on all devices, from desktops to mobile phones.

---

## 🚀 How to Run the Project

Follow these steps to get the project up and running on your local machine using **Laravel Valet**.

### Prerequisites

Make sure you have the following installed and configured:

* **PHP 7.3**
* **Composer**
* **MySQL 5.7**
* **Laravel Valet** (configured on macOS)

### Installation

1.  **Clone the repository:**
    ```bash
    git clone https://github.com/evannmy/laravel-8-blog-app.git
    cd laravel-8-blog-app
    ```

2.  **Install Composer dependencies:**
    ```bash
    composer install
    ```

3.  **Configure the `.env` file:**
    -   Duplicate the `.env.example` file and rename it to `.env`.
    -   Follow the configuration instructions below.

4.  **Run Database Migrations:**
    ```bash
    php artisan migrate
    ```
    
5.  **Create Symbolic Link:**
    ```bash
    php artisan storage:link
    ```

6.  **Start the Valet Development Server:**
    -   Link the project directory to Valet:
        ```bash
        valet link
        ```
    The project will now be live at `https://blog-app.test`.

---

## ⚙️ .env File Configuration

After copying the `.env.example` file to `.env`, you need to add and configure several variables to run the application correctly.

This section **must** be filled out for the application to connect to your database. Make sure you have created a MySQL database with the same name you enter here.

```env
APP_NAME=Laravel Blog App
APP_URL=https://laravel-blog-app.test

FAKER_LOCALE=id_ID
FILESYSTEM_DRIVER=public

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=root
DB_PASSWORD=
