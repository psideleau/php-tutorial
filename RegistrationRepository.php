<?php
  include 'Registration.php'
/**
 * Created by PhpStorm.
 * User: paulsideleau
 * Date: 4/11/17
 * Time: 8:08 PM
 */

namespace Treehouse;


class RegistrationRepository
{

    public function saveRegistration(Registration $registration)
    {
        $db = new mysqli('localhost', 'registration', 'make_me_a_proper_password', 'newsletter');

        if ($db->connect_errno > 0) {
            throw new Exception('Unable to connect to database [' . $db->connect_error . ']');
        }

        try {
            $stmt = $db->prepare("INSERT INTO Registrations (name, email) VALUES (?, ?)");
            $stmt->bind_param("ss", $registration->getName(), $registration->getEmail());
            $success = $stmt->execute();

            if ($success) {
                echo "THIS ISW WORKING $success";
            }

            $stmt->close();
        }
        finally {
            $db->close(
    }

}