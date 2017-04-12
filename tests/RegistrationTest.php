<?php
require_once('../simpletest/autorun.php');
require_once('../Registration.php');

class RegistrationTest extends UnitTestCase {
    function testFormIsCreatedCorrectly() {
        $method = "post";
        $action = "RegistrationController";
        $registration = new Treehouse\Registration($method, $action);
        $this->assertEqual("<form method=\"$method\" action=\"$action\">", $registration->createFormElement());
        $this->assertTrue((1==1));
    }
}

?>