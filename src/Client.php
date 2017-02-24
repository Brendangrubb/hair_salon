<?php
    class Client
    {
        private $id;
        private $name;
        private $phone_number;
        private $stylist_id;

        function __construct($id = null, $name, $phone_number, $stylist_id)
        {
            $this->id = $id;
            $this->name = $name;
            $this->phone_number = $phone_number;
            $this->stylist_id = $stylist_id;
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

        function setStylistId($new_stylist_id)
        {
            $this->stylist_id = (int) $new_stylist_id;
        }

        function getStylistId()
        {
            return $this->stylist_id;
        }


        

    }
?>
