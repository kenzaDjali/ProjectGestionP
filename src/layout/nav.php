        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span></a>
                    <a class="brand" href="index">IP-formation 
                        <?php if (isset($_SESSION['role_id'])&& $_SESSION['role_id']=='4'){ echo 'Administrateur';}
                                else {echo 'Utilisateur';}?>
                    </a>
                    <div class="nav-collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-cog"></i> 
                                    Account <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                  <li><a href="javascript:;">Settings</a></li>
                                  <li><a href="javascript:;">Help</a></li>
                                </ul>
                            </li>
                                <li><a href="logout">Logout</a></li>
                              
                            </li>
                        </ul>
                        <form class="navbar-search pull-right">
                            <input type="text" class="search-query" placeholder="Search">
                        </form>
                    </div>
                    <!--/.nav-collapse --> 
                </div>
                <!-- /container --> 
            </div>
            <!-- /navbar-inner --> 
        </div>
        <!-- /navbar -->
        <div class="subnavbar">
            <div class="subnavbar-inner">
                <div class="container">
                    <ul class="mainnav">
                        <li class="active"><a href="welcome"><i class="icon-dashboard"></i><span>Tableau de Bord</span> </a> </li>
                        <?php if (isset($_SESSION['role_id'])&& $_SESSION['role_id']=='4'){ ?>

                         <li><a href="user"><i class="icon-group"></i><span>Liste utilisateurs</span> </a></li>
                        <li><a href="session"><i class="icon-list"></i><span>Liste des sessions</span> </a> </li>                                                      

                       <?php }?>
                       <?php if (isset($_SESSION['role_id'])&& $_SESSION['role_id']=='1'){ ?>
                        <li><a href="form_learner"><i class="icon-user"></i><span>Pointeuse</span> </a> </li>
                        <li><a href="form_profil"><i class="fa fa-newspaper-o"></i><span>Profil</span> </a> </li>
                        <?php }?>
                       <?php if (isset($_SESSION['role_id'])&& $_SESSION['role_id']=='2'){ ?>
                        <li><a href="teacher"><i class="fa fa-users"></i><span>Classe</span> </a> </li>
                        <?php }?>                        
                        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-long-arrow-down"></i><span>Drops</span> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="login.html">Login</a></li>
                                <li><a href="signup.html">Signup</a></li>
                                <li><a href="error.html">404</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /container --> 
            </div>
            <!-- /subnavbar-inner --> 
        </div>
