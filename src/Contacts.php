<?php
    class Contact
    {
        private $first_name;
        private $last_name;
        private $phone_number;
        private $address;

        function __construct($new_first_name, $new_last_name, $new_phone_number, $new_address)
        {
            $this->first_name = $new_first_name;
            $this->last_name = $new_last_name;
            $this->phone_number = $new_phone_number;
            $this->address = $new_address;
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

        function showFullName()
        {
            return $this->first_name . " " . $this->last_name;
        }

    }


 ?>
