<?php
include_once 'connexion.php';
session_start();
if (isset($_POST['savee'])){
 $ref=$_POST['reference'];
  $titre = $_POST['titre'];
  $descr = $_POST['description'];
  $budg = $_POST['budget'];
  $periodeest = $_POST['periodeestime'];
  $datedeb = $_POST['datedebut'];
  $datefin = $_POST['datefin'];
$chef=$_POST['chefdeprojet'];
$existingIdQuery = "SELECT reference FROM projet WHERE reference = '$ref'";
$existingIdResult = $conn->query($existingIdQuery);
if ($existingIdResult->rowCount() > 0) {
  echo "La refererence existe déjà dans la table. Veuillez utiliser une reference différente.";
  // Gérer l'erreur d'ID en double ici
} else {
  $sql = "INSERT INTO `projet` (`reference`, `titre`, `description`, `budget`, `periodeestime`, `datedebut`, `datefin`, `chefprojet`) VALUES ('$ref', '$titre', '$descr', '$budg', '$periodeest', '$datedeb', '$datefin', '$chef') ";
  $result = $conn->query($sql);
  // Gérer le succès de l'insertion ici


}}
?>
<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>NOUVEAU PROJET</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link href="assets/img/favicon.png" rel="icon">
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
                            <li><a href="creer projet.php"><span class="fa fa-image"></span> Nouveau Projet</a></li>

                            <li><a href="creer phase.php"><span class="fa fa-users"></span> Definir les phases d'un projet</a></li>
        
                            <li><a href="creer profile.php"><span class="fa fa-wrench"></span>Ajouter Profil</a></li>
                    
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
                <ul class="breadcrumb push-down-0">
                    <li><a href="index1.php">Home</a></li>
                    <li><a href="#">Pages</a></li>
                    <li class="active">Projet</li>
                </ul>                                              
                
                <!-- START CONTENT FRAME -->
                <div class="content-frame">   
                    
                    <!-- START CONTENT FRAME TOP -->
                    <div class="content-frame-top">                        
                        <div class="page-title">                    
                            <h2><span class="fa fa-image"></span> NOUVEAU PROJET </h2>
                        </div>                                                            
                    </div>
                    
                    <!-- START CONTENT FRAME RIGHT -->
                    
                    <!-- END CONTENT FRAME RIGHT -->
                
                    <!-- START CONTENT FRAME BODY -->
                    <div class="page-content-wrap">
                    
                       
                    
                    <div class="row">                        
                        
                        <div class="col-md-6 col-sm-8 col-xs-7" style="width: 70em; margin-left:30px;">
                            
                            <form method="post" class="form-horizontal">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><span class="fa fa-pencil"></span>PROJET</h3>
                                    
                                </div>
                                <div class="panel-body form-group-separated">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">REFERENCE</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" placeholder="TA REFERENCE" class="form-control" name="reference"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">TITRE</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" placeholder="TITRE" class="form-control" name="titre"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">DESCRIPTION</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" placeholder="DESCRIPTION" class="form-control" name="description"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">BUDGET</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" placeholder="BUDGET" class="form-control" name="budget"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label" >PERIODE ESTIME</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" placeholder="PERIODE ESTIMEE" class="form-control"name="periodeestime"/>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">DATE DEBUT</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="date" placeholder="DATE DE DEBUT" class="form-control" name="datedebut"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">DATE FIN</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="date" placeholder="DATE DE fin" class="form-control" name="datefin"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
    <label class="col-md-3 col-xs-5 control-label">CHEF DE PROJET</label>
    <div class="col-md-9 col-xs-7">
        <?php
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $resultat = $conn->prepare('SELECT NOM, PRENOM FROM employe');
        $resultat->execute();
        $coordona = $resultat->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <div class="choix">
            <select name="chefdeprojet">
                <?php
                foreach ($coordona as $ligne) {
                    echo "<option value='" . $ligne['NOM'] . " " . $ligne['PRENOM'] . "'>" . $ligne['NOM'] . " " . $ligne['PRENOM'] . "</option>";
                }
                ?>
            </select>
        </div>
    </div>
</div>
                                   
<style>
    .choix select {
        width: 100%;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
</style>                                                 
                                    <div>
                                       
                                            <button type="submit" class="btn btn-danger btn-rounded pull-right" name="savee">Save</button>
                                      
                                    </div>
                                </div>
                            </div>
                            
                    <!-- END CONTENT FRAME BODY -->
                </div>               
                <!-- END CONTENT FRAME -->
                                
                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
        
        <!-- BLUEIMP GALLERY -->
        <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
            <div class="slides"></div>
            <h3 class="title"></h3>
            <a class="prev">‹</a>
            <a class="next">›</a>
            <a class="close">×</a>
            <a class="play-pause"></a>
            <ol class="indicator"></ol>
        </div>      
        <!-- END BLUEIMP GALLERY -->
        
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
                            <a href="index.php" class="btn btn-success btn-lg">Yes</a>
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
        
        <script type="text/javascript" src="js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>
        <script type="text/javascript" src="js/plugins/dropzone/dropzone.min.js"></script>
        <script type="text/javascript" src="js/plugins/icheck/icheck.min.js"></script>
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>        
        <!-- END TEMPLATE -->

        <script>            
            document.getElementById('links').onclick = function (event) {
                event = event || window.event;
                var target = event.target || event.srcElement;
                var link = target.src ? target.parentNode : target;
                var options = {index: link, event: event,onclosed: function(){
                        setTimeout(function(){
                            $("body").css("overflow","");
                        },200);                        
                    }};
                var links = this.getElementsByTagName('a');
                blueimp.Gallery(links, options);
            };
        </script>        
        
    <!-- END SCRIPTS -->         
    </body>
</html>