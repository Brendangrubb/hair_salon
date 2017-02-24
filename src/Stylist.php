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

        }

        function getWorkdays()
        {

        }










    }

?>
