<?php
 include 'RegistrationComponent.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>News letter registration</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="resources/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="resources/css/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>
    <body>
            <div class="container">
                <?php
                $registration = new Treehouse\RegistrationComponent("POST", "RegistrationControllerPost.php");
                $registration->displayForm();
                 ?>
            </div>
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="resources/js/bootstrap.js"></script>
    </body>
</html>