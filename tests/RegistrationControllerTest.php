<?php
require_once('../simpletest/autorun.php');
require_once('../RegistrationController.php');
require_once('../RegistrationRepository.php');

class RegistrationControllerTest extends UnitTestCase {
    private $registrationRepositorySpy;
    private $registrationController;
    private $confirmationViewSpy;

    function setUp() {
        $this->registrationRepositorySpy = (new class implements \Treehouse\iRegistrationRepository
        {
            public $registration;
            public function saveRegistration(\Treehouse\Registration $registration)
            {
                $this->registration = $registration;
            }
        });

        $this->confirmationViewSpy = (new class implements  \Treehouse\iConfirmationView
        {
            public $pageShown = false;
            public function showConfirmationPage()
            {
                $this->pageShown = true;
            }

        });

        $this->registrationController = new Treehouse\RegistrationController($this->registrationRepositorySpy,
            $this->confirmationViewSpy);
    }

    public function testShouldSaveRegistration() {
        $_POST['name'] = "paul";
        $_POST['email'] = "paulsideleau@yahoo.com";

        $this->registrationController->register();

        $this->assertNotNull($this->registrationRepositorySpy->registration);
        $this->assertEqual($this->registrationRepositorySpy->registration->getName(), $_POST['name']);
        $this->assertEqual($this->registrationRepositorySpy->registration->getEmail(), $_POST['email']);

        $this->assertTrue($this->confirmationViewSpy->pageShown);
    }
}

?>