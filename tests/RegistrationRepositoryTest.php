<?php
require_once('../simpletest/autorun.php');
require_once('../RegistrationRepository.php');
require_once('../Registration.php');

class RegistrationComponentTest extends UnitTestCase
{
    private $db;
    private $repository;
    private $email;
    private $name;

    function setUp()
    {
        $this->db = new mysqli('localhost', 'integrationtest', 'test', 'newsletter');

        if ($this->db->connect_errno > 0) {
            throw new Exception('Unable to connect to database [' . $this->dbconnect_error . ']');
        }

        $this->repository = new Treehouse\RegistrationRepository();
        $this->name = uniqid();
        $this->email = uniqid() . "@test.com";
    }

    function tearDown()
    {
        try {
            $stmt = $this->db->prepare("Delete from registrations where email = ?");
            $email = $this->email;
            $stmt->bind_param("s", $email);
            $stmt->close();
        }
        finally {
            $this->db->close();
        }
    }

    public function testShouldCreateRegistration()
    {
        $registration = new Treehouse\Registration($this->name, $this->email);
        $this->repository->saveRegistration($registration);
    }

}

?>