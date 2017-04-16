<?php
namespace Treehouse;

class Registration
{
    private $name;
    private $email;
    private $dateRegistered;

    public function __construct($name, $email, $dateRegistered = null)
    {
        $this->name = $name;
        $this->email = $email;
        $this->dateRegistered = $dateRegistered;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getDateRegistered()
    {
        return $this->dateRegistered;
    }
}