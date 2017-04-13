<?php
$db = new mysqli('localhost', 'registration', 'make_me_a_proper_password', 'newsletter');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}
else {
    echo "connected to db";
}

try {
    $stmt = $db->prepare("INSERT INTO Registrations (name, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $_GET["name"], $_GET["email"]);
    $success = $stmt->execute();

    if ($success) {
        echo "THIS ISW WORKING $success";
    }

    $stmt->close();
}
finally {
    $db->close();
}
?>
