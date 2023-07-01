<?php

if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $guest = $_POST['guest'];
    $event =  $_POST['event'];
    $message = $_POST['message'];



    //conncett db

    $conn =  mysqli_connect('localhost', 'root', '');
    $select = mysqli_select_db($conn, 'wedding') or die(mysqli_error($conn));

    //sql query to save data to db
    $sql = "INSERT INTO registeration SET
full_name='$fullname',
email = '$email',
guest= '$guest',
event= '$event',
message= '$message'
";
    // execute query and save data to DB
    $result = mysqli_query($conn, $sql);

    if ($result = true) {
        echo 'yes';
    } else {
        echo 'no';
    }
}

//     $conn = new mysqli('localhost', 'root', '', 'wedding');
//     if ($conn->connect_error) {
//         die('connection Failed : ' . $conn->connect_error);
//     } else {
//         $result = $conn->prepare("insert into registration(fullname, email, guest, event, message)
// values(?, ?, ?, ?, ?)");
//         $result->bind_param("sssss", $fullname, $email, $guest, $event, $message);
//         $result->execute();
//         echo 'THANKS FOR REGISTERING...';
//         $result->close();
//         $conn->close();
//     };
// }