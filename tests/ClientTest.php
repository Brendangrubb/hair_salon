<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once __DIR__.'/../src/Client.php';
    require_once __DIR__.'/../src/Stylist.php';

    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);


    class ClientTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Stylist::deleteAllStylists();
            Client::deleteAllClients();
        }
    // GETTERS AND SETTERS TESTS

        function test_getId()
        {
            $id = null;
            $name = 'Jacques St Gerrard';
            $phone_number = '5559991234';
            $workdays = 'Monday, Saturday';
            $new_stylist = new Stylist($id, $name, $phone_number, $workdays);
            $new_stylist->saveStylist();


            $id = 1;
            $name = 'Vince Neil';
            $phone_number = '2125436789';
            $stylist_id = $new_stylist->getId();
            $new_client = new Stylist($id, $name, $phone_number, $stylist_id);

            $result = $new_client->getId();

            $this->assertEquals(1, $result);
        }

        function test_getName()
        {
            $id = null;
            $name = 'Jacques St Gerrard';
            $phone_number = '5559991234';
            $workdays = 'Monday, Saturday';
            $new_stylist = new Stylist($id, $name, $phone_number, $workdays);
            $new_stylist->saveStylist();

            $id = 1;
            $name = 'Vince Neil';
            $phone_number = '2125436789';
            $stylist_id = $new_stylist->getId();
            $new_client = new Stylist($id, $name, $phone_number, $stylist_id);

            $result = $new_client->getName();

            $this->assertEquals('Vince Neil', $result);
        }

        function test_getPhoneNumber()
        {
            $id = null;
            $name = 'Jacques St Gerrard';
            $phone_number = '5559991234';
            $workdays = 'Monday, Saturday';
            $new_stylist = new Stylist($id, $name, $phone_number, $workdays);
            $new_stylist->saveStylist();

            $id = 1;
            $name = 'Vince Neil';
            $phone_number = '2125436789';
            $stylist_id = $new_stylist->getId();
            $new_client = new Stylist($id, $name, $phone_number, $stylist_id);

            $result = $new_client->getPhoneNumber();

            $this->assertEquals('2125436789', $result);
        }

        function test_getStylistId()
        {
            $id = null;
            $name = 'Jacques St Gerrard';
            $phone_number = '5559991234';
            $workdays = 'Monday, Saturday';
            $new_stylist = new Stylist($id, $name, $phone_number, $workdays);
            $new_stylist->saveStylist();

            $id = 1;
            $name = 'Vince Neil';
            $phone_number = '2125436789';
            $stylist_id = $new_stylist->getId();
            $new_client = new Client($id, $name, $phone_number, $stylist_id);

            $result = $new_client->getStylistId();

            $this->assertEquals($stylist_id, $result);
        }
    //CRUD METHODS
        function test_saveClient()
        {
            $id = null;
            $name = 'Jacques St Gerrard';
            $phone_number = '5559991234';
            $workdays = 'Monday, Saturday';
            $new_stylist = new Stylist($id, $name, $phone_number, $workdays);
            $new_stylist->saveStylist();

            $id = 1;
            $name = 'Vince Neil';
            $phone_number = '2125436789';
            $stylist_id = $new_stylist->getId();
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
            $id = null;
            $name = 'Jacques St Gerrard';
            $phone_number = '5559991234';
            $workdays = 'Monday, Saturday';
            $new_stylist = new Stylist($id, $name, $phone_number, $workdays);
            $new_stylist->saveStylist();

            $result = array();

            $id = null;
            $name = 'Vince Neil';
            $phone_number = '2125436789';
            $stylist_id = $new_stylist->getId();
            $new_client = new Client($id, $name, $phone_number, $stylist_id);
            $new_client->saveClient();

            $id2 = null;
            $name2 = 'Crispin Glover';
            $phone_number2 = '9876345212';
            $stylist_id = $new_stylist->getId();
            $new_client2 = new Client($id, $name, $phone_number, $stylist_id);
            $new_client2->saveClient();


            $get_all_clients = Client::getAllClients();

            $this->assertEquals([$new_client->getName(), $new_client2->getName()], [$get_all_clients[0]->getName(), $get_all_clients[1]->getName()]);
        }

        function test_deleteAllClients()
        {
            $id = null;
            $name = 'Jacques St Gerrard';
            $phone_number = '5559991234';
            $workdays= 'Monday, Saturday';
            $new_stylist = new Stylist($id, $name, $phone_number, $workdays);
            $new_stylist->saveStylist();

            $id = null;
            $name = 'Vince Neil';
            $phone_number = '2125436789';
            $stylist_id = $new_stylist->getId();
            $new_client = new Client($id, $name, $phone_number, $stylist_id);
            $new_client->saveClient();

            $id2 = null;
            $name2 = 'Crispin Glover';
            $phone_number2 = '9876345212';
            $stylist_id2= $new_stylist->getId();
            $new_client2 = new Client($id, $name, $phone_number, $stylist_id);
            $new_client2->saveClient();

            Client::deleteAllClients();

            $get_all = Client::getAllClients();
            $this->assertEquals([], $get_all);
        }

        function test_findClient()
        {
            $id = null;
            $name = 'Jacques St Gerrard';
            $phone_number = '5559991234';
            $workdays = 'Monday, Saturday';
            $new_stylist = new Stylist($id, $name, $phone_number, $workdays);
            $new_stylist->saveStylist();

            $id = null;
            $name = 'Vince Neil';
            $phone_number = '2125436789';
            $stylist_id = $new_stylist->getId();
            $new_client = new Client($id, $name, $phone_number, $stylist_id);
            $new_client->saveClient();

            $id2 = null;
            $name2 = 'Crispin Glover';
            $phone_number2 = '9876345212';
            $stylist_id2 = $new_stylist->getId();
            $new_client2 = new Client($id, $name, $phone_number, $stylist_id);
            $new_client2->saveClient();

            $result = Client::findClient($new_client->getId());

            $this->assertEquals($new_client, $result);
        }

        function test_updateClient()
        {
            $id = null;
            $name = 'Jacques St Gerrard';
            $phone_number = '5559991234';
            $workdays = 'Monday, Saturday';
            $new_stylist = new Stylist($id, $name, $phone_number, $workdays);
            $new_stylist->saveStylist();

            $id = null;
            $name = 'Vince Neil';
            $phone_number = '2125436789';
            $stylist_id = $new_stylist->getId();
            $new_client = new Client($id, $name, $phone_number, $stylist_id);
            $new_client->saveClient();

            $new_number = '3215439876';

            $new_client->updateClient($new_number);

            $this->assertEquals('3215439876', $new_client->getPhoneNumber());
        }

        function test_deleteClient()
        {
            $id = null;
            $name = 'Jacques St Gerrard';
            $phone_number = '5559991234';
            $workdays = 'Monday, Saturday';
            $new_stylist = new Stylist($id, $name, $phone_number, $workdays);
            $new_stylist->saveStylist();

            $id = null;
            $name = 'Vince Neil';
            $phone_number = '2125436789';
            $stylist_id = $new_stylist->getId();
            $new_client = new Client($id, $name, $phone_number, $stylist_id);
            $new_client->saveClient();

            $id2 = null;
            $name2 = 'Crispin Glover';
            $phone_number2 = '9876345212';
            $stylist_id = $new_stylist->getId();
            $new_client2 = new Client($id, $name, $phone_number, $stylist_id);
            $new_client2->saveClient();

            $new_client->deleteClient();

            $this->assertEquals([$new_client2], Client::getAllClients());
        }
    }
?>
