<?php
require_once('../simpletest/autorun.php');
require_once('../RegistrationComponent.php');

class RegistrationComponentTest extends UnitTestCase {
    private $method;
    private $action;
    private $registration;

    function setUp() {
        $this->method = "POST";
        $this->action = "RegistrationController";
        $this->registration = new Treehouse\RegistrationComponent($this->method, $this->action);
    }

    public function testFormIsCreatedCorrectlyWithValidation() {
        $this->registration->enableValidation(true);
        $this->assertEqual("<form method=\"$this->method\" action=\"$this->action\">",
                           $this->registration->createFormElement());
    }

    public function testFormIsCreatedCorrectlyWithNoValidation() {
        $this->registration->enableValidation(false);
        $this->assertEqual("<form method=\"$this->method\" action=\"$this->action\" novalidate>",
                           $this->registration->createFormElement());
    }

}

?>