# MySQL Setup - Step by Step Guide

## ✅ Good News!
- PHP MySQL extensions are installed (mysqli, pdo_mysql)
- All database migrations are ready
- You just need to configure the connection!

## Step 1: Create MySQL Database

You have **3 options** to create the database:

### Option A: Using the Helper Script (Easiest)
```bash
php setup_mysql.php
```
This script will:
- Test your MySQL connection
- Create the database automatically
- Show you the exact .env settings to use

### Option B: Using phpMyAdmin (If you have XAMPP/WAMP)
1. Open phpMyAdmin (usually at `http://localhost/phpmyadmin`)
2. Click "New" in the left sidebar
3. Database name: `cce_portal`
4. Collation: `utf8mb4_unicode_ci`
5. Click "Create"

### Option C: Using MySQL Workbench
1. Open MySQL Workbench
2. Connect to your MySQL server
3. Run this SQL:
```sql
CREATE DATABASE cce_portal CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

## Step 2: Update .env File

Open your `.env` file and find the database section. Update it to:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cce_portal
DB_USERNAME=root
DB_PASSWORD=your_mysql_password
```

**Important:** Replace `your_mysql_password` with your actual MySQL password.

## Step 3: Test Connection

Run this command to test if Laravel can connect:
```bash
php artisan db:show
```

Or test with:
```bash
php artisan tinker
```
Then type: `DB::connection()->getPdo();`
If it shows a PDO object, you're connected!

## Step 4: Run Migrations

Once connected, create all tables:
```bash
php artisan migrate
```

This will create:
- ✅ users table (with role field)
- ✅ students table
- ✅ teachers table
- ✅ subjects table
- ✅ classes table
- ✅ enrollments table
- ✅ attendance table
- ✅ grades table
- ✅ drop_requests table
- ✅ announcements table

## Troubleshooting

### "Access denied" error?
- Check your MySQL username and password
- Make sure MySQL server is running
- Try: `DB_USERNAME=root` and `DB_PASSWORD=` (empty if no password)

### "Unknown database" error?
- Make sure you created the database first (Step 1)
- Check the database name in .env matches exactly

### "Connection refused" error?
- MySQL server might not be running
- Check if MySQL is running in XAMPP/WAMP control panel
- Try `DB_HOST=localhost` instead of `127.0.0.1`

## Need Help?

If you're stuck, run the helper script:
```bash
php setup_mysql.php
```

It will guide you through the process!



