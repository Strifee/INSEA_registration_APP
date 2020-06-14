<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Votre Profile</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>	
    <link rel="stylesheet" type="text/css" href="css/modifier.css">
</head>
<body>
    


<section class="container-fluid">
    <div class="form-groupe" >
        <div class="card-body col-lg-6" style="margin: auto;" >
            <form class="form-container text-center p-5" style="color: #fff;" action="includes/signup.inc.php" method="post">
                            <h5 class="card-header text-center py-4" >
                                <img src="https://upload.wikimedia.org/wikipedia/commons/0/05/INSEA_logo.png" style=" width:100px; height:100px;">
                                <strong style="font-size:50px;">Votre Profile</strong>
                                <br>
                            </h5>
                       
                            <br>
                            <div class="form-group">
                                <label for="inputdefault"><b><strong style="font-size:20px;">Email</strong></b></label>
                                <input class="form-control" id="Email" type="Email" name="Email" style="text-align:center;" >
                            </div>

                            <br>
                            <div class="form-group">
                                <label for="inputdefault"><b><strong style="font-size:20px;">Nom</strong></b></label>
                                <input class="form-control" id="firstname" type="text" name="firstname" style="text-align:center;" >
                            </div>

                            <br>
                            <div class="form-group">
                                <label for="inputdefault"><b><strong style="font-size:20px;">Prenom</strong></b></label>
                                <input class="form-control" id="lastname"  type="text" name="lastname" style="text-align:center;" >
                            </div>

                            <br>

                            <div class="form-group">
                                <label for="inputdefault"><b><strong style="font-size:20px;">Cycle</strong></b></label>
                                <select  class="form-control" id="cycle" name="cycle" >
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
                                    <option value="LSI2M">SI2M</option>
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
                                <input class="form-control" id="date1"  type="date" name="date1" >
                            </div>

                            <br>

                            <div class="form-group">
                                <label for="inputdefault"><b><strong style="font-size:20px;">Date D'inscription</strong></b></label>
                                <input class="form-control" id="date2"  type="date" name="date2" >
                            </div>
                            
                            <br>

                            <div class="form-group">
                                <label for="inputdefault"><b><strong style="font-size:20px;">Photo ( Type : JPG , JPEG , PNG )</strong></b></label>
                                <input class="form-control" id="image"  type="file" name="image" >
                            </div>

                            <br>

                            <div class="form-group">
                                <label for="inputdefault"><b><strong style="font-size:20px;">Copie de la CIN ( Type : JPG , JPEG , PNG )</strong></b></label>
                                <input class="form-control" id="cin"  type="file" name="cin" >
                            </div>

                            <br>

                            <div class="form-group">
                                <label for="inputdefault"><b><strong style="font-size:20px;">Copie du Baccalauréat ( Type : JPG , JPEG , PNG )</strong></b></label>
                                <input class="form-control" id="bac"  type="file" name="bac" >
                            </div>

                            <br>

                            <div class="form-group">
                                <label for="inputdefault"><b><strong style="font-size:20px;">Attestation de réussite (CNC,DEUGS ou Licence) ( Type : JPG , JPEG , PNG )</strong></b></label>
                                <input class="form-control" id="reussite"  type="file" name="reussite" >
                            </div>

                            <div class="form-group">
                                <hr class="mb-3">
                                <input class="btn btn-success " type="modifier" id="modifier" name="create" value="Sign out">
                            </div>
            </form>
        </div>
    </div>
</section>
</body>
</html>