<?php
session_start();
include('database.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SuiteApp</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/iconfonts/ionicons/dist/css/ionicons.css">
    <link rel="stylesheet" href="assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/shared/style.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/demo_1/style.css">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <?php
		include("nav.php");
		?>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <?php include('menu.php'); ?>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Page Title Header Starts-->
            
            <!-- Page Title Header Ends-->
			
				  <form action="new_chambre.php" method="post">
				  <div class="row">
				  <div class="col-lg-3 col-md-3 col-sm-12  col-offset-lg-2 col-offset-md-2 grid-margin">
				  <input type="text" class="form-control form-control-lg" required placeholder="Numéro de la chambre" aria-label="Username" name="numero" id="numero">
				  </div>
				  <div class="col-lg-3 col-md-3 col-sm-12 grid-margin">
				  <input type="text" class="form-control form-control-lg" required placeholder="Montant de la chambre" aria-label="Username" name="montant" id="montant">
				  </div>
				  <div class="col-lg-1 col-md-2 col-sm-12 grid-margin">
				  <input type="submit" class="form-control form-control-lg"  aria-label="Username" value="Ajouter" id="submit">
				  </div>
				  </div>
				 </form>
				  
            <div class="row" style="margin-top:1%">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
				  
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="text-primary">Toutes les chambres :</h4>
                   
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Numéro de chambre</th>
                          <th>Montant</th>
                          
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
				  $dispo = $con -> query('SELECT * FROM chambre AS t1, payement  AS t2
				  WHERE t1.id_payement = t2.id');
				  while($result = $dispo ->fetch()){
				  if($result['paye'] == "no"){
					  echo '<tr><td>'.$result['numero'].' <span style="font-size:0.8em;color:green">(disponible)</span></td><td>'.$result['montant'].' USD</td><td><a href="update_chambre.php?id='.$result['id'].'&montant='.$result['montant'].'&numero='.$result['numero'].'" class="badge badge-success" style="color:white">Modifier</a></td></tr>';
				  }
				  if($result['paye'] == "yes"){
					  echo '<tr><td>'.$result['numero'].' <span style="font-size:0.8em;color:red">(occupée)</span></td><td>'.$result['montant'].' USD</td><td></td></tr>';
				  }
				  if($result['paye'] == "ec"){
					  echo '<tr><td>'.$result['numero'].' <span style="font-size:0.8em;color:orange">(en cours de payement...)</span></td><td>'.$result['montant'].' USD</td><td><a href="update_chambre.php?id='.$result['id'].'&montant='.$result['montant'].'&numero='.$result['numero'].'" class="badge badge-warning" style="color:white">Modifier</a></td></tr>';
				  }
				  }
				  ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                       
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            
            
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="assets/js/shared/off-canvas.js"></script>
    <script src="assets/js/shared/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="assets/js/demo_1/dashboard.js"></script>
    <!-- End custom js for this page-->
    <script src="assets/js/shared/jquery.cookie.js" type="text/javascript"></script>
	<script src="testacces.js" type="text/javascript"></script>
  </body>
</html>