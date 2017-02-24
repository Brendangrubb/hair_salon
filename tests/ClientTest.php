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
        protected function tearDown()
        {
            Client::deleteAllClients();
        }
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
            $new_client = new Client($id, $name, $phone_number, $stylist_id);

            $result = $new_client->getStylistId();

            $this->assertEquals(1, $result);
        }
    //CRUD METHODS
        function test_saveClient()
        {
            $id = 1;
            $name = 'Vince Neil';
            $phone_number = '2125436789';
            $stylist_id= 1;
            $new_client = new Client($id, $name, $phone_number, $stylist_id);

            $new_client->saveClient();

            $get_all = array();
            $result = array();
            array_push($result, $new_client);
            $get_all = Client::getAllClients();
            $this->assertEquals($get_all, $result);
        }

        function test_getAllClients()
        {
            $result = array();

            $id = null;
            $name = 'Vince Neil';
            $phone_number = '2125436789';
            $stylist_id= 1;
            $new_client = new Client($id, $name, $phone_number, $stylist_id);
            $new_client->saveClient();

            $id2 = null;
            $name2 = 'Crispin Glover';
            $phone_number2 = '9876345212';
            $stylist_id2 = 1;
            $new_client2 = new Client($id, $name, $phone_number, $stylist_id);
            $new_client2->saveClient();


            $get_all_clients = Client::getAllClients();

            $this->assertEquals([$new_client->getName(), $new_client2->getName()], [$get_all_clients[0]->getName(), $get_all_clients[1]->getName()]);
        }

        function test_deleteAllClients()
        {
            $id = null;
            $name = 'Vince Neil';
            $phone_number = '2125436789';
            $stylist_id= 1;
            $new_client = new Client($id, $name, $phone_number, $stylist_id);
            $new_client->saveClient();

            $id2 = null;
            $name2 = 'Crispin Glover';
            $phone_number2 = '9876345212';
            $stylist_id2 = 1;
            $new_client2 = new Client($id, $name, $phone_number, $stylist_id);
            $new_client2->saveClient();

            Client::deleteAllClients();

            $get_all = Client::getAllClients();
            $this->assertEquals([], $get_all);
        }

        function test_findClient()
        {
            $id = null;
            $name = 'Vince Neil';
            $phone_number = '2125436789';
            $stylist_id= 1;
            $new_client = new Client($id, $name, $phone_number, $stylist_id);
            $new_client->saveClient();

            $id2 = null;
            $name2 = 'Crispin Glover';
            $phone_number2 = '9876345212';
            $stylist_id2 = 1;
            $new_client2 = new Client($id, $name, $phone_number, $stylist_id);
            $new_client2->saveClient();

            $result = Client::findClient($new_client->getId());

            $this->assertEquals($new_client, $result);
        }
    }
?>
