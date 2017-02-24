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

        function tearDown()
        {
            Stylist::deleteAllStylists();
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

            $get_all_array = array();
            $result = array();
            array_push($result, $new_stylist);
            $get_all_array = Stylist::getAllStylists();
            $this->assertEquals($get_all_array, $result);
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


    }
?>
