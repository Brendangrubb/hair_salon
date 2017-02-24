<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once __DIR__.'/../src/Stylist.php';

    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);


    class StylistTest extends PHPUnit_Framework_TestCase
    {
        function test_getId()
        {
            $id = 1;
            $name = 'Jacques St Gerrard';
            $phone_number = '555-999-1234';
            $$workdays= 'Monday, Saturday';
            $new_stylist = new Stylist($id, $name, $phone_number, $workdays);

            $result = $new_stylist->getId();

            $this->assertEquals(1, $result);
        }









    }
?>