<?php
include_once 'connexion.php';
session_start();
if (isset($_POST['savee'])){
  $mat=$_POST['matriculation'];  
  $Nom = $_POST['nomee'];
  $Prenom = $_POST['prenomee'];
  $emai = $_POST['emailee'];
  $pass = $_POST['passwordee'];
  $proff = $_POST['profee'];
  $cine = $_POST['cin'];
  $tel=$_POST['telephone'];
  $poste=$_POST['post'];

  $sql = "INSERT INTO `employe` (`matriculation`, `NOM`, `PRENOM`, `cin`, `email`, `telephone`, `poste`, `passworde`, `profession`) VALUES ('$mat', '$Nom','$Prenom', '$cine','$emai','$tel', '$poste','$pass','$proff') "; 
  $result = $conn->query($sql);

  
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>AJOUTER PROFIL</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->                                      
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
             <!-- START PAGE SIDEBAR -->
             <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                       
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                        <img src="logo.png" alt="">
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                            <img src="logo.png" alt="">
                            <p class="username" style="color:white; margin:4%">|<?php echo "BONJOUR ". $_SESSION['permission']; ?>|</p>
                            <p class="username" style="color:white; margin:8%">|<?php echo $_SESSION['nom'] . ' ' . $_SESSION['prenom']; ?>|</p>
                            </div>
                        </div>                                                                        
                    </li>
                    <li class="xn-title">Navigation</li>
                    <li class="xn-openable active">
                        <a href="#"><span class="fa fa-dashboard"></span> <span class="xn-text">Dashboards</span></a>
                        <ul>
                            <li class="active"><a href="index1.php"><span class="xn-text">Dashboard 1</span></a></li>
                        </ul>
                    </li>                    
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Pages</span></a>
                        <ul>
                            <li><a href="creer projet.php"><span class="fa fa-image"></span> Nouveau projet</a></li>

                            <li><a href="creer phase.php"><span class="fa fa-users"></span> Definir les phases d'un projet</a></li>
        
                            <li><a href="creer profile.php"><span class="fa fa-wrench"></span>Ajouter profil</a></li>
                    
                            <li><a href="pages-commentaires.php"><span class="fa fa-edit"></span> Commentaires </a></li>                      
                        </ul>
                    </li>                  
                    <li class="xn-openable">
                        <a href="tables.php"><span class="fa fa-table"></span> <span class="xn-text">Tables</span></a>
                        <ul>                            
                            <li><a href="table-employe.php"><span class="fa fa-download"></span> Total Employe</a></li>
                            <li><a href="table-projet.php"><span class="fa fa-download"></span>Total Projet</a></li>
                            <li><a href="table-phase.php"><span class="fa fa-download"></span>Total Phase</a></li>
                            <li><a href="table-commentaire.php"><span class="fa fa-download"></span>Total Commentaire</a></li>                            
                        </ul>
                    </li>           
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- SEARCH -->
                    <li class="xn-search">
                        <form role="form">
                            <input type="text" name="search" placeholder="Search..."/>
                        </form>
                    </li>   
                    <!-- END SEARCH -->                    
                    <!-- POWER OFF -->
                    <li class="xn-icon-button pull-right last">
                        <a href="#"><span class="fa fa-power-off"></span></a>
                        <ul class="xn-drop-left animated zoomIn">
                            <li><a href="deconnexion.php" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span> Sign Out</a></li>
                        </ul>                        
                    </li> 
                    <!-- END POWER OFF -->              
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->    
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Pages</a></li>
                    <li><a href="#">Ajouter ADMIN/utilisateur</a></li>
                    <li class="active">profile</li>
                </ul>
                <!-- END BREADCRUMB -->                                                
                
                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-cogs"></span> CREER (admin/utilisateur)</h2>
                </div>
                <!-- END PAGE TITLE -->                     
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                       
                    
                    <div class="row">                        
                        
                        <div class="col-md-6 col-sm-8 col-xs-7" style="width:70em ; margin-left:30px;">
                            
                            <form method="post" class="form-horizontal">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><span class="fa fa-pencil"></span> Profile</h3>
                                    
                                </div>
                                <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">MATRICULATION</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" placeholder="matriculation" class="form-control" name="matriculation"/>
                                        </div>
                                    </div>
                                    
                                <div class="panel-body form-group-separated">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">NOM</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" placeholder="nom" class="form-control" name="nomee"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">PRENOM</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" placeholder="prenom" class="form-control" name="prenomee"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">CIN</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" placeholder="cin" class="form-control" name="cin"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">EMAIL</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="email" placeholder="email" class="form-control" name="emailee"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
  <label class="col-md-3 col-xs-5 control-label">profession</label>
  <div class="col-md-9 col-xs-7">
    <select class="form-control" name="profee">
      <option value="admin">admin</option>
      <option value="utilisateur">utilisateur</option>
    </select>
  </div>
</div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label" >TELEPHONE</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" placeholder="telephone" class="form-control"name="telephone"/>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">POSTE</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" placeholder="POSTE" class="form-control" name="post"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Password</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" placeholder="password" class="form-control" name="passwordee"/>
                                        </div>
                                    </div>                            
                                    <div>
    <button type="submit" class="btn btn-danger btn-rounded pull-right" name="savee" onclick="showSuccessMessage()">Save</button>
  </div>
</div>

<!-- Custom alert dialog -->
<div id="customAlert" class="alert-dialog">
  <div class="alert-content">
    <span id="customAlertMessage"></span>
    <button id="customAlertCloseButton" onclick="hideCustomAlert()">Close</button>
  </div>
</div>

<!-- Custom styles -->
<style>
  .alert-dialog {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    border: 1px solid #ccc;
    padding: 20px;
    display: none;
    z-index: 9999;
  }

  .alert-content {
    text-align: center;
  }

  #customAlertMessage {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
  }

  #customAlertCloseButton {
    background-color: #ccc;
    border: none;
    padding: 8px 16px;
    cursor: pointer;
    font-size: 14px;
  }
</style>
      <!-- MESSAGE BOX-->
      <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="deconnexion.php" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->
                       

                       
        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                  
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>        
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="js/plugins/scrolltotop/scrolltopcontrol.js"></script>
        
        <script type="text/javascript" src="js/plugins/morris/raphael-min.js"></script>
        <script type="text/javascript" src="js/plugins/morris/morris.min.js"></script>       
        <script type="text/javascript" src="js/plugins/rickshaw/d3.v3.js"></script>
        <script type="text/javascript" src="js/plugins/rickshaw/rickshaw.min.js"></script>
        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>                
        <script type='text/javascript' src='js/plugins/bootstrap/bootstrap-datepicker.js'></script>                
        <script type="text/javascript" src="js/plugins/owl/owl.carousel.min.js"></script>                 
        
        <script type="text/javascript" src="js/plugins/moment.min.js"></script>
        <script type="text/javascript" src="js/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>
        
        <script type="text/javascript" src="js/demo_dashboard.js"></script>
        <!-- END TEMPLATE -->
        <script>
  function showSuccessMessage() {
    console.log("showSuccessMessage() called");
    var customAlert = document.getElementById("customAlert");
    var customAlertMessage = document.getElementById("customAlertMessage");
    customAlertMessage.innerHTML = "Enregistrement réussi !";
    customAlert.style.display = "block";

    setTimeout(function() {
      console.log("hideCustomAlert() called");
      hideCustomAlert();
    }, 7000);
  }

  function hideCustomAlert() {
    console.log("hideCustomAlert() called");
    var customAlert = document.getElementById("customAlert");
    customAlert.style.display = "none";
  }
</script>
    <!-- END SCRIPTS -->                                        
    </body>
</html>