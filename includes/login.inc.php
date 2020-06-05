<?php
    
if (isset($_POST['login-submit'])) {
    require 'dbh.inc.php';

    $matricule = $_POST["matricule"];
    $pwd = $_POST["Password"];

    if (empty($matricule) || empty($pwd) ){
        header("Location: ../login.php?error=emtyfields&Matricule=".$matricule);
        exit();
    }else{
        $sql = "SELECT * FROM users WHERE matricule=?;";
        $statment = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($statment, $sql)){//cheking if our connection to the databse doesn't work
            header("Location: ../login.php?error=sqlerror1");
        exit();
        }else{
            mysqli_stmt_bind_param($statment, "s", $email , $pwd);
            mysqli_stmt_execute($statment);
            $result = mysqli_stmt_get_result($statment);
            if ($row = mysqli_fetch_assoc($result)) {
                //fetching the result in an associative array, so we can use it after
                $pwdCheck = password_verify($password,$row['password']);
                if ($pwdCheck == false) {//if the password is wrong
                    header("Location: ../login.php?error=wrongpassword");
                    exit();
                }elseif ($pwdCheck == true){
                    session_start();
                    $_SESSION['userMatricule'] = $row['matricule'];
                    $_SESSION['unserFirstname'] = $row['firstname'];
                    $_SESSION['unserLastname'] = $row['lastname'];
                    $_SESSION['unserEmail'] = $row['Email'];


                    header("Location: ../index.php?login=success");
                    exit();

                }else{//if the password is wrong
                    header("Location: ../login.php?error=wrongpassword");
                    exit();
                }
            }else{
                header("Location: ../login.php?error=no_user");
                exit();
            }
            
        }
    }
}else{
    header("Location: ../login.php");
    exit();
}