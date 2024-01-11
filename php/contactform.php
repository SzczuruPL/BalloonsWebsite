<?php
    if(isset($_POST['email']) && isset($_POST['imie']) && isset($_POST['tresc']))
    {
        include 'database.php';
        $email = $_POST['email'];
        $imie = $_POST['imie'];
        $tresc = $_POST['tresc'];

        $temp = "INSERT INTO contact (email,imie,tresc) VALUES ('$email','$imie','$tresc');";
        if(mysqli_querry($connection,$temp))
        {
            echo "Zgłoszenie zostało przyjęte";
        }
        else
        {
            echo "Kurwa znowu nie działa";
        }
    }
?>