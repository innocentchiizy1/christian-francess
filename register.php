<?php

if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $guest = $_POST['guest'];
    $event =  $_POST['event'];
    $asoebi =  $_POST['asoebi'];

    $message = $_POST['message'];



    //conncett db

    $conn =  mysqli_connect('localhost', 'root', '');
    $select = mysqli_select_db($conn, 'wedding') or die(mysqli_error($conn));

    //sql query to save data to db
    $sql = "INSERT INTO registeration SET
full_name='$fullname',
email = '$email',
phone= '$phone',
asoebi = '$asoebi',
guest= '$guest',
event= '$event',
message= '$message'
";
    // execute query and save data to DB
    $resultt = mysqli_query($conn, $sql);



    //PHP code to sent contact form to both client and owner
    //Check if user enter data
    $mailto = "innocentchiizy1@gmail.com"; //My email address
    $from = $_POST['email']; //Senders email address
    $name = $_POST['fullname']; //User name
    $subject = $_POST['message'];
    $subject2 = "Your Message Submitted Successfully!"; //This is for client
    $message = "Client Name: " . $name . ", Wrote the Following Message" . "\n\n" . $_POST['message'];
    $message2 = "Dear" . $name . "\n\n" . "Thank You for contacting us! We'll get back to you shortly"; //This
    $headers = "From: " . $from; // User entered email address
    $headers2 = "From: " . $mailto; //This will receive to client
    $result = mail($mailto, $subject, $message, $headers); //send email to website owner
    $result2 = mail($from, $subject2, $message2, $headers2); //send email to User as well
    if ($result) {
        echo '<script type="text/javascript"›alert("Message Sent. Thank you! We will contact you shortly.")</script>';
    } else {
        echo '<script type="text/javascript"›alert("Submission failed! Try again Later") </script›';
    }
}
