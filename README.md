# Andrea Blog CMS

Andrea Blog CMS is a lightweight content management system (CMS) built with **PHP** and **MySQL**, designed for managing articles, categories, and users. It provides a simple interface for content management.

---

## Features

### Articles

- View all articles.
- Add, edit, and delete articles.
- Articles are associated with categories.
- Simple content management interface.

### Categories

- View all categories.
- Add and delete categories.

### Users

- View all users.

---

## Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/yourusername/andrea-blog-cms.git
   Setup Database:
   ```

Create a database named blogcms.

Import the SQL file or create tables manually.

Ensure the following tables exist:

utilisateur

article

categorie

Configure database connection:

Open config/database.php.

Set your database credentials:

php
Copy code
$host = 'localhost';
$db = 'blogcms';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
Start your local server:

If using XAMPP: place the project in htdocs, then go to http://localhost/blogCMS/.

File Structure
pgsql
Copy code
blogCMS/
├── add_article.php
├── add_category.php
├── delete_article.php
├── delete_category.php
├── edit_article.php
├── index.php
├── utilisateurs.php
├── categories.php
├── config/
│ └── database.php
├── functions.php
├── css/
├── js/
└── images/
How to Use
Open the site in your browser.

Use the sidebar to navigate between:

Articles

Users

Categories

Add, edit, or delete articles and categories as needed.

Security Notes
All user input is sanitized.

Uses prepared statements to prevent SQL injection.

Made with ❤️ by Mohammed Mehdi Saibat
