<?php

require_once('ConnectionDB.php');

class DaoCrew
{
    public static function read(): array
    {
        $pdo = ConnectionDB::getConnection(); // Connection to the DB
        $tab = [];
        $request = $pdo->prepare("SELECT * FROM crew "); // Prepare the request to be executed

        try {
            $request->execute(); // execute the request

            while ($line = $request->fetch(PDO::FETCH_ASSOC))   // While all datas are not display the loop keeps going
            {
                $line['id_crew'];
                $line['name'];

                $tab[] = $line;  //  $tab is where $line's containt is stocked
            }

            return $tab;

        } catch (Exception $e) {
            echo ('Erreur : ' . $e->getMessage() . ' ! ');    // Send the error message.		
        }
    }
    
    public static function create($newCrewName): void
    {

        $pdo = ConnectionDB::getConnection();     // Connection to the DB
        $request = $pdo->prepare("INSERT INTO crew (name) VALUES (:name)");  // Prepare the request to be execute
        $request->bindParam('name', $newCrewName, PDO::PARAM_STR);

        try {
            $request->execute();    // Execute the request
        } catch (Exception $e) {
            echo ('Erreur : ' . $e->getMessage() . ' ! ');    // Send the error message.		
        }
    }
}
