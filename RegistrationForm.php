<?php
 include 'RegistrationComponent.php';
?>
<html>
<head>
    <title>News letter registration</title>
</head>
<body>
<?php
$registration = new Treehouse\RegistrationComponent("POST", "RegistrationControllerPost.php");
$registration->displayForm();
?>
</body>
</html>