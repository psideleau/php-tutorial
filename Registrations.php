<?php
namespace Treehouse;
include ('RegistrationRepository.php');

$registrationRepository = new RegistrationRepository();
$registrations = $registrationRepository->findRegistrations();
?>
<!DOCTYPE html>
<html>
  <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="resources/css/bootstrap-responsive.min.css" rel="stylesheet">
      <link href="resources/css/bootstrap.min.css" rel="stylesheet" media="screen">
  </head>
  <body>
    <div class="table-responsive">
      <table class="table table-striped">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Date Registered</td>
                </tr>
            </thead>
           <tbody>
                <?php
                foreach ($registrations as $registration) {
                    echo '<tr>';
                    echo '<td>'.$registration->getName().'</td>';
                    echo '<td>'.$registration->getEmail().'</td>';
                    echo '<td>'.$registration->getDateRegistered().'</td>';
                    echo '</tr>';
                 }
                ?>
           </tbody>
        </table>
    </div>
  <body>
  <script src="http://code.jquery.com/jquery.js"></script>
  <script src="resources/js/bootstrap.js"></script>
</html>