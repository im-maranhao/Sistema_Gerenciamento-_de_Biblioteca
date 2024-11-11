<?php
// biblioteca/Infrastructure/Persistence/Database.php

namespace Infrastructure\Persistence;

use PDO;

class Database
{
    private static ?PDO $instance = null;

    public static function getInstance(): PDO
    {
        if (!self::$instance) {
            self::$instance = new PDO('sqlite:biblioteca.db');
        }
        return self::$instance;
    }
}
