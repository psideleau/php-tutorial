<?php
 include 'Registration.php';
?>
<html>
<head>
    <title>PHP Test</title>
</head>
<body>
<?php
$registration = new Treehouse\Registration("POST", "RegistrationController");
$registration->displayForm();
?>
</body>
</html>