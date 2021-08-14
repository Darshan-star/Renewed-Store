<?php

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['message'])){
    include 'db_conn.php';

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $phone = validate($_POST['phone']);
    $message = validate($_POST['message']);

    if (empty($name) || empty($email) || empty($phone) || empty($message)) {
        header("Location: contact.html");
    }
    else{
        $sql = "INSERT INTO contact(name, email, phone, message) VALUES('$name','$email','$phone','$message')";

        $res = mysqli_query($conn, $sql);

        if ($res){
            echo "Your message was send sucessfully";
        }
        else{
            echo "your message could not be send";
        }
    }

}
else{
    header("Location : contact.html");
}
?>