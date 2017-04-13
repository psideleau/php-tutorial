<?php
/**
 * Created by PhpStorm.
 * User: paulsideleau
 * Date: 4/13/17
 * Time: 12:45 AM
 */

namespace Treehouse;


class Registration
{
    private $name;
    private $email;

    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }


    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

}