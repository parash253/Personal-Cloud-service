
<?php
  $h = $_GET['value'] ??'unknown_path';
  // Additional Features
  //For Counting number of Files and Folders in Home Directory
  function number(){
    $dir_path = "Home/";
    $counting='';
    if(is_dir($dir_path))
        {
          global $counting;
            $file = scandir($dir_path);
            $counting = count($file) - 2;
            echo '<div class=" font1 row px-5" style="font-size: 21px;">Total No. of Files & Folders=>('.$counting.')</div>';
        }
  }
  // Below function are created for displaying folder Sizes in HomePage
  function format_folder_size($size)
  {
    if($size >= 1073741824)
    {
      $size = number_format($size / 1073741824, 2) . 'GB';
    }
    elseif ($size >= 1048576) {
      # code...
      $size = number_format($size / 1048576, 2) . 'MB';
    }
    elseif ($size >= 1024) {
      # code...
      $size = number_format($size / 1024, 2) . 'KB';
    }
    elseif ($size > 1) {
      # code...
      $size = $size . 'bytes';
    }
    elseif ($size == 1) {
      # code...
      $size = $size . 'byte';
    }
    else
    {
      $size = '0 bytes';
    }
    return $size;
  }
  // The Function==>Home_folder_size($folders_name) Shows the Total Space Used.
  function Home_folder_size($folders_name)
  {
    $folder_name = $folders_name;
    $total_size = 0;
    $subtotal_size = 0;
    $path = '';
    $homefilesize = 0;
    $file_data = scandir($folder_name);
    foreach ($file_data as $file) 
    {
      # code...
      if ($file !== '.' && $file !== '..') 
      {
        # code...
        $FolderType = strtolower(pathinfo($folder_name.'/'.$file,PATHINFO_EXTENSION));
                if ($FolderType == "") 
                {
                  $subfolder_name = $folder_name.'/'.$file.'/' ;
          $subfile_data = scandir($subfolder_name);

          foreach ($subfile_data as $subfile) 
          {
            # code...
            if ($subfile !== '.' && $subfile !== '..') 
            {
              # code...
              $subpath = $subfolder_name . '/' . $subfile;
              $subtotal_size = $subtotal_size + filesize($subpath);

            }
          }
                }
                elseif ($FolderType !== "") 
                {
                  $path = $folder_name . '/' . $file;
                  $homefilesize = $homefilesize +filesize($path); 
                }
      }
    }
    $total_size = $subtotal_size + $homefilesize; 
    return format_folder_size($total_size);
  }
  // This Function Shows the FilseSize of Folders within The Home Folder
  function get_folder_size($folders_name)
  {
    $folder_name = "Home/".$folders_name;
    $total_size = 0;
    $file_data = scandir($folder_name);
    foreach ($file_data as $file) 
    {
      # code...
      if ($file === '.' OR $file === '..') 
      {
        # code...
        continue;
      }
      else
      {
        $path = $folder_name . '/' . $file;
        $total_size = $total_size + filesize($path);
      }
    }
    return format_folder_size($total_size);
  }
  // This Function Shows the FilseSize of Files within The Home Folder
  function get_file_size($files_name)
  {
    $file_name = "Home/".$files_name;
    $total_size = 0;
    $total_size = $total_size + filesize($file_name);
    return format_folder_size($total_size);
  }
  // This Function Shows the FilseSize of Files inside the sub folder of Home Folder
  function get_file_sizeofSubFolder($File_path,$files_name)
  {
    $file_name = $File_path."/".$files_name;
    $total_size = 0;

    $total_size = $total_size + filesize($file_name);

    return format_folder_size($total_size);
  }
  // Folder Function for Home Directory
  function folders(){
    global $counting;
    $dir_path = "Home/";
      if(is_dir($dir_path))
      {
          $files = scandir($dir_path);
          
          for($i = 0; $i < count($files); $i++)
          {
              if($files[$i] !='.' && $files[$i] !='..')
              {
                  $a = $i - 1;
                  //Ckecking for Folders format
                  $FolderType = strtolower(pathinfo($dir_path.$files[$i],PATHINFO_EXTENSION));
                  if ($FolderType == "") {
                    # code...
                    if ($files[$i] == "Music" or $files[$i] == "Musics" or $files[$i] == "music" or $files[$i] == "musics") {
                    # code...
                      $z = $files[$i];
                      $rootfolderface = "images/Music.jpg";                   
                    }
                      elseif ($files[$i] == "Documents" or $files[$i] == "Document" or $files[$i] == "document" or $files[$i] == "documents") {
                        # code...
                      $z = $files[$i]; 
                      $rootfolderface = "images/Documents3.jpg";                        
                    }
                      elseif ($files[$i] == "Movies" or $files[$i] == "Movie" or $files[$i] == "movies" or $files[$i] == "movie") {
                        # code...
                      $z = $files[$i];
                      $rootfolderface = "images/Movies2.jpg";      
                    }
                      elseif ($files[$i] == "Files" or $files[$i] == "File" or $files[$i] == "files" or $files[$i] == "file") {
                        # code...
                      $z = $files[$i];
                      $rootfolderface = "images/Files.jpg";                       
                    }
                      elseif ($files[$i] == "Images" or $files[$i] == "Image" or $files[$i] == "images" or $files[$i] == "image") {
                        # code...
                      $z = $files[$i]; 
                      $rootfolderface = "images/Photos.jpg";
                    }
                      elseif ($files[$i] == "Video" or $files[$i] == "Videos" or $files[$i] == "videos" or $files[$i] == "video") {
                        # code...
                      $z = $files[$i];
                      $rootfolderface = "images/Videos.jpg";                        
                    }
                      else{
                      $z = $files[$i];
                      $rootfolderface = "images/Folders1.jpg";
                          
                    }
                    echo '<div class="col-md3 col-xs-6 px-2 my-3 my-md-10">                      
                              <div class="card shadow">
                                  <div>
                                      <img src="'.$rootfolderface.'" alt="events" class=" photo img-fluid card-img-top">
                                  </div>
                                  <div style="position:relative; padding:0px;" class="card-body">
                                    <img style=" overflow:hidden;width:100%;height:130px; z-index: -100;"  src="images\sanskrit2.jpg" alt="FireGiF" />
                                      <h5 style="position:absolute; top:0px;" class="card-title mx-2"><b>'.$files[$i].'</b></h5>
                                      <br>
                                      <h5 style="position:absolute; top:21px;" class="mx-2 card-title"><b>'.get_folder_size($files[$i]).'<hr style=" margin-top: 3px; border-bottom: 3px groove #00FFFF;"></b></h5>                                 
                                    <form style="position:absolute; top:58px; left:0; right:0;" method="get" action="forfiles.php">
                                        
                                        <input type="hidden" name="value" value="'.$z.'">
                                        <button  type="button" value1="'.$dir_path.'" value="'.$z.'" class="mainbutton mainbutton1 detailfolder btn btn-info" data-toggle="modal" data-target="#details"><span class="filenam glyphicon glyphicon-th-list"></span>More</button>
                                        <button name="deleting" type="button" value="'.$z.'" class="mainbutton mainbutton1 delete btn btn-danger" data-toggle="modal" data-target="#delete"><span class="filenam glyphicon glyphicon-trash"></span>Delete</button>
                                        <input class="mainbutton mainbutton2 my-1 btn btn-success"type="submit" name="open" value="OpenFolder">
                                    </form>
                                  </div>
                              </div>                            
                          </div>';
                  }  
              }
          }
      }
  }   
  // File Function for Home Directory
  // This function checks for files not folders
  function files(){
    $dir_path = "Home/";     
        if(is_dir($dir_path))
        {
            $files = scandir($dir_path);
            //This ForLoop is for displaying text only if the folder contains files
            for($j = 0; $j < count($files); $j++)
            {
                if($files[$j] !='.' && $files[$j] !='..')
                {
                    //Ckecking for files format
                    $FileType = strtolower(pathinfo($dir_path.$files[$j],PATHINFO_EXTENSION));
                    if ($FileType !== "") { 
                      if ( count($files) > 0) {
                        # code...
                        echo '<h1 class="font2 text-center">List of Files in this Directory</h1>';
                        break;
                      }
                    }
                }
            } 
            for($j = 0; $j < count($files); $j++)
            {
                if($files[$j] !='.' && $files[$j] !='..')
                {
                    //Ckecking for files format
                    $FileType = strtolower(pathinfo($dir_path.$files[$j],PATHINFO_EXTENSION));
                    if ($FileType !== "") {
                      # code...
                      // $b = $j - 1;
                      $video_extensions_array = array('mp4','mpeg','mvp','mov');
                      // $a = $i - 1;
                      if (in_array($FileType, $video_extensions_array)) 
                      {
                      $z = $files[$j];
                      $nospacefilename = str_replace(" ","%20","$z");
                      $rootfileface = $dir_path.$files[$j];
                        echo '<div class="col-md3 col-sm-6 my-3 my-md-0">;
                                  <div class="card shadow">
                                    <a href='.$dir_path.$nospacefilename.'>
                                        <div>
                                            <video width="100%" height="250px"  autoplay loop muted >
                                          <source src="'.$rootfileface.'" type="video/mp4"> 
                                        </video>
                                        </div>
                                      </a>
                                      <div class="card-body">
                                          <h5 class="card-title"><b>'.$files[$j].'</b></h5>
                                          <h5 class="card-title"><b>FileSize:'.get_file_size($files[$j]).'</b></h5>
                                          <h5>
                                              <span class="price"><b>File</b></span>
                                              <br>
                                              <button name="deleting" type="button" value1="'.$z.'" class=" delete btn btn-danger btn-lg" data-toggle="modal" data-target="#delete">
                                                <span class="glyphicon glyphicon-trash"></span> Delete
                                            </button>
                                              <button  type="button" value1="'.$dir_path.'" value="'.$z.'" class="detailfolder btn btn-info btn-lg" data-toggle="modal" data-target="#details">
                                            <span class="glyphicon glyphicon-th-list"></span> More
                                        </button>
                                          </h5>
                                      </div>
                                  </div>
                            </div>';
                      }
                      else
                      {
                        if ($FileType == "docx" or $FileType == "doc") 
                        {
                          # code...
                          $z = $files[$j];
                          $nospacefilename = str_replace(" ","%20","$z");
                        $rootfileface = "images/Document3.jpg";
                        }
                        elseif ($FileType == "pdf") 
                        {
                          # code...
                          $z = $files[$j];
                          $nospacefilename = str_replace(" ","%20","$z");
                        $rootfileface = "images/pdf.jpg";                       
                        }
                        elseif ($FileType == "mp3") 
                        {
                          # code...
                          $z = $files[$j];
                        $nospacefilename = str_replace(" ","%20","$z");
                        $rootfileface = "images/music.jpg";                       
                        }
                        elseif ($FileType == "rar" or $FileType == "7z" or $FileType == "zip") 
                        {
                          # code...
                          $z = $files[$j];
                          $nospacefilename = str_replace(" ","%20","$z");
                        $rootfileface = "images/rar.jpg";                       
                        }
                        else
                        {
                          # code...
                          $z = $files[$j];
                        $nospacefilename = str_replace(" ","%20","$z");          
                        $rootfileface = $dir_path.$files[$j];        
                        }
                        echo '<div class="col-md3 col-sm-6 my-3 my-md-0">;
                                  <div class="card shadow">
                                    <a href='.$dir_path.$nospacefilename.'>
                                        <div>
                                            <img style="height:250px; width:100%;" src="'.$rootfileface.'" alt="events" class="img-fluid card-img-top">
                                        </div>
                                      </a>
                                      <div class="card-body">
                                          <h5 class="card-title"><b>'.$files[$j].'</b></h5>
                                          <h5 class="card-title"><b>FileSize:'.get_file_size($files[$j]).'</b></h5>
                                          <h5>
                                              <span class="price"><b>File</b></span>
                                              <br>
                                              <button name="deleting" type="button" value1="'.$z.'" class=" delete btn btn-danger btn-lg" data-toggle="modal" data-target="#delete">
                                                <span class="glyphicon glyphicon-trash"></span> Delete
                                            </button>
                                              <button  type="button" value1="'.$dir_path.'" value="'.$z.'" class="detailfolder btn btn-info btn-lg" data-toggle="modal" data-target="#details">
                                            <span class="glyphicon glyphicon-th-list"></span> More
                                        </button>
                                          </h5>
                                      </div>
                                  </div>
                              </div>';
                      }          
                    }  
                }
            }
        }
  }      
  // list features
  // File Function for Sub Directory
  function forFiles(){
    global $h;
    $dir_path = "Home/".$h."/";
    echo '<div class=" font1 row px-5" style="font-size: 21px;">You are here => ('.$dir_path.')</div>';
    //For Counting Number of Files in directory
    if(is_dir($dir_path))
    {
        $file = scandir($dir_path);
        $counting = count($file) - 2;
        echo '<div class=" font1 row px-5" style="font-size: 21px;">Total No.of Files in this Directory ('.$h.')=>('.$counting.')</div>';
    }
    // Scripts For Displaying Files
    if(is_dir($dir_path))
    {
        $files = scandir($dir_path);
        
        for($i = 0; $i < count($files); $i++)
        {
          if($files[$i] !='.' && $files[$i] !='..')
          {
            $video_extensions_array = array('mp4','mpeg','mvp','mov');
            $FileType = strtolower(pathinfo($dir_path.$files[$i],PATHINFO_EXTENSION));
            $a = $i - 1;
            if ($FileType !== '') {
              # code...
              if (in_array($FileType, $video_extensions_array)) 
              {
                # code...
                $Filetitle = $files[$i];
                $nospacefilename = str_replace(" ","%20","$Filetitle");
                $filefaceimage = $dir_path.$nospacefilename;
                echo '<div class="col-md3 col-xs-4 my-3 px-2 my-md-0">;
                        <div class="card shadow">
                          <a href='.$filefaceimage.'>
                            <div>
                                <video class="photo"  autoplay loop muted >
                                  <source src="'.$filefaceimage.'" type="video/mp4"> 
                                </video>
                            </div>
                          </a>
                          <div class="card-body">
                            <p class="filenam margindown">
                              <span class="filenam"><b>'.$Filetitle.'</b></span>
                            </p>

                            <p class="filenam margindown">'.get_file_sizeofSubFolder($dir_path,$Filetitle).'</p>
                            <p class="filenam margindown">
                                <span class="filenam margindown">File'.$a.'</span>
                            </p>
                            <button  type="button" value1="'.$dir_path.'" value="'.$Filetitle.'" class="buttonsize detailfolder btn btn-info" data-toggle="modal" data-target="#details">
                                <span class="glyphicon glyphicon-th-list"></span> More
                            </button>
                            <button name="deletingfile" type="button" value1="'.$dir_path.'" value="'.$Filetitle.'" class="buttonsize deletefiles btn btn-danger" data-toggle="modal" data-target="#delete">
                              <span class="glyphicon glyphicon-trash"></span> Delete
                            </button>
                          </div>
                        </div>                    
                  </div>';              
              }
              else
              {
                if ($FileType == "docx" or $FileType == "doc") 
                {
                  # code...
                  $Filetitle = $files[$i];
                  $nospacefilename = str_replace(" ","%20","$Filetitle"); 
                  $filefaceimage = "images/docx.jpg";
                }
                elseif ($FileType == "pdf") 
                {
                  # code...
                  $Filetitle = $files[$i];
                  $nospacefilename = str_replace(" ","%20","$Filetitle");
                  $filefaceimage = "images/pdf.jpg";
                }
                elseif ($FileType == "rar" or $FileType == "7z" or $FileType == "zip") 
                {
                  # code...
                  $Filetitle = $files[$i];
                  $nospacefilename = str_replace(" ","%20","$Filetitle"); 
                  $filefaceimage = "images/rar.jpg";                     
                }
                elseif ($FileType == "mp3") 
                {
                  # code...
                  $Filetitle = $files[$i];
                  $nospacefilename = str_replace(" ","%20","$Filetitle");
                  $filefaceimage = "images/music.jpg";
                }
                else
                {
                  $Filetitle = $files[$i];
                  $nospacefilename = str_replace(" ","%20","$Filetitle");
                  $filefaceimage = $dir_path.$nospacefilename;                      
                }

                echo '<div class="col-md3 col-xs-4 my-3 px-2 my-md-0">;
                  <a href='.$dir_path.$nospacefilename.'>
                    <div class="card shadow">
                      <a href='.$dir_path.$nospacefilename.'>
                        <div>
                            <img class="photo" src="'.$filefaceimage.'" alt="events" class="img-fluid card-img-top">
                        </div>
                      </a>
                      <div class="card-body">
                          <p class="filenam margindown">
                              <span class="filenam"><b>'.$Filetitle.'</b></span>
                          </p>

                          <p class="filenam margindown">'.get_file_sizeofSubFolder($dir_path,$Filetitle).'</p>
                          <p class="filenam margindown">
                              <span class="filenam margindown">File'.$a.'</span>
                          </p>
                          <button type="button" value1="'.$dir_path.'" value="'.$Filetitle.'" class="buttonsize detailfolder btn btn-info" data-toggle="modal" data-target="#details">
                              <span class="filenam glyphicon glyphicon-th-list"></span> More
                          </button>
                          <button name="deletingfile" type="button" value1="'.$dir_path.'" value="'.$Filetitle.'" class="buttonsize deletefiles btn btn-danger" data-toggle="modal" data-target="#delete">
                              <span class="filenam glyphicon glyphicon-trash"></span> Delete
                          </button>
                      </div>
                    </div>
                  </a>
                </div>';            
              }                   
            }    
          }
        }
    }
  }
  // Folder Function for Sub Directory
  //This is php function for displaying list of folders inside navigated directory.
  function forFolders(){
      $h = $_GET['value'] ??'unknown_path';
      $dir_path = "Home/".$h."/";
      if(is_dir($dir_path))
      {
          $files = scandir($dir_path);
          //This ForLoop is for displaying text only if the folder contains other Folders
          for($j = 0; $j < count($files); $j++)
          {
              if($files[$j] !='.' && $files[$j] !='..')
              {
                  //Ckecking for files format
                  $FileType = strtolower(pathinfo($dir_path.$files[$j],PATHINFO_EXTENSION));
                  if ($FileType == "") { 
                    if ( count($files) > 0) {
                      # code...
                      echo '<h1 class="text-center">List of Folders in This Directory</h1>';
                      break;
                    }
                  }
              }
          }
          for($i = 0; $i < count($files); $i++)
          {
              if($files[$i] !='.' && $files[$i] !='..')
              {
                  $a = $i - 1;
                  //Ckecking for Folders format
                  $FolderType = strtolower(pathinfo($dir_path.$files[$i],PATHINFO_EXTENSION));
                  if ($FolderType == "") {
                    # code...
                    if ($files[$i] == "Music" or $files[$i] == "Musics" or $files[$i] == "music" or $files[$i] == "musics") {
                    # code...
                      $y = $files[$i];
                      $folderfaceimage = "images/Music.jpg";
                    
                    }
                      elseif ($files[$i] == "Documents" or $files[$i] == "Document" or $files[$i] == "document" or $files[$i] == "documents") {
                        # code...
                      $y = $files[$i];
                      $folderfaceimage = "images/Documents3.jpg";                  
                      }
                      elseif ($files[$i] == "Movies" or $files[$i] == "Movie" or $files[$i] == "movies" or $files[$i] == "movie") {
                        # code...
                      $y = $files[$i];
                      $folderfaceimage = "images/Movies2.jpg";                    
                      }
                      elseif ($files[$i] == "Files" or $files[$i] == "File" or $files[$i] == "files" or $files[$i] == "file") {
                        # code...
                      $y = $files[$i];
                      $folderfaceimage = "images/Files.jpg";                    
                      }
                      elseif ($files[$i] == "Images" or $files[$i] == "Image" or $files[$i] == "images" or $files[$i] == "image") {
                        # code...
                      $y = $files[$i];
                      $folderfaceimage = "images/Photos.jpg";                        
                      }
                      elseif ($files[$i] == "Videos" or $files[$i] == "Video" or $files[$i] == "videos" or $files[$i] == "video") {
                        # code...
                      $y = $files[$i];
                      $folderfaceimage = "images/Videos.jpg";
                      }
                      else{
                      $y = $files[$i];
                      $folderfaceimage = "images/Folders1.jpg";                        
                      }
                      echo '<div class="col-md3 col-sm-6 my-3 my-md-0">
                              <form method="get" action="'.$dir_path.$files[$i].'">
                                <div class="card shadow">
                                    <div>
                                        <img style="height:250px; width:100%;" src="'.$folderfaceimage.'" alt="events" class="img-fluid card-img-top">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><b>Folder: '.$files[$i].'<hr></b></h5>
                                        <input class="btn-lg btn-success"type="submit" name="open" value="OpenThisFolder">
                                        <input type="hidden" name="value1" value="'.$dir_path.'">
                                        <input type="hidden" name="value2" value="'.$y.'">
                                    </div>
                                </div>
                              </form>
                            </div>';
                  }
              }
          }
      }
  }
?>
<!-- Additional Modals for Additional Features Begins -->
<div class="modal fade" id="createModal" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content for Creating New Folder-->
      <div class="modal-content">
        <div class="modal-header py-1">
          <h3 style="position: relative; left: -23%;" class="modal-title">CreateFolder</h3>
          <button style="position: relative; left: 23%;" type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body py-0">
          <h3 style="float: left;">Create Your New Folder Name</h3>
          <input type="text" name="folder_name" id="folder_name" class="form-control">
          <br>
          <input type="hidden" name="action" id="action">
          <input type="hidden" name="old_name" id="old_name">
          <input style="float: left; font-size: 21px;" type="button" name="folder_button" id="folder_button" class="btn btn-info" value="CreateFolder">
          <br>
          <br>
          <br>
          <div class="text-center" id="createStatus"></div>
        </div>
        <div class="modal-footer py-1">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Below Modal is for Deleting Folder and also For Deleting Files -->
  <div class="modal fade" id="delete" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header py-1">
          <h3 style="position: relative; left: -4%;" class="modal-title">Administrative Previledge is Required</h3>
          <button style="position: relative; left: 23%;" type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body py-0">
          <h3 style="float: left; ">Please Verify Yourself</h3><br><br><br>
          <h3 style="float: left;">Passwords:</h3>
          <input type="password" name="security" id="security" class="form-control">
          <input type="hidden" name="d1" id="d1" class="form-control">
          <input type="hidden" name="d2" id="d2" class="form-control">
          <br>
          <input style="float: left; font-size: 21px;" type="button" name="delete_button" id="delete_button" class="btn btn-danger" value="DeleteFolder">
          <br>
          <br>
          <br>
          <div class="text-center" id="deleteStatus"></div>
        </div>
        <div class="modal-footer py-1">
          <button type="button" id="canceling" class=" btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modals for Details and Renaming-->
  <div class="modal fade" id="details" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header py-1">
          <h3 style="position: relative; left: -4%;" class="modal-title">Details of Particular Folder or Files</h3>
          <button style="position: relative; left: 23%;" type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body py-0">
          <br>
          <button style="float: left;"  type="button" value="'.$z.'" class="rename btn btn-info btn-lg" data-toggle="modal" data-target="#renaming">
              <span class="glyphicon glyphicon-th-list"></span> Rename
          </button>
          <button style="float: right;"  type="button" class="showingdetails btn btn-info btn-lg" data-toggle="modal" data-target="#showinformation">
              <span class="glyphicon glyphicon-th-list"></span> ShowDetails
          </button>
        </div>
        <div class="modal-footer py-1">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Another Nested Modals For Renaming Folders or Files -->
  <div class="modal fade" id="renaming" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header py-1">
          <h3 style="position: relative; left: -15%;" class="modal-title">RenameFolderOrFiles</h3>
          <button style="position: relative; left: 15%;" type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body py-0">
          <br>
          <h4>Also, Specify file extension While renaming files</h4>
          <input type="text" name="rename_name" id="rename_name" class="form-control">
          <input type="hidden" name="rename_path_help" id="rename_path_help" class="form-control">
          <br>
          <button style="float: left;"  type="button" class=" renamesubmit btn btn-info btn-lg">
              <span class="glyphicon glyphicon-th-list"></span> Submit
          </button>
          <br>
          <br>
          <br>
          <div class="text-center" id="renameStatus"></div>
        </div>
        <div class="modal-footer py-1">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <?php      
    $ghj = "_Service Is Not Available";
  ?>
  <div class="modal fade" id="showinformation" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header py-1">
          <h3 style="position: relative; left: -27%;" class="modal-title">Details</h3>
          <button style="position: relative; left: 27%;" type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body py-0">
          <br>
          <h4 style="float: left;">Folder Size is:<?php echo $ghj; ?></h4>
          <br>
          <br>
          <br>
          <h4 style="float: left;">Number of Items:<?php echo $ghj; ?></h4>
          <br>
          <br>
          <br>
          <h4 style="float: left;">Location is:<?php echo $ghj; ?></h4>
        </div>
        <div class="modal-footer py-1">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<script src="js/jquery.min.js"></script>
<script></script>

  <!-- Modal for uploading files-->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 style="position: relative; left: -16%;" class="font2 modal-title">Update Folder (<?php echo $h;  ?>)</h4>
          <button style="position: relative; left: 18%;" type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body py-0">
          <h3 class="font2">Please Select Multiple Files To Upload</h3>
          <form id="uploadForm" style="margin-bottom: 0px;" enctype="multipart/form-data">
            <p><input type="file" name="files[]" id="fileInput" multiple></p>
            <p><input type="hidden" name="helper" id="helping" value="<?php echo $h; ?>"></p>
            <p><input class="btn btn-info btn-lg" type="submit" name="upload" value="Upload "></p>
            <!-- Progress Bar Construction Below-->
            <div class="progress" style="height: 25px; margin-bottom: 0px;">
              <span class="progress-bar progress-bar-info progress-bar-striped active" style="font-size: 21px;" id="pb">
            </div> 

          </form>
           <!-- Below Div tag with id "uploadStatus" is for displaying loading.gif during file transfer -->
          <div class="text-center" id="uploadStatus"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         
        </div>
      </div>
    </div>
  </div>

  
<!-- //Ajax Start From Here -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/sweetalert.min.js"></script> 


  <!-- Below Jquery code is for creating folder -->
  <script>
    $(document).on('click', '#folder_button', function()
    {
      var folder_name = $('#folder_name').val();
      if (folder_name != '') 
      {
        $.ajax({
          url: "allfeatures.php",
          method:"POST",
          data:{folder_name:folder_name},
          beforeSend: function(){
            $('.submitBtn').attr("disabled","disabled");
            $('#createStatus').html('<img height: 100px; width:100%;" src="images/loading.gif"/>');
          },
          error:function(){
            $('#createStatus').html('<span style="color:#EA4335;">Folder Creation failed, please try again.<span>');
          },
          success:function(data)
          {
            $('#createStatus').fadeIn(1);
            $('#createStatus').html('<span style="color:#28A74B;">Folder Created successfully.<span>');
            swal({
                  title: "Folder Creation Successfull",
                  text: "Your Requested Folder has been Created" ,
                  icon: "success",
                  html:true
            });
          }
        });
      }
      else
      {
        swal(
        {
          title: "Folder Name is Empty",
          text: "Please Provide Folder Name to be Created" ,
          icon: "error",
          html:true
        });
      }
    });  

    // Below JQuery code is for refreshing previous value and div tag after the creating folder model is closed
    $('#createModal').on('hidden.bs.modal', function () 
    {
      $("#forfoldersrefresh1").fadeOut(500).load(location.href+" #forfoldersrefresh1").fadeIn(500);
      $("#forfilesrefresh1").fadeOut(500).load(location.href+" #forfilesrefresh1").fadeIn(500);
      $('#folder_name').val('');
      $('#createStatus').fadeOut(1);
    });
  </script>
  <!-- Below Jquery code is for Uploading Files -->
  <script>

    $(document).ready(function(){
      // File upload via Ajax
      $("#uploadForm").on('submit', function(e){
        e.preventDefault();
        var files_quantity = $('#fileInput').val();
        if (files_quantity != '') 
        {
          $.ajax({

            xhr: function(){
              var xhr = new window.XMLHttpRequest(); 
              xhr.upload.addEventListener("progress", function(evt){
                if (evt.lengthComputable) {
                  var percentComplete = ((evt.loaded/evt.total) * 100);
                  $(".progress-bar").width(percentComplete + '%');
                  $(".progress-bar").html(percentComplete.toFixed(2) + '%');
                }
              }, false);
              return xhr;
            },

            type: 'POST',
            url: 'allfeatures.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
              $('.submitBtn').attr("disabled","disabled");
              $('#uploadStatus').html('<img height: 100px; width:100%;" src="images/loading.gif"/>');
              $(".progress-bar").width('0%');              
            },
            error:function(){
              $('#uploadStatus').html('<span style="color:#EA4335;">File upload failed, please try again.<span>');
            },
            success: function(data){ //console.log(msg);
              $('#uploadForm')[0].reset();
              $('#uploadStatus').html('<span style="color:#28A74B;">File uploaded successfully.<span>');
              $('#uploadStatus').fadeIn(1);

              swal({
                    title: "Uploading Success",
                    text: "Your File has been uploaded Successfully" ,
                    icon: "success",
                    html:true
              });
              $(".submitBtn").removeAttr("disabled");
              // $('.gallery').html(data);
            }
          });
        }
        else
        {
          swal({
            title: "Please, Select Files",
            text: "Please, Select at least one files to Upload" ,
            icon: "error",
            html:true
          });
        }
      });
      // Below JQuery code is for refreshing previous value and div tag after the file upload model is closed
      $('#myModal').on('hidden.bs.modal', function () 
      {        
        $("#fileInput").val('');
        $('#uploadStatus').fadeOut(1);
        $(".progress-bar").width('0%');   
        $("#forfilesrefresh2").fadeOut(500).load(location.href+" #forfilesrefresh2").fadeIn(500);
        $("#forfoldersrefresh2").fadeOut(500).load(location.href+" #forfoldersrefresh2").fadeIn(500);           
      });

      // Jquery Code for Deleting Folder 
      $(document).on("click", ".delete", function(){ //Implementing this code for executing jquery even after div refresh
        var folders_name = $(this).attr("value"); 
        var folders_name1 = $(this).attr("value1");
        $('#d1').val(folders_name);
        $('#d2').val(folders_name1);

        $(document).on('click', '#delete_button', function()
        {
          var foldername = $('#d1').val();
          var filename1 = $('#d2').val();

          var security = $('#security').val();
          if (security != '') 
          {
            if (security === "root") 
            {
              $.ajax({
                url: "allfeatures.php",
                method:"POST",
                data:{foldername:foldername, security:security, filename1:filename1},
                beforeSend: function(){
                  $('.submitBtn').attr("disabled","disabled");
                  $('#deleteStatus').html('<img height: 100px; width:100%;" src="images/loading.gif"/>');
                },
                error:function(){
                  $('#deleteStatus').html('<span style="color:#EA4335;">Folder Deletion failed, please try again.<span>');
                },
                success:function(data)
                {
                  $('#deleteStatus').fadeIn(1);
                  $('#deleteStatus').html('<span style="color:#28A74B;">Folder deleted successfully.<span>');
                  swal({
                        title: "Deletion is Successfull",
                        text: "We have Deleted as Per Your Request" ,
                        icon: "success",
                        html:true
                  });
                }
              });
            }
            else
            {
              swal({
                    title: "Security Code is Incorrect",
                    text: "You Provided Incorrect SecurityCode" ,
                    icon: "error",
                    html:true
                  });
            }                     
          }
          else
          {
            swal(
            {
              title: "Password Field is Empty",
              text: "You need to Verify Yourself for Deleting anything" ,
              icon: "error",
              html:true
            });
          }
        });
      });
      // Below Script is JQuery Script For Deleting Files
      
      // $(document).on("click", "#IntNote_CreatedDate", function(){});==> This line of script is best for handling event even after refreshing particular div instead of using $(".detailfolder").click(function(){});
      $(document).on("click", ".deletefiles", function(){
       // Call on click where element having class name as pass
        var file_name = $(this).attr("value"); // this - gives div element which has the id as A(or)B(or)C(or)D
        // var filepath = $(this).attr("value1");
        var file_path = $(this).attr("value1");

        $('#d1').val(file_name);
        $('#d2').val(file_path);
        
        $(document).on('click', '#delete_button', function()
        {
          var filename = $('#d1').val();
          var filepath = $('#d2').val();

          var security = $('#security').val();
          if (security != '') 
          {
            if (security === "root") 
            {
              $.ajax({
                url: "allfeatures.php",
                method:"POST",
                data:{filename:filename, security:security, filepath:filepath},
                beforeSend: function(){
                  $('.submitBtn').attr("disabled","disabled");
                  $('#deleteStatus').html('<img height: 100px; width:100%;" src="images/loading.gif"/>');
                },
                error:function(){
                  $('#deleteStatus').html('<span style="color:#EA4335;">File Deletion failed, please try again.<span>');
                },

                success:function(data)
                {
                  $('#deleteStatus').fadeIn(1);
                  $('#deleteStatus').html('<span style="color:#28A74B;">File deleted Successfully.<span>');
                  swal({
                        title: "File Deletion is Successfull",
                        text: "Your Requested File has been Deleted" ,
                        icon: "success",
                        html:true
                  });
                }
              });
            }
            else
            {
              swal({
                    title: "Security Code is Incorrect",
                    text: "You Provided Incorrect SecurityCode" ,
                    icon: "error",
                    html:true
                  });
            }                     
          }
          else
          {
            swal(
            {
              title: "Password Field is Empty",
              text: "You need to Verify Yourself for Deleting anything" ,
              icon: "error",
              html:true
            });
          }
        });
        
      });

      // Below JQuery code is for refreshing previous value and div tag after the deleting folder or file model is closed
      $('#delete').on('hidden.bs.modal', function () 
      {
        // location.reload();
         $('#security').val('');
         $('#deleteStatus').fadeOut(1);
         $("#forfilesrefresh2").fadeOut(500).load(location.href+" #forfilesrefresh2").fadeIn(500);
         $("#forfoldersrefresh2").fadeOut(500).load(location.href+" #forfoldersrefresh2").fadeIn(500);
         $("#forfilesrefresh1").fadeOut(500).load(location.href+" #forfilesrefresh1").fadeIn(500);
         $("#forfoldersrefresh1").fadeOut(500).load(location.href+" #forfoldersrefresh1").fadeIn(500);
      });
  
      // JQuery code for renaming files or folders
      $(document).on("click", ".detailfolder", function(){ 
        var detailfilename = $(this).attr("value"); // this - gives div element which has the id as A(or)B(or)C(or)D
        var detail_filepath = $(this).attr("value1"); // this - gives div element which has the id as A(or)B(or)C(or)D

        $(document).on("click", ".rename", function(){
          $('#rename_name').val(detailfilename);
          $('#rename_path_help').val(detail_filepath);
          $(document).on("click", ".renamesubmit", function(){
            var renaming_name = $('#rename_name').val();
            var detailfilepath = $('#rename_path_help').val();
            if (renaming_name != '') {
              $.ajax({
                url: "allfeatures.php",
                method:"POST",
                data:{detailfilename:detailfilename, renaming_name:renaming_name, detailfilepath:detailfilepath},
                beforeSend: function(){
                  $('.submitBtn').attr("disabled","disabled");
                  $('#renameStatus').html('<img height: 100px; width:100%;" src="images/loading.gif"/>');
                },
                error:function(){
                  $('#renameStatus').html('<span style="color:#EA4335;">Renaming failed, please try again.<span>');
                },
                success:function(data)
                {
                  $('#renameStatus').fadeIn(1);
                  $('#renameStatus').html('<span style="color:#28A74B;">Renaming Successfull.<span>');

                  swal({
                        title: "Renaming is Successfull",
                        text: "We have Successfully Renamed It" ,
                        icon: "success",
                        html:true
                  });
                }
              });
            }
            else{
              swal({
                    title: "Renaming Name field is Empty",
                    text: "Please Provide New Name for Renaming this Folder" ,
                    icon: "error",
                    html:true
              });
            }
          });
        });        
      });
      // Below JQuery code is for refreshing previous value and div tag after the renaming and detailing model is closed
      $('#details').on('hidden.bs.modal', function () 
      {
        // location.reload();
        // $('#rename_name').val('');
        // $('#security').val('');
        $('#renameStatus').fadeOut(1);
        $("#forfilesrefresh1").fadeOut(500).load(location.href+" #forfilesrefresh1").fadeIn(500);
        $("#forfoldersrefresh1").fadeOut(500).load(location.href+" #forfoldersrefresh1").fadeIn(500);
        $("#forfilesrefresh2").fadeOut(500).load(location.href+" #forfilesrefresh2").fadeIn(500);
        $("#forfoldersrefresh2").fadeOut(500).load(location.href+" #forfoldersrefresh2").fadeIn(500);
      });
    });
</script>
  <!-- //Below PHP code is for creating folder  -->
  <?php

    if (!empty($_POST["folder_name"])) 
    {
      # code...
      if (!file_exists("Home/".$_POST["folder_name"])) 
      {
        # code...
        mkdir("Home/".$_POST["folder_name"], 0777, true);
        echo 'Folder Created';
      }
      else
      {
        echo 'Folder Already Created';
      }
    }
    // Below PHP code is for Uploading Files
    if(!empty($_FILES['files'])){
      $p = $_POST['helper'];
      // This is File upload configuration
      $targetDir = "Home/".$p."/";          
      $images_arr = array();
      foreach($_FILES['files']['name'] as $key=>$val){
          $image_name = $_FILES['files']['name'][$key];
          $tmp_name   = $_FILES['files']['tmp_name'][$key];
          $size       = $_FILES['files']['size'][$key];
          $type       = $_FILES['files']['type'][$key];
          $error      = $_FILES['files']['error'][$key];
          // This is File upload path
          $fileName = basename($_FILES['files']['name'][$key]);
          $targetFilePath = $targetDir . $fileName;
          
          // Below code helps to Store images on the server
          if(move_uploaded_file($_FILES['files']['tmp_name'][$key],$targetFilePath)){
              $images_arr[] = $targetFilePath;
          }       
      }
    }
    // PHP code for deleting Folder Only
    if (!empty($_POST["foldername"])) 
    {
      $deleting_name = $_POST["foldername"];
      $delete_path = "Home/".$deleting_name."/";
      $files = scandir($delete_path);
      foreach($files as $file)
      {
        if ($file === '.' or $file === '..') 
        {
          # code...
          continue;
        }
        else
        {
          unlink($delete_path . $file);
        }
      }
      if (rmdir($delete_path)) 
      {
        # code...
        echo '<script> alert("Folder Has Been Deleted")</script>';
      }
    }
    // PHP Script For Deleting Files Inside Main Folders Only
    if (!empty($_POST["filename1"])) 
    {
      $deleting_name = $_POST["filename1"];
      $delete_path = "Home/";      
      unlink($delete_path . $deleting_name);
    }
    // PHP code for deleting Files Only
    if (!empty($_POST["filename"])) 
    {
      $deleting_name = $_POST["filename"];
      $delete_path = $_POST["filepath"];
      $files = scandir($delete_path);      
      unlink($delete_path . $deleting_name);
    }
    // PHP Scripts for Renaming Files or Folder within root Folder
    if (!empty($_POST["renaming_name"])) 
    {
      $renaming_path = "Home/";
      $oldname = $_POST["detailfilename"];
      $renamethisold = $renaming_path.$oldname;
      $newname = $_POST["renaming_name"];
      $renamethisnew = $renaming_path.$newname;
      if (!file_exists($renaming_path.$newname)) {
        # code...
        rename($renamethisold, $renamethisnew);
        echo 'Folder Name Change';
      }
      else{
        echo '<script>alert("Folder Already Created") </script>';
      }
    }
    // PHP Scripts For Renaming Files and Folders inside of root Folder
    if (!empty($_POST["renaming_name"])) 
    {
      $detailfilepath = $_POST["detailfilepath"];
      $renaming_path = $detailfilepath;
      $oldname = $_POST["detailfilename"];
      $renamethisold = $renaming_path.$oldname;
      $newname = $_POST["renaming_name"];
      $renamethisnew = $renaming_path.$newname;
      if (!file_exists($renaming_path.$newname)) {
        # code...
        rename($renamethisold, $renamethisnew);
        echo 'Folder Name Change';
      }
      else{
        echo '<script>alert("Folder Already Created") </script>';
      }
    }
  ?>



