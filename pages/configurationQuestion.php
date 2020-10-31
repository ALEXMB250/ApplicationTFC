<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>ApplicationTFC</title>

  <link rel="stylesheet" href="../dist/css/style.css">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="../index.html" class="navbar-brand">
        <h1 class="h1">TFC</h1>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="../index.html" class="nav-link">Accueil</a>
          </li>
          <li class="nav-item">
            <a href="inscriptionProfesseur.html" class="nav-link">S'inscrire</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Se Connecter</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="connecterProfesseur.html" class="dropdown-item">Enseignant</a></li>
              <li><a href="../index.html" class="dropdown-item">Apprenant</a></li>              
            </ul>
          </li>
        </ul>
    </div>
  </nav>
  <!-- /.navbar -->
  
    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <br>              
          </div>
          <!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <div class="login-box">
              <div class="login-logo">
                <b class="text-white bg-dark">Configurer</b>
              </div>
              <!-- /.login-logo -->
              <div class="card">
                <div class="card-body login-card-body">
                
                  <form action="../controllers/TPController.php" method="POST">
                      <label>Date de debut</label> <br>
                      <input type="date" name="date_debut" required> <br>
                      <label>Heure de debut</label> <br>
                      <input type="time" name="heure_debut" required> <br>
                      <label>Date de fin</label> <br>
                      <input type="date" name="date_fin" required> <br>
                      <label>Heure de fin</label> <br>
                      <input type="time" name="heure_fin" required> <br>
                      <label>Duree</label> <br>
                      <input type="number" name="duree" required> <br>
                      <label>Cours</label> <br>
                      <input type="text" name="cours" required> <br><br>
                      <input type="submit" value="Valider">
                  </form>
                </div>
                <!-- /.login-card-body -->
              </div>
            </div>
            <!-- /.login-box -->              
          </div>
          <!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <br>              
          </div>
          <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  
    <!-- /.content -->
</div>
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
