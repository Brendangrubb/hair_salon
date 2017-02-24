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
    //CRUD METHODS
        function saveClient()
        {
            $GLOBALS['DB']->exec("INSERT INTO clients (name, phone_number, stylist_id) VALUES ('{$this->getName()}', '{$this->getPhoneNumber()}', '{$this->getStylistId()}');");
            $this->id = $GLOBALS['DB']->lastInsertID();
        }

        function updateClient($new_phone_number = null)
        {
            if ($new_phone_number != null) {
            $GLOBALS['DB']->exec("UPDATE clients SET phone_number = '{$new_phone_number}' WHERE id = {$this->getId()};");
            $this->setPhoneNumber($new_phone_number);
            }
        }

        function deleteClient()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients WHERE id = {$this->getId()};");              
        }

        static function getAllClients()
        {
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients;");
            $all_clients = array();

            foreach ($returned_clients as $client) {
                $id = $client['id'];
                $name = $client['name'];
                $phone_number = $client['phone_number'];
                $stylist_id = $client['stylist_id'];
                $new_client = new Client($id, $name, $phone_number, $stylist_id);

                array_push($all_clients, $new_client);
            }

            return $all_clients;
        }

        static function deleteAllClients()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients;");
        }

        static function findClient($search_id)
        {
            $found_client = null;
            $clients = Client::getAllClients();
            foreach($clients as $client) {
                $client_id = $client->getId();
                if($client_id == $search_id) {
                    $found_client = $client;
                }
            }
            return $found_client;
        }




    }
?>
