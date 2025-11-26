<?php
/**
 * MySQL Database Setup Helper
 * This script helps create the database and test the connection
 */

echo "=== MySQL Database Setup Helper ===\n\n";

// Get database credentials
echo "Please provide your MySQL credentials:\n";
echo "Host (default: 127.0.0.1): ";
$host = trim(fgets(STDIN)) ?: '127.0.0.1';

echo "Port (default: 3306): ";
$port = trim(fgets(STDIN)) ?: '3306';

echo "Username (default: root): ";
$username = trim(fgets(STDIN)) ?: 'root';

echo "Password: ";
$password = trim(fgets(STDIN));

$database = 'cce_portal';

echo "\n=== Step 1: Testing MySQL Connection ===\n";
try {
    $pdo = new PDO("mysql:host=$host;port=$port", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✓ Successfully connected to MySQL server!\n\n";
} catch (PDOException $e) {
    echo "✗ Connection failed: " . $e->getMessage() . "\n";
    echo "\nPlease check:\n";
    echo "1. MySQL server is running\n";
    echo "2. Username and password are correct\n";
    echo "3. MySQL is accessible on $host:$port\n";
    exit(1);
}

echo "=== Step 2: Creating Database ===\n";
try {
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$database` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    echo "✓ Database '$database' created successfully!\n\n";
} catch (PDOException $e) {
    if (strpos($e->getMessage(), 'already exists') !== false) {
        echo "✓ Database '$database' already exists!\n\n";
    } else {
        echo "✗ Failed to create database: " . $e->getMessage() . "\n";
        exit(1);
    }
}

echo "=== Step 3: Testing Database Connection ===\n";
try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✓ Successfully connected to database '$database'!\n\n";
} catch (PDOException $e) {
    echo "✗ Failed to connect to database: " . $e->getMessage() . "\n";
    exit(1);
}

echo "=== Step 4: .env Configuration ===\n";
echo "Please update your .env file with these settings:\n\n";
echo "DB_CONNECTION=mysql\n";
echo "DB_HOST=$host\n";
echo "DB_PORT=$port\n";
echo "DB_DATABASE=$database\n";
echo "DB_USERNAME=$username\n";
echo "DB_PASSWORD=$password\n\n";

echo "=== Setup Complete! ===\n";
echo "Next steps:\n";
echo "1. Update your .env file with the settings above\n";
echo "2. Run: php artisan migrate\n";
echo "3. Your database is ready to use!\n";





