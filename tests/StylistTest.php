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


    class StylistTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
            Stylist::deleteAllStylists();
            Client::deleteAllClients();
        }
    // GETTERS AND SETTERS TESTS

        function test_getId()
        {
            $id = 1;
            $name = 'Jacques St Gerrard';
            $phone_number = '5559991234';
            $$workdays= 'Monday, Saturday';
            $new_stylist = new Stylist($id, $name, $phone_number, $workdays);

            $result = $new_stylist->getId();

            $this->assertEquals(1, $result);
        }


        function test_getName()
        {
            $id = 1;
            $name = 'Jacques St Gerrard';
            $phone_number = '5559991234';
            $$workdays= 'Monday, Saturday';
            $new_stylist = new Stylist($id, $name, $phone_number, $workdays);

            $result = $new_stylist->getName();

            $this->assertEquals('Jacques St Gerrard', $result);
        }

        function test_getPhoneNumber()
        {
            $id = 1;
            $name = 'Jacques St Gerrard';
            $phone_number = '5559991234';
            $$workdays= 'Monday, Saturday';
            $new_stylist = new Stylist($id, $name, $phone_number, $workdays);

            $result = $new_stylist->getPhoneNumber();

            $this->assertEquals('5559991234', $result);
        }

        function test_getWorkdays()
        {
            $id = 1;
            $name = 'Jacques St Gerrard';
            $phone_number = '5559991234';
            $workdays= 'Monday, Saturday';
            $new_stylist = new Stylist($id, $name, $phone_number, $workdays);

            $result = $new_stylist->getWorkdays();

            $this->assertEquals('Monday, Saturday', $result);
        }
    //CRUD METHODS
        function test_saveStylist()
        {
            $id = null;
            $name = 'Jacques St Gerrard';
            $phone_number = '5559991234';
            $workdays= 'Monday, Saturday';
            $new_stylist = new Stylist($id, $name, $phone_number, $workdays);

            $new_stylist->saveStylist();

            $get_all = array();
            $result = array();
            array_push($result, $new_stylist);
            $get_all = Stylist::getAllStylists();
            $this->assertEquals($get_all, $result);
        }

        function test_getAllStylists()
        {
            $result = array();

            $id = null;
            $name = 'Jacques St Gerrard';
            $phone_number = '5559991234';
            $workdays= 'Monday, Saturday';
            $new_stylist = new Stylist($id, $name, $phone_number, $workdays);
            $new_stylist->saveStylist();

            $id2 = null;
            $name2 = 'Cristiano Francois';
            $phone_number2 = '5038765309';
            $workdays2 = 'Thursday, Friday';
            $new_stylist2 = new Stylist($id2, $name2, $phone_number2, $workdays2);
            $new_stylist2->saveStylist();


            $get_all_stylists = Stylist::getAllStylists();

            $this->assertEquals([$new_stylist->getName, $new_stylist2->getName], [$get_all_stylists[0]->getName, $get_all_stylists[1]->getName]);
        }

        function test_deleteAllStylists()
        {
            $id = null;
            $name = 'Jacques St Gerrard';
            $phone_number = '5559991234';
            $workdays= 'Monday, Saturday';
            $new_stylist = new Stylist($id, $name, $phone_number, $workdays);
            $new_stylist->saveStylist();

            $id2 = null;
            $name2 = 'Cristiano Francois';
            $phone_number2 = '5038765309';
            $workdays2 = 'Thursday, Friday';
            $new_stylist2 = new Stylist($id2, $name2, $phone_number2, $workdays2);
            $new_stylist2->saveStylist();

            Stylist::deleteAllStylists();

            $get_all = Stylist::getAllStylists();
            $this->assertEquals([], $get_all);
        }

        function test_findStylist()
        {
            $id = null;
            $name = 'Jacques St Gerrard';
            $phone_number = '5559991234';
            $workdays= 'Monday, Saturday';
            $new_stylist = new Stylist($id, $name, $phone_number, $workdays);
            $new_stylist->saveStylist();

            $id2 = null;
            $name2 = 'Cristiano Francois';
            $phone_number2 = '5038765309';
            $workdays2 = 'Thursday, Friday';
            $new_stylist2 = new Stylist($id2, $name2, $phone_number2, $workdays2);
            $new_stylist2->saveStylist();

            $result = Stylist::findStylist($new_stylist->getId());

            $this->assertEquals($new_stylist, $result);
        }

        function test_updateStylist_number()
        {
            $id = null;
            $name = 'Jacques St Gerrard';
            $phone_number = '5559991234';
            $workdays = 'Monday, Saturday';
            $new_stylist = new Stylist($id, $name, $phone_number, $workdays);
            $new_stylist->saveStylist();

            $new_number = '4321999555';
            // $new_workdays = 'Tuesday, Wednesday';


            $new_stylist->updateStylist($new_number);

            $this->assertEquals('4321999555', $new_stylist->getPhoneNumber());
        }
        //
        // function test_updateStylist_workdays()
        // {
        //     $id = null;
        //     $name = 'Jacques St Gerrard';
        //     $phone_number = '5559991234';
        //     $workdays = 'Monday, Saturday';
        //     $new_stylist = new Stylist($id, $name, $phone_number, $workdays);
        //     $new_stylist->saveStylist();
        //
        //     // $new_number = '4321999555';
        //     $new_workdays = 'Tuesday, Wednesday';
        //
        //
        //     $new_stylist->updateStylist($new_workdays);
        //
        //     $this->assertEquals('Tuesday, Wednesday', $new_stylist->getWorkdays());
        // }

        function test_updateStylist_both()
        {
            $id = null;
            $name = 'Jacques St Gerrard';
            $phone_number = '5559991234';
            $workdays = 'Monday, Saturday';
            $new_stylist = new Stylist($id, $name, $phone_number, $workdays);
            $new_stylist->saveStylist();

            $new_number = '4321999555';
            $new_workdays = 'Tuesday, Wednesday';


            $new_stylist->updateStylist($new_number, $new_workdays);

            $this->assertEquals('Tuesday, Wednesday', $new_stylist->getWorkdays());
        }

        function test_deleteStylist()
        {
            $id = null;
            $name = 'Jacques St Gerrard';
            $phone_number = '5559991234';
            $workdays= 'Monday, Saturday';
            $new_stylist = new Stylist($id, $name, $phone_number, $workdays);
            $new_stylist->saveStylist();

            $id2 = null;
            $name2 = 'Cristiano Francois';
            $phone_number2 = '5038765309';
            $workdays2 = 'Thursday, Friday';
            $new_stylist2 = new Stylist($id2, $name2, $phone_number2, $workdays2);
            $new_stylist2->saveStylist();

            $new_stylist->deleteStylist();

            $this->assertEquals([$new_stylist2], Stylist::getAllStylists());
        }

        function test_getClients()
        {
            $id = null;
            $name = 'Jacques St Gerrard';
            $phone_number = '5559991234';
            $workdays= 'Monday, Saturday';
            $new_stylist = new Stylist($id, $name, $phone_number, $workdays);
            $new_stylist->saveStylist();
            $new_stylist_id = $new_stylist->getId();

            $id2 = null;
            $name2 = 'Cristiano Francois';
            $phone_number2 = '5038765309';
            $workdays2 = 'Thursday, Friday';
            $new_stylist2 = new Stylist($id2, $name2, $phone_number2, $workdays2);
            $new_stylist2->saveStylist();
            $new_stylist_id2 = $new_stylist2->getId();

            $id = null;
            $name = 'Vince Neil';
            $phone_number = '2125436789';
            $new_client = new Client($id, $name, $phone_number, $new_stylist_id);
            $new_client->saveClient();

            $id2 = null;
            $name2 = 'Crispin Glover';
            $phone_number2 = '9876345212';
            $new_client2 = new Client($id, $name, $phone_number, $new_stylist_id2);
            $new_client2->saveClient();

            $result = $new_stylist->getClients();

            $this->assertEquals([$new_client], $result);
        }
    }
?>
