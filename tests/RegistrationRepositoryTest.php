<?php
require_once('../simpletest/autorun.php');
require_once('../RegistrationRepository.php');
require_once('../Registration.php');

class RegistrationRepositoryTest extends UnitTestCase
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

        $data = $this->generateNameAndEmail();
        $this->name = $data['name'];
        $this->email = $data['email'];
    }

    function generateNameAndEmail()
    {
        return [
            "email" => uniqid() . "@test.com",
            "name" => uniqid(),
        ];
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
        $registration = new Treehouse\Registration($this->name, $this->email, null);
        $this->repository->saveRegistration($registration);

        $stmt = $this->db->prepare("select name, email, date_registered from Registrations where email = ?");
        $stmt->bind_param("s", $this->email);

        $stmt->execute();

        mysqli_stmt_bind_result($stmt, $rowName, $rowEmail, $dateRegistered);
        mysqli_stmt_fetch($stmt);
        $stmt->close();


        $this->assertEqual($this->name, $rowName);
        $this->assertEqual($this->email, $rowEmail);
        $this->assertNotNull($dateRegistered);
    }

    public function testShouldReturnRegistrations() {
        $registrationFirst = new Treehouse\Registration($this->name, $this->email);

        $data = $this->generateNameAndEmail();
        $registrationLast = new Treehouse\Registration($data['name'], $data['email']);

        $this->repository->saveRegistration($registrationFirst);
        sleep(1);
        $this->repository->saveRegistration($registrationLast);

        $registrations = $this->repository->findRegistrations();

        $this->assertEqual($registrations[0]->getName(),  $registrationLast->getName());
        $this->assertEqual($registrations[0]->getEmail(), $registrationLast->getEmail());
        $this->assertEqual($registrations[1]->getName(),  $registrationFirst->getName());
        $this->assertEqual($registrations[1]->getEmail(), $registrationFirst->getEmail());

    }
}

?>