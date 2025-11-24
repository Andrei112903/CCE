<?php
/**
 * Quick MySQL Connection Test
 */

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== Testing MySQL Connection ===\n\n";

try {
    // Get database config
    $connection = config('database.default');
    $config = config('database.connections.' . $connection);
    
    echo "Current Connection: $connection\n";
    echo "Database: " . ($config['database'] ?? 'N/A') . "\n";
    echo "Host: " . ($config['host'] ?? 'N/A') . "\n";
    echo "Username: " . ($config['username'] ?? 'N/A') . "\n\n";
    
    if ($connection === 'mysql') {
        echo "✓ .env is configured for MySQL!\n\n";
        
        // Test connection
        echo "Testing connection...\n";
        $pdo = DB::connection()->getPdo();
        echo "✓ Successfully connected to MySQL!\n\n";
        
        // Check if database exists
        $database = $config['database'];
        $result = DB::select("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = ?", [$database]);
        
        if (count($result) > 0) {
            echo "✓ Database '$database' exists!\n\n";
            
            // Check tables
            $tables = DB::select("SHOW TABLES");
            $tableCount = count($tables);
            echo "Tables in database: $tableCount\n";
            
            if ($tableCount > 0) {
                echo "\nExisting tables:\n";
                foreach ($tables as $table) {
                    $tableName = array_values((array)$table)[0];
                    echo "  - $tableName\n";
                }
            } else {
                echo "\n⚠ No tables found. You need to run migrations:\n";
                echo "  php artisan migrate\n";
            }
        } else {
            echo "✗ Database '$database' does not exist!\n";
            echo "Please create it first.\n";
        }
    } else {
        echo "⚠ Currently using $connection, not MySQL.\n";
        echo "To switch to MySQL, update your .env file:\n";
        echo "  DB_CONNECTION=mysql\n";
        echo "  DB_HOST=127.0.0.1\n";
        echo "  DB_PORT=3306\n";
        echo "  DB_DATABASE=cce_portal\n";
        echo "  DB_USERNAME=root\n";
        echo "  DB_PASSWORD=your_password\n";
    }
    
} catch (Exception $e) {
    echo "✗ Error: " . $e->getMessage() . "\n";
    echo "\nPossible issues:\n";
    echo "1. MySQL server is not running\n";
    echo "2. Wrong credentials in .env file\n";
    echo "3. Database doesn't exist\n";
    echo "4. .env file not configured for MySQL\n";
}



