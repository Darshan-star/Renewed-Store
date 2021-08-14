<?php

if(isset($_POST['username']) && isset($_POST['password'])){
    include 'db_conn.php';

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    if (empty($username) || empty($password)) {
        header("Location: account.html");
    }
    else{
        $sql = "INSERT INTO login(username, password) VALUES('$username','$password')";

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
    header("Location : account.html");
}