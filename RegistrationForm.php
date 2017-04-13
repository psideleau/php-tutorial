<?php
 include 'RegistrationComponent.php';
?>
<html>
<head>
    <title>News letter registration</title>
</head>
<body>
<?php
$registration = new Treehouse\RegistrationComponent("POST", "RegistrationController");
$registration->displayForm();
?>
</body>
</html>