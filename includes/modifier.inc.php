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
    
    $imageName = $image['name'];
    $imageTmpName = $image['tmp_name'];
    $imageSize = $image['size'];
    $imageError = $image['error'];
    $imageType = $image['type'];

    $imageExt  = explode('.', $imageName);
    $imageActualExt = strtolower((end($imageExt)));


    $cinName = $cin['name'];
    $cinTmpName = $cin['tmp_name'];
    $cinSize = $cin['size'];
    $cinError = $cin['error'];
    $cinType = $cin['type'];

    $cinExt  = explode('.', $cinName);
    $cinActualExt = strtolower((end($cinExt)));


    $bacName = $bac['name'];
    $bacTmpName = $bac['tmp_name'];
    $bacSize = $bac['size'];
    $bacError = $bac['error'];
    $bacType = $bac['type'];

    $bacExt  = explode('.', $bacName);
    $bacActualExt = strtolower((end($bacExt)));


    $reussiteName = $reussite['name'];
    $reussiteTmpName = $reussite['tmp_name'];
    $reussiteSize = $reussite['size'];
    $reussiteError = $reussite['error'];
    $reussiteType = $reussite['type'];

    $reussiteExt  = explode('.', $reussiteName);
    $reussiteActualExt = strtolower((end($reussiteExt)));



    $allowed = array('jpg', 'jpeg', 'png');


    $sql = "UPDATE users SET Email=?, firstname=?, lastname=?, cycle=?, filiere=?, niveau=?, date1=?, date2=?, img=?, cin=?, bac=?, reussite=?  WHERE matricule='$matricule';";
    $statment = mysqli_stmt_init($conn);//connect to the database 
    if (! mysqli_stmt_prepare( $statment, $sql)) { //cheking if our connection to the databse works
        header("Location: ../profile.php?error=sqlerror");
        exit();
    }
    else{
        $imageNameNew = uniqid('',true).".".$imageActualExt;
        $imageDestination ='image/Photo'.$imageNameNew;
        move_uploaded_file($imageTmpName, $imageDestination);
        
        $cinNameNew = uniqid('',true).".".$cinActualExt;
        $cinDestination ='image/BAC'.$imageNameNew;
        move_uploaded_file($cinTmpName, $cinDestination);

        $bacNameNew = uniqid('',true).".".$bacActualExt;
        $bacDestination ='image/CIN'.$imageNameNew;
        move_uploaded_file($bacTmpName, $bacDestination);
        
        $reussiteNameNew = uniqid('',true).".".$reussiteActualExt;
        $reussiteDestination ='image/attestation'.$reussiteNameNew;
        move_uploaded_file($reussiteTmpName, $reussiteDestination);

        
        mysqli_stmt_bind_param($statment, "sssssssssssss", $Email, $firstname, $lastname, $cycle, $filiere, $niveau, $date1, $date2, $image, $cin, $bac, $reussite, $matricule);
        mysqli_stmt_execute($statment);
        header("Location: ../profile.php?signup=success");
        exit();
    }
    header("Location: ../profile.php");
    exit();
}                    