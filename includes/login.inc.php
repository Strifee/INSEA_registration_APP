<?php
    
if (isset($_POST['login'])) {
    require 'config.inc.php';

    $matricule = $_POST["matricule"];
    $pwd = $_POST["Password"];


    if (empty($matricule) || empty($pwd)){
        header("Location: ../login.php?error=emtyfields&Matricule=".$matricule);
        exit();
    }else{
        
        $sql = "SELECT * FROM users WHERE matricule=?;";
        $statment = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($statment, $sql)){//cheking if our connection to the databse doesn't work
            header("Location: ../login.php?error=sqlerror1");
        exit();
        }else{
            mysqli_stmt_bind_param($statment, "s", $matricule);
            mysqli_stmt_execute($statment);
            $result = mysqli_stmt_get_result($statment);
            if ($row = mysqli_fetch_assoc($result)) {
                //fetching the result in an associative array, so we can use it after
                    $pwdCheck = password_verify($pwd, $row['pwd']);
                if ($pwdCheck == FALSE) {//if the password is wrong
                    header("Location: ../login.php?error=wrongpassword");
                    exit();
                }else if ($pwdCheck == TRUE){
                    session_start();
                    $_SESSION['userMatricule'] = $row['matricule'];
                    $_SESSION['userFirstname'] = $row['firstname'];
                    $_SESSION['userLastname'] = $row['lastname'];
                    $_SESSION['userEmail'] = $row['Email'];
                    $_SESSION['userNiveau'] = $row['niveau'];
                    $_SESSION['userFiliere'] = $row['filiere'];
                    $_SESSION['userDateNaissance'] = $row['date1'];
                    $_SESSION['userDateinscr'] = $row['date2'];
                    $_SESSION['userImage'] = $row['img'];
                    $_SESSION['userCIN'] = $row['cin'];
                    $_SESSION['userBAC'] = $row['bac'];
                    $_SESSION['userReussite'] = $row['reussite'];



                    header("Location: ../profile.php?login=".$matricule);
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

?>