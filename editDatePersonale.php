<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname="bestparts";
    $con=mysqli_connect("$servername","$username","$password","$dbname");

    
    $uname = $_SESSION['uname'];
    if(isset($_POST['ok_date_pers'])){
        

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $phone = $_POST['phone'];
        $birth = $_POST['birth'];
        $email = $_POST['email'];
        $pass  = $_POST['pass'];


        if ( !filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $error = true;
            $emailError = "Please enter valid email address.";
        } 

        $password = hash('sha256', $pass);
        if(!isset($error)){
            $query = "UPDATE bestparts.users SET Nume= '$lastname', Prenume='$firstname', Parola='$password', Numar_Telefon='$phone', Data_Nasterii='$birth', Adresa_Email='$email'  WHERE Nume_Utilizator='$uname'";
            $result=mysqli_query($con,$query);
            
        }
    }
    if(isset($_POST['ok_date_livrare'])){
        //die($_POST["adress"]);
        
        $plata=$_POST['plata'];
        $adresa2=$_POST['adress'];
        $localitate2=$_POST['city'];
        $judet2=$_POST['county'];

        $query = "UPDATE bestparts.users SET Tip_Plata='$plata', Adresa='$adresa2', Localitate='$localitate2', Judet='$judet2' WHERE Nume_Utilizator='$uname'";
        $result=mysqli_query($con,$query);
        
    }
    header("Location: editProfile.php");
?>