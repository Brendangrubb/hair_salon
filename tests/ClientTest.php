<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once __DIR__.'/../src/Stylist.php';
    require_once __DIR__.'/../src/Client.php';

    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);


    class ClientTest extends PHPUnit_Framework_TestCase
    {

    // GETTERS AND SETTERS TESTS

        function test_getId()
        {
            $id = 1;
            $name = 'Vince Neil';
            $phone_number = '2125436789';
            $stylist_id= 1;
            $new_stylist = new Stylist($id, $name, $phone_number, $stylist_id);

            $result = $new_stylist->getId();

            $this->assertEquals(1, $result);
        }



    }
?>
