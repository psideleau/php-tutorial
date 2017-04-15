<?php
namespace Treehouse;
require_once('RegistrationRepository.php');

interface iConfirmationView
{
    public function showConfirmationPage();
}

class RegistrationController
{
    private $registrationRepository;
    private $confirmationPage;

    public function __construct($registrationRepository, $confirmationPage)
    {
        $this->registrationRepository = $registrationRepository;
        $this->confirmationPage = $confirmationPage;
    }

    public function register()
    {
        print_r($_POST);
        $registration = new \Treehouse\Registration($_POST["name"], $_POST["email"]);

        $this->registrationRepository->saveRegistration($registration);

        $this->confirmationPage->showConfirmationPage();
    }

}

