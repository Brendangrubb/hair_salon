<?php
    class Stylist
    {
        private $id;
        private $name;
        private $phone_number;
        private $workdays;

        function __construct($id = null, $name, $phone_number, $workdays)
        {
            $this->id = $id;
            $this->name = $name;
            $this->phone_number = $phone_number;
            $this->workdays = $workdays;
        }
    //GETTERS AND SETTERS
        function getId()
        {
            return $this->id;
        }

        function setName($new_name)
        {
            $this->name = $new_name;

        }

        function getName()
        {
            return $this->name;

        }

        function setPhoneNumber($new_phone_number)
        {
            $this->phone_number = $new_phone_number;
        }

        function getPhoneNumber()
        {
            return $this->phone_number;
        }

        function setWorkdays($new_workdays)
        {
            $this->workdays = $new_workdays;
        }

        function getWorkdays()
        {
            return $this->workdays;
        }
    //CRUD METHODS
        function saveStylist()
        {
        $GLOBALS['DB']->exec("INSERT INTO stylists (name, phone_number, workdays) VALUES ('{$this->getName()}', '{$this->getPhoneNumber()}', '{$this->getWorkdays()}');");
        $this->id = $GLOBALS['DB']->lastInsertID();
        }

        static function getAllStylists()
        {
            $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM stylists;");
            $all_stylists = array();

            foreach ($returned_stylists as $stylist) {
                $id = $stylist['id'];
                $name = $stylist['name'];
                $phone_number = $stylist['phone_number'];
                $workdays= $stylist['workdays'];
                $new_stylist = new Stylist($id, $name, $phone_number, $workdays);

                array_push($all_stylists, $new_stylist);
            }

            return $all_stylists;
            }

        }





?>
