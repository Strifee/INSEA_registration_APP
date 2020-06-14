<?php
	if(isset($_POST['create'])){

        require 'config.inc.php';

        $matricule = $_POST['matricule'];
        $Email = $_POST['Email'];
        $pwd = $_POST['Password'];
        $pwdR = $_POST['PasswordR'];
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
        

        if (empty($matricule) || empty($Email) || empty($pwd) || empty($pwdR) || empty($firstname) || empty($lastname) || empty($cycle) || empty($filiere) || empty($niveau) || empty($date1) || empty($date2) || empty($image) || empty($cin) || empty($bac) || empty($reussite)) {
            header("Location: ../signup.php?error=emtyfields&Matricule=".$matricule);
            exit();
        }else if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../signup.php?error=invalidEmail&Matricule=".$matricule);
            exit();
        }else if (!preg_match("/^[a-zA-Z0-9]*$/",$matricule)){
            header("Location: ../signup.php?error=invalidMatricule&Matricule=".$matricule);
            exit();
        }else if (!preg_match("/^[a-zA-Z]*$/", $firstname)){
            header("Location: ../signup.php?error=invalidFirstname&Matricule=".$matricule);
            exit();

        }else if ($pwd !== $pwdR) {
            header("Location: ../signup.php?error=invalidPassword&Matricule=".$matricule);
            exit();
        }else{// to check if the email is already used
            $sql = "SELECT * FROM users WHERE Email=?;";// checking if the email exists in the databse 
            $statment = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($statment, $sql)) { //cheking if our connection to the databse doesn't work
                header("Location: ../signup.php?error=sqlerror1");
                exit();
            }else{
                mysqli_stmt_bind_param($statment, "s", $Email);
                mysqli_stmt_execute($statment);
                mysqli_store_result($statment);
                $resultcheck = mysqli_stmt_num_rows($statment);//stores the number of the same emails in the database
                if ($resultcheck > 0){
                    header("Location: ../signup.php?error=emailused");
                    exit();
                }
                else {
                    $sql = " INSERT INTO users( matricule , Email , pwd , firstname , lastname , cycle , filiere , niveau , date1 , date2 , img , cin , bac , reussite )    VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                    $statment = mysqli_stmt_init($conn);//connect to the database 
                    if (! mysqli_stmt_prepare( $statment, $sql)) { //cheking if our connection to the databse works
                        header("Location: ../signup.php?error=sqlerror2");
                        exit();
                    }
                    else{
                        mysqli_stmt_bind_param($statment, "ssssssssssbbbb",$matricule,$Email,$pwd,$firstname,$lastname,$cycle,$filiere,$niveau,$date1,$date2,$image,$cin,$bac,$reussite);
                        mysqli_stmt_execute($statment);
                        header("Location: ../login.php?signup=success");
                        exit();
                    }
            }
        }
        }
        mysqli_stmt_close($statment);//closing the statment
        mysqli_close($conn);
        }else{
        header("Location: ../signup.php");
        exit();
    }
    
    function is_image($path) {
        $a = getimagesize($path);
        $image_type = $a[2];
        
        if(in_array($image_type , array("jpg","jpeg","png")))
        {
            return 1;
        }else{
            return 0;
    }
}
     
    ?>