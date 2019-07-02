<?php ob_start()?><!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<meta charset="utf-8">
</head>
<body>
<?php require_once '../database.php'; ?><nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" role="navigation">
    <div class="container">
        <img src="imgsudrail/siteon.png" class="Imgentete">
            <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                ☰
            </button>
            <div class="collapse navbar-collapse" id="exCollapsingNavbar">
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a href="#" class="nav-link"><p>Accueil</p></a></li>
                     <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <p>RI & STATUT</p>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Reglement intérieur</a>
          <a class="dropdown-item" href="#">Statut du syndicat</a>
        
      </li>
                      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <p> Reglementation </p>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">RH</a>
         
        
      </li>
                    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <p> Informations </p>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Collections et liaison des métiers</a>
         
        
      </li>
                     <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <p>Documentation</p>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Journal</a>
          <a class="dropdown-item" href="#">Journal CSE</a>
          <a class="dropdown-item" href="#">Tract</a>
        
      </li>
              

                </ul>
                <ul class="nav navbar-nav flex-row justify ml-0">
                    <li class="nav-item order-2 order-md-1"><a href="#" class="nav-link" title="settings"><i class="fa fa-cog fa-fw fa-lg"></i></a></li>
                    <li class="dropdown order-1">
                        <button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-outline-secondary dropdown-toggle">Connexion <span class="caret"></span></button>
                        <ul class="dropdown-menu dropdown-menu-right mt-2">
                            <li class="px-3 py-2">
                                <form class="form" role="form">
                                    <div class="form-group">
                                        <input id="emailInput" type="email" placeholder="Email" class="form-control form-control-sm" type="text"  required>
                                    </div>
                                    <div class="form-group">
                                        <input id="passwordInput" placeholder="Password" class="form-control form-control-sm" type="text" required="">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn1 btn-primary btn-block">Se connecter</button> <br>
                                    </div>
                                    <div class="form-group text-center">
                                        <small><a href="#" data-toggle="modal" data-target="#modalPassword">Mot de passe oublié ?</a></small> <br> <br>
                                         <small><a href="#">Créer un compte</a></small>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
    </div>
</nav>

<div id="modalPassword" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Forgot password</h3>
                <button type="button" class="close font-weight-light" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <p>Reset your password..</p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>

  <h3 style="text-align: center;">Se connecter</h3>
<?php if(isset($_POST) AND !empty($_POST)) {
    //voir si le champs username n'es pas vide grace à empty
    //htmlspecialchars permet de securiser les données
    if (!empty(htmlspecialchars($_POST['username'])) AND !empty(htmlspecialchars($_POST['password']))) {
         $req = $db->prepare('SELECT * FROM users WHERE username = :username AND password = :password');

      $req->execute([

        'username' => $_POST['username'],

        'password' => $_POST['password']

      ]);

      $user = $req->fetchObject();

      if ($user) {
$_SESSION['admin'] = $_POST['username'];
header('location:index.php');
  ob_enf_fluch();
      }
    } else {
      $error = 'identifiants incorrect';
    }
  }

  else {
    $error = 'Veuillez remplir tout les champs';
  } ?><form action="login.php" method="POST">
  
  <p style="text-align: center;">Nom : <input type="text" name="username"></p> <br> 
  <p style="text-align: center;"> Mot de passe : <input type="password" name="password"></p> <br> 
  <p style="text-align: center;"><button>Se connecter</button></p>
</div>
</form>


<!-- Footer -->
<footer class="page-footer font-small indigo">

  <!-- Footer Links -->
  <div class="container">

    <!-- Grid row-->
    <div class="row text-center d-flex justify-content-center pt-5 mb-3">

      <!-- Grid column -->
      <div class="col-md-2 mb-3">
        <h6 class="text-uppercase font-weight-bold">
          <a href="#!">Mentions legales</a>
        </h6>
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-2 mb-3">
        <h6 class="text-uppercase font-weight-bold">
          <a href="#!">Informations juridique</a>
        </h6>
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
       <div class="col-md-2 mb-3">
        <h6 class="text-uppercase font-weight-bold">
          <a href="#!">Contactez-nous</a>
        </h6>
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
     <!--  <div class="col-md-2 mb-3">
        <h6 class="text-uppercase font-weight-bold">
          <a href="#!">Help</a>
        </h6>
      </div> -->
      <!-- Grid column -->

      <!-- Grid column -->
      <!-- <div class="col-md-2 mb-3">
        <h6 class="text-uppercase font-weight-bold">
          <a href="#!">Contact</a>
        </h6>
      </div> -->
      <!-- Grid column -->

    </div>
    <!-- Grid row-->
    <hr class="rgba-white-light" style="margin: 0 15%;">

    <!-- Grid row-->
    <div class="row d-flex text-center justify-content-center mb-md-0 mb-4">

      <!-- Grid column -->
      <div class="col-md-8 col-12 mt-5">
        <h5 style="line-height: 1.7rem">Vous pouvez également nous suivre sur nos réseaux ! </h5> <br>
        <a href="#"><img src="facebook.svg" class="fb"></a> <img src="facebook.svg" class="fb"> <img src="facebook.svg" class="fb">

        <br>
        <br>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row-->
    <hr class="clearfix d-md-none rgba-white-light" style="margin: 10% 15% 5%;">

    

  </div>
  <!-- Footer Links -->

 
</footer>
<!-- Footer -->


 

<script src="script.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>