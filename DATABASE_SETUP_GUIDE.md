# Database Setup Guide for CCE Portal

## ✅ All Migrations Are Ready!

All database migrations have been created and are ready to use. The migrations support **MySQL** (recommended) and include:
- ✅ `add_role_to_users_table` - Adds role field (admin, teacher, student)
- ✅ `create_students_table` - Student information
- ✅ `create_teachers_table` - Teacher information
- ✅ `create_subjects_table` - Subject catalog
- ✅ `create_classes_table` - Class schedules
- ✅ `create_enrollments_table` - Student enrollments
- ✅ `create_attendance_table` - Attendance records
- ✅ `create_grades_table` - Grade records
- ✅ `create_drop_requests_table` - Drop subject requests
- ✅ `create_announcements_table` - Announcements

## Step 1: Configure MySQL Database Connection

### 1. Create MySQL Database

Open MySQL command line or phpMyAdmin and create a database:

```sql
CREATE DATABASE cce_portal CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 2. Configure `.env` File

Make sure you have a `.env` file (copy from `.env.example` if needed), then update these settings:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cce_portal
DB_USERNAME=root
DB_PASSWORD=your_mysql_password
```

**Note:** Replace `root` and `your_mysql_password` with your actual MySQL username and password.

## Step 2: Run Migrations

Now that your database is configured, run all migrations:

```bash
php artisan migrate
```

## Step 3: Create Seeders (Optional)

Create initial data for testing:
```bash
php artisan db:seed
```

## Step 4: Test Database Connection

```bash
php artisan tinker
# Then in tinker:
DB::connection()->getPdo();
```

