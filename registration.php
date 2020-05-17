<?php
require_once('config.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>	
    <link rel="stylesheet" type="text/css" href="styles/regStyle.css">
</head>
<body>
    

<div>
	<?php
	if(isset($_POST['create'])){
        $matricule = $_POST['matricule'];
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
        
        $sql = " INSERT INTO users ( matricule , firstname , lastname , cycle , filiere , niveau , date1 , date2 , image ,  cin , bac , reussite )    VALUES(?,?,?,?,?,?,?,?,?,?,?,?) ";
        $stmtinsert = $db->prepare($sql);
        $result = $stmtinsert->execute([$matricule,$firstname,$lastname,$cycle,$filiere,$niveau,$date1,$date2,$image,$cin,$bac,$reussite]);
        if($result){
        echo "success !";
        }else{
            echo "Error while saving !" ; 
        }
    }
	?>	
</div>
<section class="container-fluid">
    <div class="form-groupe" >
        <div class="card-body col-xs-1" >
            <form class="form-container text-center p-5" style="color: #fff;" action="registration.php" method="post">
                            <h5 class="card-header text-center py-4" >
                                <img src="https://upload.wikimedia.org/wikipedia/commons/0/05/INSEA_logo.png" style=" width:100px; height=100px;">
                                <strong style="font-size:50px;">Inscription</strong>
                                <br>
                            <p>Veuillez remplir toutes les informations.</p>
                            </h5>
                            <div class="form-group">
                                <label for="inputdefault"><b><strong style="font-size:20px;">Matricule</strong></b>
                                </label>
                                <input class="form-control" id="matricule"  type="text" name="matricule" required>
                            </div>

                            <br>
                            <div class="form-group">
                                <label for="inputdefault"><b><strong style="font-size:20px;">Nom</strong></b></label>
                                <input class="form-control" id="firstname" type="text" name="firstname" required>
                            </div>

                            <br>

                            <div class="form-group">
                                <label for="inputdefault"><b><strong style="font-size:20px;">Prenom</strong></b></label>
                                <input class="form-control" id="lastname"  type="text" name="lastname" required>
                            </div>

                            <br>

                            <div class="form-group">
                                <label for="inputdefault"><b><strong style="font-size:20px;">Cycle</strong></b></label>
                                <select  class="form-control" id="cycle" name="cycle">
                                    <option value="ingenieur">ingénieurs-d’Etat</option>
                                    <option value="Master">Master</option>
                                    <option value="Doctorat">Doctorat</option>
                                </select>
                            </div> 
                            
                            <br>

                            <div class="form-group">
                                <label for="inputdefault"><b><strong style="font-size:20px;">Filière</strong></b></label>
                                <select  class="form-control" id="filiere" name="filiere">
                                    <option value="AF">Actuariat-Finance</option>
                                    <option value="DSE">Ingénierie des Données et des Logiciels</option>
                                    <option value="ROAD">Recherche Opérationnelle et Aide à la Décision</option>
                                    <option value="DS">Science des Données</option>
                                    <option value="Stat-Demo">Statistique-Démographie</option>
                                    <option value="Stat-Eco">Statistique-Economie Appliquée</option>
                                </select>
                            </div>
                            
                            <br>

                            <div class="form-group">
                            <label for="inputdefault"><b><strong style="font-size:20px;">Niveau</strong></b></label>
                                <select  class="form-control" id="niveau" name="niveau">
                                    <option value="1ere">1ere année</option>
                                    <option value="2eme">2eme année</option>
                                    <option value="3eme">3eme année</option>
                                </select>
                            </div>

                            <br>

                            <div class="form-group">
                                <label for="inputdefault"><b><strong style="font-size:20px;">Date De Naissance</strong></b></label>
                                <input class="form-control" id="date1"  type="date" name="date1" required>
                            </div>

                            <br>

                            <div class="form-group">
                                <label for="inputdefault"><b><strong style="font-size:20px;">Date D'inscription</strong></b></label>
                                <input class="form-control" id="date2"  type="date" name="date2" required>
                            </div>
                            
                            <br>

                            <div class="form-group">
                                <label for="inputdefault"><b><strong style="font-size:20px;">Photo</strong></b></label>
                                <input class="form-control" id="image"  type="file" name="image" required>
                            </div>

                            <br>

                            <div class="form-group">
                                <label for="inputdefault"><b><strong style="font-size:20px;">Copie de la CIN</strong></b></label>
                                <input class="form-control" id="cin"  type="file" name="cin" required>
                            </div>

                            <br>

                            <div class="form-group">
                                <label for="inputdefault"><b><strong style="font-size:20px;">Copie du Baccalauréat</strong></b></label>
                                <input class="form-control" id="bac"  type="file" name="bac" required>
                            </div>

                            <br>

                            <div class="form-group">
                                <label for="inputdefault"><b><strong style="font-size:20px;">Attestation de réussite (CNC,DEUGS ou Licence)</strong></b></label>
                                <input class="form-control" id="reussite"  type="file" name="reussite" required>
                            </div>

                            <div class="form-group">
                                <hr class="mb-3">
                                <input class="btn btn-success " type="submit" id="register" name="create" value="Sign Up">
                            </div>
            </form>
        </div>
    </div>
</section> 


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    $(function(){
        $('#register').click(function()){
            swal({
            title: "félicitation ",
            text: "Inscription Validée !",
            icon: "success",
            
        });
        });
        
    });


</script>
</body>
</html>

