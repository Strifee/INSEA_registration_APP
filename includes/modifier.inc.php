<?php
session_start();
if (isset($_POST['submit-mod'])) {
    require 'config.inc.php';

    $matricule = $_SESSION['userMatricule'];
    $Email = $_POST['Email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $cycle = $_POST['cycle'];
    $filiere = $_POST['filiere'];
    $niveau = $_POST['niveau'];
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    $image = $_POST['image'];
    $cin = $_POST['cin'];
    $bac = $_POST['bac'];
    $reussite = $_POST['reussite'];
    
    $sql = "UPDATE users SET Email=?, firstname=?, lastname=?, cycle=?, filiere=?, niveau=?, date1=?, date2=?, img=?, cin=?, bac=?, reussite=?  WHERE matricule=?;";
    $statment = mysqli_stmt_init($conn);//connect to the database 
    if (! mysqli_stmt_prepare( $statment, $sql)) { //cheking if our connection to the databse works
        header("Location: ../profile.php?error=sqlerror");
        exit();
    }
    else{
        mysqli_stmt_bind_param($statment, "ssssssssbbbbs", $Email, $firstname, $lastname, $cycle, $filiere, $niveau, $date1, $date2, $image, $cin, $bac, $reussite, $matricule);
        mysqli_stmt_execute($statment);
        header("Location: ../profile.php?signup=success");
        exit();
    }
    header("Location: ../profile.php");
    exit();
}                    