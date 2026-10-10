# School System

A simple school management system built with [Laravel](https://laravel.com/) that handles Students, Courses, and Enrollments with full CRUD functionality.

## Features

- **Student Management** - Add, view, edit, and delete student records with unique student numbers and email addresses
- **Course Management** - Manage course catalog with course codes, titles, and credit hours
- **Enrollment Management** - Enroll students in courses with grades and enrollment dates
- **Relationships** - Proper Eloquent relationships between Students, Courses, and Enrollments
- **Dashboard** - Overview of system statistics and recent enrollments
- **Responsive UI** - Clean, modern interface built with Tailwind CSS

## Requirements

- [PHP](https://www.php.net/) 8.2 or higher
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) & [npm](https://www.npmjs.com/)
- A database (MySQL, SQLite, PostgreSQL, etc.)

## Installation & Setup

1. **Clone or download the repository**

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure database**
   
   Open `.env` and update your database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=school_system
   DB_USERNAME=root
   DB_PASSWORD=
   ```

   For SQLite (easier for local testing):
   ```env
   DB_CONNECTION=sqlite
   DB_DATABASE=C:/xampp/htdocs/school-system/database/database.sqlite
   ```
   
   If using SQLite, create the database file:
   ```bash
   php artisan migrate --force
   ```

6. **Run migrations**
   ```bash
   php artisan migrate
   ```

7. **Build frontend assets** (development)
   ```bash
   npm run dev
   ```
   
   Or for production:
   ```bash
   npm run build
   ```

8. **Start the development server**
   ```bash
   php artisan serve
   ```

   The application will be available at `http://localhost:8000`

## Usage Guide

### Dashboard
- View total count of students, courses, and enrollments
- See the 5 most recent enrollments

### Students
1. Go to **Students > New Student** to add a student
2. Required fields: Student Number, First Name, Last Name, Email, Date of Birth
3. Student Number and Email must be unique
4. View individual student profiles to see their enrolled courses

### Courses
1. Go to **Courses > New Course** to add a course
2. Required fields: Course Code, Title, Credits (1-10)
3. Course Code must be unique
4. View course details to see enrolled students

### Enrollments
1. Go to **Enrollments > New Enrollment** to enroll a student in a course
2. Select a student and course from dropdowns
3. Set enrollment date (defaults to today)
4. Optionally add a grade (max 5 characters)
5. Each enrollment creates a link between a student and a course

## Database Structure

- **students**: `id`, `student_number` (unique), `first_name`, `last_name`, `email` (unique), `date_of_birth`, `timestamps`
- **courses**: `id`, `code` (unique), `title`, `credit`, `timestamps`
- **enrollments**: `id`, `student_id` (FK), `course_id` (FK), `grade`, `enrolled_at`, `timestamps`

## Running with XAMPP

If you're using XAMPP on Windows:
1. Place this project in `C:/xampp/htdocs/school-system/`
2. Start Apache and MySQL from XAMPP Control Panel
3. Create a database named `school_system` in phpMyAdmin
4. Configure `.env` with MySQL credentials
5. Run migrations: `php artisan migrate`
6. Start the server: `php artisan serve`
7. Access: `http://localhost:8000`

## Technologies Used

- **Laravel 12** - PHP Framework
- **Tailwind CSS 4** - Utility-first CSS framework
- **Vite** - Asset bundler
- **PostCSS** - CSS processing
- **MySQL/SQLite** - Database

## License

This project is open-source and available for educational purposes.
