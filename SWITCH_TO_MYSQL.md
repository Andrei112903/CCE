# How to Switch from SQLite to MySQL

## Step 1: Open your `.env` file

The `.env` file is in the root directory of your project: `C:\Users\johna\OneDrive\Desktop\CCE\.env`

## Step 2: Find the Database Section

Look for these lines in your `.env` file:

```env
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

## Step 3: Replace with MySQL Settings

**Replace** those lines with:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cce_portal
DB_USERNAME=root
DB_PASSWORD=your_mysql_password
```

**Important:** 
- Replace `your_mysql_password` with your actual MySQL password
- If your MySQL has no password, leave it empty: `DB_PASSWORD=`
- Make sure you've created the database `cce_portal` first!

## Step 4: Save the file

Save the `.env` file after making changes.

## Step 5: Clear Laravel Cache

After saving, run this command:
```bash
php artisan config:clear
```

## Step 6: Test Connection

Run this to verify:
```bash
php artisan db:show
```

You should see "mysql" instead of "sqlite"!

## Example: Before and After

### BEFORE (SQLite):
```env
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

### AFTER (MySQL):
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cce_portal
DB_USERNAME=root
DB_PASSWORD=
```

---

## Quick Checklist:

- [ ] Created MySQL database named `cce_portal`
- [ ] Updated `.env` file with MySQL settings
- [ ] Saved `.env` file
- [ ] Cleared config cache: `php artisan config:clear`
- [ ] Tested connection: `php artisan db:show`



