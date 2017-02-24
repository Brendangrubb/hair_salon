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
            $new_client = new Stylist($id, $name, $phone_number, $stylist_id);

            $result = $new_client->getId();

            $this->assertEquals(1, $result);
        }

        function test_getName()
        {
            $id = 1;
            $name = 'Vince Neil';
            $phone_number = '2125436789';
            $stylist_id= 1;
            $new_client = new Stylist($id, $name, $phone_number, $stylist_id);

            $result = $new_client->getName();

            $this->assertEquals('Vince Neil', $result);
        }

        function test_getPhoneNumber()
        {
            $id = 1;
            $name = 'Vince Neil';
            $phone_number = '2125436789';
            $stylist_id= 1;
            $new_client = new Stylist($id, $name, $phone_number, $stylist_id);

            $result = $new_client->getPhoneNumber();

            $this->assertEquals('2125436789', $result);
        }

        function test_getStylistId()
        {
            $id = 1;
            $name = 'Vince Neil';
            $phone_number = '2125436789';
            $stylist_id= 1;
            $new_client = new Stylist($id, $name, $phone_number, $stylist_id);

            $result = $new_client->getStylistId();

            $this->assertEquals(1, $result);
        }

        function test_saveClient()
        {
            $id = 1;
            $name = 'Vince Neil';
            $phone_number = '2125436789';
            $stylist_id= 1;
            $new_client = new Stylist($id, $name, $phone_number, $stylist_id);

            $new_client->saveClient();

            $get_all = array();
            $result = array();
            array_push($result, $new_client);
            $get_all_array = Client::getAllClients();
            $this->assertEquals($get_all, $result);
        }

    }
?>
