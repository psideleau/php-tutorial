<?php
namespace Treehouse;
include('Registration.php');

class RegistrationRepository
{
    function __construct()
    {
    }

    public function saveRegistration(Registration $registration)
    {
        $db = new \mysqli('localhost', 'registration', 'make_me_a_proper_password', 'newsletter');

        if ($db->connect_errno > 0) {
            throw new Exception('Unable to connect to database [' . $db->connect_error . ']');
        }

        try
        {
            $name = $registration->getName();
            $email = $registration->getEmail();
            $stmt = $db->prepare("INSERT INTO Registrations (name, email) VALUES (?, ?)");
            $stmt->bind_param("ss", $name, $email);

            $success = $stmt->execute();

            if (!$success)
            {
                throw new Exception("Insert failed");
            }

            $stmt->close();
        }
        finally
        {
            $db->close();
        }
    }

}
?>