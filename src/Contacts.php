<?php
    class Contacts
    {
        private $first_name;
        private $last_name;
        private $email;
        private $phone_number;
        private $address;
        // private $uniqueID;

        function __construct($new_first_name, $new_last_name, $email, $new_phone_number, $new_address)
        {
            $this->first_name = $new_first_name;
            $this->last_name = $new_last_name;
            $this->email = $email;
            $this->phone_number = $new_phone_number;
            $this->address = $new_address;
            // $this->uniqueID = $new_ID;
        }

        function getFirstName()
        {
            return $this->first_name;
        }

        function setFirstName($new_first_name)
        {
            $this->first_name = (string) $new_first_name;
        }

        function getLastName()
        {
            return $this->last_name;
        }

        function setLastName($new_last_name)
        {
            $this->last_name = (string) $new_last_name;
        }

        function getEmail()
        {
            return $this->email;
        }

        function setEmail($new_email)
        {
            $this->email = (string) $new_email;
        }

        function getPhoneNumber()
        {
            return $this->phone_number;
        }

        function setPhoneNumber($new_phone_number)
        {
            $this->phone_number = (string) $new_phone_number;
        }

        function getAddress()
        {
            return $this->address;
        }

        function setAddress($new_address)
        {
            $this->address = (string) $new_address;
        }

        // function getUniqueID()
        // {
        //     return $this->uniqueID;
        // }
        //
        // function setuniqueID($new_ID)
        // {
        //     $this->uniqueID = (float) $new_ID;
        // }

        function showFullName()
        {
            return $this->first_name . " " . $this->last_name;
        }

        function save()
        {
            array_push($_SESSION[CONTACTS_SESSION_KEY], $this);
        }

        function deleteContact()
        {
            array_splice($_SESSION[CONTACTS_SESSION_KEY], $this);
        }

        static function getAll()
        {
            return $_SESSION[CONTACTS_SESSION_KEY];
        }

        static function deleteAll()
        {
            $_SESSION[CONTACTS_SESSION_KEY] = array();
        }

    }


 ?>
