<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use PDO;
use Exception;

class MakeDatabase extends Command
{
    protected $signature = 'db:create {--database=}';
    protected $description = 'Create database specified in .env if not exists';

    public function handle()
    {
        $db = $this->option('database') ?? env('DB_DATABASE');
        $host = env('DB_HOST', '127.0.0.1');
        $port = env('DB_PORT', 3306);
        $user = env('DB_USERNAME');
        $pass = env('DB_PASSWORD');

        try {
            $dsn = "mysql:host={$host};port={$port}";
            $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            $pdo->exec("CREATE DATABASE IF NOT EXISTS `{$db}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
            $this->info("Database `{$db}` created or already exists.");
        } catch (Exception $e) {
            $this->error("Could not create database: " . $e->getMessage());
            return 1;
        }

        return 0;
    }
}
