<?php
include "includes/internal-languages.php";
?>
   <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="index.php"> <?=$lang['titleproject'] ?> </a>
          </div>
          <div class="collapse navbar-collapse" id="custom-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="index.php"><?=$lang['main'] ?></a></li>
              <li><a href="about.php"><?=$lang['about'] ?></a></li>
              <!-- <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">информация</a> 
                <ul class="dropdown-menu" role="menu"> -->
                    <li><a href="general_information.php"><?=$lang['generalinfo'] ?></a></li>
                <!-- </ul> -->
              </li>

             

                <li class="dropdown"> <a href="login.php" ><?=$lang['authoriz'] ?></a>               
                </li>                       
            </ul>
          </div>
        </div>
      </nav>