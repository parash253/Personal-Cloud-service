<?php 
  session_start();
  if(!isset($_SESSION['admin'])){
     //this will redirect user to log in page if he is not logged user
     header("location:loggin.php"); 
  }
  include('allfeatures.php');
  // include('list.php');
  // $h = $_GET['value'] ??'unknown_path';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- This line of JavaScript is for Disabling right click on Web page -->
  <SCRIPT language=JavaScript>
    <!-- http://www.spacegun.co.uk -->
    var message = "function disabled";
    function rtclickcheck(keyp){ if (navigator.appName == "Netscape" && keyp.which == 3){ alert(message); return false; }
    if (navigator.appVersion.indexOf("MSIE") != -1 && event.button == 2) { alert(message); return false; } }
    document.onmousedown = rtclickcheck;
  </SCRIPT>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,maximum-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <!-- Below Two Script Source for modal popup -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Script Source for modal popup -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Below Two Script Source for modal popup -->
  <script src="js/jquery.min.js"></script>
  <!-- Script Source for modal popup -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>

  <title>FilesPage</title>
  <link rel="stylesheet" type="text/css" href="css/filestyle.css">
  <link rel="stylesheet" type="text/css" href="css/glitchandfont.css">
  <style type="text/css">
    /*For button size and text size of root folder and sub root folder*/
@media screen and (max-width: 600px) 
  {
  .navigation 
  {
      font-size: 21px;
      padding-right: 0px;
      margin-left: 0px;
      padding-left: 0px;
      margin-right: 0px;
  }
  .navigation1
  {
    font-size: 13px;
  }
                         
    .photo
    {
      height: 100px;
      width: 100%;
    }
    .margindown
    {
      margin-bottom: 0px;
    }
    .filenam
    {
      font-size: 10px;
    }
    .buttonsize
    {
      margin-top: 3px;
      width: 100%;
    }
    .wholemargin
    {
      margin-top:0px;
      margin-bottom:0px;
    }
  }
  @media screen and (min-width: 600px) 
  {
    .navigation 
    {
        font-size: 30px;
    }
    .photo
    {
      height: 250px;
      width: 100%;
    }
    .buttonsize
    {
      font-size: 18px;
    }
     .wholemargin
    {
      margin-top:30px;
      margin-bottom:30px;
    }
}
  </style>
</head>
<body>
  <header id="header" style="position: sticky; top: 0px; left: 0px;z-index: 1;">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a href="" class="navigation navbar-brand">
            <b class="font2">
              Personal Cloud Service
            </b> 
          </a>
                <!-- Trigger the modal with a button -->
          <button type="button" style="position: sticky;z-index: 1000;" class="navigation1 btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Upload Files</button>

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
    <img style="height: 100%; width: 100%; position: fixed; top: 0px; z-index: -100;"  src="images\fires.gif" alt="FireGiF" />
  <div class="container">
     
    <div id="forfilesrefresh2" class="row text-center py-0">
      <?php
        // include('filelist.php');
        forFiles();
      ?>
    </div>
    <br>
    <hr>
    <div id="forfoldersrefresh2" class="row text-center py-0">
      <?php
        // include('folderlist.php');
        forFolders();
      ?>
    </div>

  </div>  
</body>
</html>