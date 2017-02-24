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












    }

?>
