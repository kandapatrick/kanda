<?php
session_start();
include('database.php');
$ref_payement = $_GET['id'];
$numero = $_GET['numero'];
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
	<style>
	#msg1 {
position:fixed;
top:5%;
left:30%;
width:400px;
height:30px;
display:none;
text-align:center;
z-index:800;
}
#msg2 {
position:fixed;
top:5%;
left:30%;
width:400px;
height:30px;
display:none;
text-align:center;
z-index:800;
}
	</style>
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
            <div class="row" style="margin-top:%">
              
            <div class="col-lg-12 col-md-12 col-sm-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h2 class="text-primary">Reservation de la chambre <?php echo $numero; ?></h2><hr>
                    <form method="post" action="new_clientcible.php">
                    <div class="form-group">
                      <label>Nom :</label>
                      <input type="text" class="form-control form-control-lg" required placeholder="Nom du client" aria-label="Username" name="nom" id="nom">
                    </div>
                    <div class="form-group">
                      <label>Prenom :</label>
                      <input type="text" class="form-control form-control-lg" required placeholder="Prenom du client" aria-label="Username" name="prenom" id="prenom">
                    </div>
                   <div class="form-group">
                      <label for="sexe">Sexe :</label>
                      <select class="form-control form-control-lg" id="sexe" name="sexe">
                        <option value="f">Féminin</option>
                        <option value="m">Masculin</option>
                       
                      </select>
                    </div>
					<div class="form-group" style="display:none">
                      <label>ref_payement:</label>
                      <input type="text" class="form-control form-control-lg" value="<?php echo $ref_payement;  ?>" placeholder="Prenom du client" aria-label="Username" name="ref_payement" id="ref_payement">
                    </div>
					<button type="submit" class="btn btn-primary mr-2" >Réserver</button>
					</form>
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
	<div id="msg1">
	<span style="color:red;font-weight:bold">Veuillez renseigner toutes les informations</span>
	</div>
	<div id="msg2">
	<span style="color:green;font-weight:bold">Réservation éffectuée avec succès</span>
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
	<script>
  $(document).ready(function(){
$('#submit').click(function(e){
e.preventDefault();
$('#loading').fadeIn(1000);
var nom =  $('#nom').val();
var prenom = $('#prenom').val();
var sexe = $('#sexe').val();
var  ref_payement = $('#ref_payement').val();
$.post('new_clientcible.php',{'nom': nom,'prenom':prenom, 'sexe' :sexe, 'ref_payement' : ref_payement},
function(data) {
if (data=='yes') {
$('#msg2').show('slow').delay(10000).hide('slow');
$(':input')
.not(':button, :submit, :reset, :hidden')
.val('')
.prop('checked', false)
.prop('selected', false);
}
else{
$('#msg1').show('slow').delay(10000).hide('slow');
}
});
});
});
  </script>
  </body>
</html>