<?php
namespace Treehouse;
include ('RegistrationRepository.php');

$registrationRepository = new RegistrationRepository();
$registrations = $registrationRepository->findRegistrations();
?>

<html>
    <table>
        <?php
        foreach ($registrations as $registration) {
            echo '<tr>';
            echo '<td>'.$registration->getName().'</td>';
            echo '<td>'.$registration->getEmail().'</td>';
            echo '<td>'.$registration->getDateRegistered().'</td>';
            echo '</tr>';
         }
        ?>
    </table>
</html>