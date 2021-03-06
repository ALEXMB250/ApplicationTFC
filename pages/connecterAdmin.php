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
                <b class="text-white bg-dark">Connexion</b>
              </div>
              <!-- /.login-logo -->
              <div class="card">
                <div class="card-body login-card-body">
                  <p class="login-box-msg">Se connecter en tant qu'enseignant</p>
            
                  <form action="../controllers/AdminController.php" method="post">
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" name="login" placeholder="Login" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>
                    <input type="hidden" name="action" value="authentifier">
                    <div class="input-group mb-3">
                      <input type="password" class="form-control" name="mdp" placeholder="Password" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-lock"></span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Se connecter</button>                        
                      </div>
                      <!-- /.col -->
                    </div>
                  </form>
            
                  <div class="social-auth-links text-center mb-3">
                    <p>- OU -</p>
                    <a href="inscriptionProfesseur.php" class="btn btn-block btn-danger">
                      Creer un compte
                    </a>
                  </div>
                  <!-- /.social-auth-links -->
            
                  <p class="mb-1">
                    <a href="#">I forgot my password</a>
                  </p>
                  <p class="mb-0">
                    <a href="#" class="text-center">Register a new membership</a>
                  </p>
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
