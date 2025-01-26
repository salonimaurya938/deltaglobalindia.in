<?php 
            $que="SELECT * from admin where role='admin'";
            $st=$conn->prepare($que);
            $st->execute();
            $re=$st->fetch();
            // $imgs=$re['img'];
            $id=$re['id'];
            ?>
          <div class="header"> <!-- Header start -->
            <div class="header-left">
                <a href="index.php" class="logo">
                   <B> Delta Golbal</B>
                </a>
            </div>
            <div class="page-title-box float-left">
              <h3 class="text-uppercase"> Delta Golbal</h3>
            </div>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars" aria-hidden="true"></i></a>
            <ul class="nav user-menu float-right">
              
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle" src="assets/img/user.jpg" width="40" alt="Admin">
							<span class="status online"></span></span>
                        <span> </span>
                    </a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="admin-profile.php?id=<?php echo $id;?>">My Profile</a>
						<a class="dropdown-item" href="change_password.php?id=<?php echo $id;?>">Change Password</a>
						<a class="dropdown-item" href="logout.php">Logout</a>
					</div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right"> <!-- mobile menu -->
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="admin-profile.php?id=<?php echo $id;?>">My Profile</a>
                    <a class="dropdown-item" href="change_password.php?id=<?php echo $id;?>">Change Password</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </div>
        </div>