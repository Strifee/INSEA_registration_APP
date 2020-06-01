
<?php
	if(isset($_POST['create'])){

        require 'config.inc.php';

        $matricule = $_POST['matricule'];
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];
        $PasswordR = $_POST['PasswordR'];
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
        

        if (empty($matricule) || empty($Email) || empty($Password) || empty($PasswordR) || empty($firstname) || empty($lastname) || empty($cycle) || empty($filiere) || empty($niveau) || empty($date1) || empty($date2) || empty($image) || empty($cin) || empty($bac) || empty($reussite)) {
            echo "<script type=\'text/javascript\'>".
            "alert('Error : Empty Fields !');".
            "</script>";
            exit();
        }

        else if (!filter_var($Email, FILTER_VALID_EMAIL)){
            echo "<script type=\'text/javascript\'>".
            "alert('Error : Invalid Email !');".
            "</script>";
            exit();
        }

        else if (!preg_match("/^[a-zA-Z0-9]", $matricule){
            echo "<script type=\'text/javascript\'>".
            "alert('Error : Invalid matricule !');".
            "</script>";
            exit();
        }

        else if (!preg_match("/^[a-zA-Z]", $firstname){
            echo "<script type=\'text/javascript\'>".
            "alert('Error : Invalid firstname !');".
            "</script>";
            exit();
        }

        else if (!preg_match("/^[a-zA-Z]", $lastname){
            echo "<script type=\'text/javascript\'>".
            "alert('Error : Invalid lastname !');".
            "</script>";
            exit();
        }

        else if ($Password !== $PasswordR) {
            echo "<script type=\'text/javascript\'>".
            "alert('Error : Use the same Password !');".
            "</script>";
            exit();
        }
        
        is_image($image);
        is_image($cin);
        is_image($bac);
        si_image($reussite);


        $sql = " INSERT INTO users ( matricule , Email , Password , PasswordR , firstname , lastname , cycle , filiere , niveau , date1 , date2 , image ,  cin , bac , reussite )    VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ";
        $stmtinsert = $db->prepare($sql);
        $result = $stmtinsert->execute([$matricule,$Email,$Password,$PasswordR,$firstname,$lastname,$cycle,$filiere,$niveau,$date1,$date2,$image,$cin,$bac,$reussite]);
        if($result){
            echo "<script type=\'text/javascript\'>".
                    "alert('success');".
                    "</script>";
        }else{
            echo "Error!". mysql_error();
        }
    }


    function is_image($path) {
        $a = getimagesize($path);
        $image_type = $a[2];
        
        if(in_array($image_type , array(IMAGETYPE_JPEG , IMAGETYPE_JPEG ,IMAGETYPE_PNG)))
        {
            return true;
        }
        echo "<script type=\'text/javascript\'>".
        "alert('Error : Image type must be JPG , JPEG , PNG !');".
        "</script>";
        exit();;
    }
            
	?>	