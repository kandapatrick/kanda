<ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="avatar.jpg" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?php echo ucfirst($_SESSION['username']); ?></p>
                  <p class="designation">User category</p>
                </div>
              </a>
            </li>
         
            
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic" style="display:none" id="ch">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Chambres</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="dispo.php">Disponibles</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="occupe.php">Occupées</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ec_paye.php" style="display:none" id="paye">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span class="menu-title">Payement</span>
              </a>
            </li>
            
            
           
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth" style="display:none" id="cl">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">Clients</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="client.php"> Clients en logement </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="archive.php"> Archivage</a>
                  </li>
                 
                  
                </ul>
              </div>
            </li>
			 <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#pi" aria-expanded="false" aria-controls="pi" style="display:none" id="para">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">Paramètre</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="pi">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="pchambre.php"> Chambres </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#"> Clients</a>
                  </li>
                 
                  <li class="nav-item">
                    <a class="nav-link" href="#"> Utilisateurs</a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
		  <input type="text" value="<?php echo $_SESSION['username']; ?>" id="acces" style="display:none">
		