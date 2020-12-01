<?php

require_once('models/DaoCrew.php');// To call DaoCrew class code.

class MainController
{
    /**** the condition "switch" will allow us to navigate between pages and make treatments through URLs ****/
    public static function runApplication(): void
    {
        switch (key($_GET)) {

            case NULL: /************************************* Main page *************************************/

                $list = DaoCrew::read(); // Give the list from database to variable "$list"
                require_once('views/formAndList.phtml'); // Show the main page
                break;

            case 'addcrew': /*********************************** Add crew code ***********************************/

                if (isset($_POST['name']) && !empty($_POST['name'])) {

                    $newCrewName = filter_var(ucfirst(mb_strtolower($_POST['name'])), FILTER_SANITIZE_SPECIAL_CHARS);
                    /*
                    filter_var => remove html tags
                    ucfirst => capitalize the first letter
                    mb_strtolower => lowercase all letters
                    */

                    DaoCrew::create($newCrewName);
                    header('location: index.php');     // Go to main page

                } else {
                    header('location: index.php');     // Go to main page
                }
                break;

            default:
                break;
        }
    }
}
