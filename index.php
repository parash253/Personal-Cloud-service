<!-- Saving image into database with discription for fyp for the purpose of storing image details -->
<?php  
  session_start();
	// include('components.php'); 
  if(!isset($_SESSION['admin'])){
     //this will redirect user to log in page if he is not logged user
     header("location:loggin.php"); 
  }
  include('allfeatures.php');
?>
<!DOCTYPE html>
<html lang="en">
<head hidden>
  <!-- This line of JavaScript is for Disabling right click on Web page -->
  <SCRIPT language=JavaScript>
    var message = "function disabled";
    function rtclickcheck(keyp){ if (navigator.appName == "Netscape" && keyp.which == 3){ alert(message); return false; }
    if (navigator.appVersion.indexOf("MSIE") != -1 && event.button == 2) { alert(message); return false; } }
    document.onmousedown = rtclickcheck;
  </SCRIPT>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,maximum-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <script src="js/jquery.min.js"></script>
  
  <script src="js/bootstrap.min.js"></script>

  <!-- ****** -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<style type="text/css">
  @media screen and (max-width: 600px) 
  {
    .mainbutton1
    {
      width: 45%;
    }
    .mainbutton2
    {
      width: 99%;
    }
  }
  @media screen and (min-width: 600px) 
  {
    .mainbutton
    {
      font-size: 21px;
      width: 30%;

    }
  }
</style>
  <title>Listing Folder & Files</title>
  <link rel="stylesheet" type="text/css" href="css/filestyle.css">
  <link rel="stylesheet" type="text/css" href="css/glitchandfont.css">
</head>
<body>
  <!-- Glitch Part Of Classified -->
  <div class="glitchpart">
    <div>
      <img class="glitch1" src="images\classified.gif" alt="FireGiF" />
    </div>
  </div>
  <!-- Glithc Part of Classified Finished above -->
  <header id="header" style="position: sticky; top: 0px; left: 0px;z-index: 1;">
      <nav class="mb-0 navbar navbar-expand-lg navbar-dark bg-dark">
          <a href="index.php" class="font navbar-brand">
            <b style="font-size: 30px; color: #FFB266;">
              Personal Cloud Service
            </b> 
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul style="float: right; margin-right: 10px; font-size: 21px;" class="navbar-nav ml-auto">
              <li class="nav-item">
                <a style="color: #FFB266;" class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a style="color: #FFB266;" class="nav-link" href="forfiles.php?open=OpenFolder&value=Documents">Documents</a>
              </li>
              <li class="nav-item">
                <a style="color: #FFB266;" class="nav-link" href="forfiles.php?open=OpenFolder&value=Files">Files</a>
              </li>
              <li class="nav-item">
                <a style="color: #FFB266;" class="nav-link" href="forimage.php?open=OpenFolder&value=Images">Images</a>
              </li>
              <li class="nav-item">
                <a style="color: #FFB266;" class="nav-link" href="forfiles.php?open=OpenFolder&value=Movies">Movies</a>
              </li>
              <li class="nav-item">
                <a style="color: #FFB266;" class="nav-link" href="forfiles.php?open=OpenFolder&value=Music">Musics</a>
              </li>
              <li class="nav-item">
                <a style="color: #FFB266;" class="nav-link" href="forfiles.php?open=OpenFolder&value=Video">Videos</a>
              </li>
            </ul>
          </div>
      </nav>
    </header>
	<img style="height: 100%; width: 100%; position: fixed; z-index: -100;"  src="images\fires.gif" alt="FireGiF" />
  <div class="container">
  	<h1 class=" font text-center">Welcome To Your PersonalCloudService</h1>
    <h4 class="fonting">This is My Final Year Project "PersonalCloudService" which allows us to save any digital information directly from mobile devices or any other devices into our Personal PC or Laptop using user web interface.</h4>
  	<hr style="border-bottom: 3px groove #FFCC99; margin-top: 0px; margin-bottom: 0px;">
    <div id="forfoldersrefresh1" class="row text-center py-3 " style="border-bottom: 3px groove #FFCC99;">
      
    	<?php 
        echo '<div class=" font1 row px-5" style="font-size: 21px;">Total Used=>('.Home_folder_size("Home").')</div>';
        number();
        echo '<div class=" font1 row px-5" style="font-size: 21px;">This is the Root Directory i.e.(Home)</div>';
        echo "<hr style='border-bottom: 3px groove #FFCC99;'>";
    		folders();
    	?>
    </div>
    <br>
    <div class="row">
      <button type="button" style="position: fixed; left: 74%; top: 90%; width: auto; z-index: 1000;" class="btn btn-info btn-lg" data-toggle="modal" data-target="#createModal">
           <span class="glyphicon glyphicon-plus"></span> Create
      </button>
    </div>
  	<!-- <h1 class="text-center">List of Files are supposed to Display below if present</h1> -->
    <div id="forfilesrefresh1" class="row text-center py-1" style="border-bottom: 3px groove #FFCC99;">
    	<?php
    		files();              
      	?>
    </div>
    <br>
    <br>
  </div>
</body>
</html>