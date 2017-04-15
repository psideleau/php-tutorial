<?php
namespace Treehouse;
include('Registration.php');

interface iRegistrationRepository
{
    public function saveRegistration(Registration $registration);
}

class RegistrationRepository implements iRegistrationRepository
{
    function __construct()
    {
    }

    public function saveRegistration(Registration $registration)
    {
        $this->executeQuery(function ($db) use ($registration) {
            $name = $registration->getName();
            $email = $registration->getEmail();
            $stmt = $db->prepare("INSERT INTO Registrations (name, email) VALUES (?, ?)");
            $stmt->bind_param("ss", $name, $email);

            $success = $stmt->execute();

            if (!$success)
            {
                throw new \Exception("Insert failed");
            }

            $stmt->close();
        });
    }

    public function findRegistrations()
    {

       return $this->executeQuery(function ($db)  {
            $name = "";
            $email = "";
            $dateRegistered = "";

            $stmt =  $db->prepare("select name, email, date_registered from Registrations order by date_registered desc");
            $stmt->execute();

            $stmt->bind_result($name, $email, $dateRegistered);

            $registrations = array();
            while ($stmt->fetch()) {
               $registration = new Registration($name, $email, $dateRegistered);
               $registrations[] = $registration;
            }
            $stmt->close();

            return $registrations;
        });

    }

    private function executeQuery($sqlExecutor)
    {
        $db = $this->getConnection();

        try {
            return $sqlExecutor($db);
        }
        finally{
            $db->close();
        }
    }


    /**
     * @return \mysqli
     */
    private function getConnection(): \mysqli
    {
        $db = new \mysqli('localhost', 'registration', 'make_me_a_proper_password', 'newsletter');

        if ($db->connect_errno > 0) {
            throw new Exception('Unable to connect to database [' . $db->connect_error . ']');
        }
        return $db;
    }

}
?>