<div class="brand clearfix">
            <a href='../profile.php'><b class="adminname"><?php echo "Welcome  ". ucfirst($k['t_owner_fname'])."!";
            ?> | Admin </b></a>
            <span class="menu-btn"><i class="fa fa-bars"></i></span>
            <ul class="ts-profile-nav">
                <li class="ts-account">
                    <a href="#" class=""> <img src="../images/logo/<?php echo $k['owner_pix'] ?>" width="50" alt="<?php echo ucfirst($k['t_owner_uname']) ?>" class="ts-avatar hidden-side bg-white"><?php echo ucfirst($k['t_owner_fname']) ?><i class="fa fa-angle-down hidden-side"></i></a>
                    <ul>
                        <li><a href="logout.php" class="keychainify-checked">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>