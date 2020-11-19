<?php

class ConnectionDB
{
    private static $_connection;

    private static function dbConnection(): void
    {

        $host = 'localhost:3306';   // Choose your host name
        $dbname = 'argonautes';     // Choose the database name, default is "argonautes"
        $user = 'root';             // Choose your user name
        $password = '';             // Choose your pasword

        try {

            self::$_connection = new PDO('mysql:host=' . $host . '; dbname=' . $dbname, $user, $password);  // To connect to DB with the host name , DB name , user name and password.
            self::$_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    // To prepare errors

        } catch (Exception $e) {
            echo ('Erreur : ' . $e->getMessage() . ' ! ');   // Send the error message.		
        }
    }

    static function getConnection(): object
    {
        self::dbConnection();
        return self::$_connection;  // Return the connection information
    }
}
