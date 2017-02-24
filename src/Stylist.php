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

        function updateStylist($new_phone_number = null, $new_workdays = null)
        {
            if ($new_phone_number != null) {
            $GLOBALS['DB']->exec("UPDATE stylists SET phone_number = '{$new_phone_number}' WHERE id = {$this->getId()};");
            $this->setPhoneNumber($new_phone_number);
            }
            if ($new_workdays != null) {
            $GLOBALS['DB']->exec("UPDATE stylists SET workdays = '{$new_workdays}' WHERE id = {$this->getId()};");
            $this->setWorkdays($new_workdays);
            }
        }

        function deleteStylist() {
            
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

        static function deleteAllStylists()
        {
            $GLOBALS['DB']->exec("DELETE FROM stylists;");
        }

        static function findStylist($search_id)
        {
            $found_stylist = null;
            $stylists = Stylist::getAllStylists();
            foreach($stylists as $stylist) {
                $stylist_id = $stylist->getId();
                if($stylist_id == $search_id) {
                    $found_stylist = $stylist;
                }
            }
            return $found_stylist;
        }






    }
?>
