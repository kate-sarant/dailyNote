

# dailyNote - CRUD system with Laravel 


## Table of contents  🚀

  - [Project Setup Guide](#overview)
  - [The challenge](#The_challenge)
  - [Setup Instructions](#Setup_Instructions)
  - [Links](#links)
  - [Prerequisites](#Prerequisites)
  - [Author](#author)


## Project Setup Guide
Prerequisites
Node.js and npm installed
Composer installed
PHP and MySQL installed

### The_challenge

Users should be able to:

- Create profile,Login ,Logout functionality 
- Navigate to profile page and change the informations
- Use the CRUD operations and soft delete.
- Search for notes with the searching bar.
- Seeding the database with data.

## Setup_Instructions 

- Clone the repository:

Copy code

```bash
git clone https://github.com/kate-sarant/dailyNote.git
cd dailyNote
```


- Install dependencies:

Copy code
```bash
npm install
composer install

```
- Update the `.env`file with your database credentials:

Copy code

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1 
DB_PORT=3306
DB_DATABASE=dailyNote 
DB_USERNAME= your_username 
DB_PASSWORD= your_password


Run database migrations:

```
Copy code

```bash
php artisan migrate


Seed the database with dummy data:

```
Copy code

```bash

php artisan db:seed --class=DatabaseSeeder

```

- Start the local development server:

```bash
Copy code
php artisan serve
```

- 👍️ Access the application in your browser.



# Troubleshooting
If facing issues, check the Laravel documentation or GitHub repository for solutions.
Make sure all prerequisites are installed and properly configured.


### Links

- GitHub: [Add live site URL here](https://github.com/kate-sarant/dailyNote.git)



### Prerequisites

- PHP 8.0 or higher
- Composer
- MySQL database


## Author

- Linkedin - [kate-sarant] https://www.linkedin.com/in/kate-sarant
- GitHub - [kate-sarant] https://github.com/kate-sarant