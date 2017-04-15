<?php
namespace Treehouse;
require_once('RegistrationRepository.php');
require_once('RegistrationController.php');

$confirmationPage = (new class implements iConfirmationView
{
    public function showConfirmationPage()
    {
        header('Location: ' . 'RegistrationConfirmation.html', true, 302);
        die();
    }
});

$controller = new RegistrationController(new RegistrationRepository(), $confirmationPage);
$controller->register();