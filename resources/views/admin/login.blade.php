<?php ob_start();?>
<?php session_start();?>

<?php include("includes/init.php")?>
<?php include("includes/head.php")?>
<div class="page login-page">
    <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
            <div class="row">
                <!-- Logo & Information Panel-->
                <div class="col-lg-6">
                    <div class="info d-flex align-items-center">
                        <div class="content">
                            <div class="logo">
                                <div class="avatar text-center"><img src="img/logo.png" alt="..." class="img-fluid" width="350" height="350">
                                </div>
                                <div class="title">

                                    <br>
                                    <h3 class="text-center">TRANSPORT INFORMATION MANGMENT SYSTEM(TIMS)</h3>
                                    <br>
                                    <p><i class="fa fa-user"></i> Developed By Yetimesht Tadesse</p>
                                    <p><i class="fa fa-mobile"></i> &nbsp; +251929102926</p>
                                    <p><i class="fa fa-gmail"></i> &nbsp; yetimnew@gmail.com</p>
                                    <p><i class="fa fa-facebook"></i> &nbsp; https://www.facebook.com</p>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Form Panel    -->
                <div class="col-lg-6 bg-white">
                    <div class="form d-flex align-items-center">
                        <div class="content">
                            <form method="POST" action="login.php">
                                <div class="form-group required">
                                    <label for="email" class="control-label">User Name</label>
                                    <input id="email" type="text" name="email" required class="form-control" placeholder="Email Address">

                                </div>
                                <div class="form-group required">
                                    <label for="password" class="control-label">Password</label>
                                    <input id="password" type="password" name="password" required class="form-control" placeholder="Password">
                                </div>
                                <button type="submit" name="submit" id="submit" class="btn btn-primary btn-md btn-block"> Login</button>
                            </form>
                            <a href="#" class="forgot-pass">Forgot Password?</a><br><small>Do not have an account? </small><a href="register.php" class="signup">Signup</a>



                            <?php 
                      if(isset($_POST['submit'])){
                    $email = escape( $_POST[ 'email' ] );
                    $passs = escape( $_POST[ 'password' ] );
                      $quary = "SELECT  `id`, `firstName`, `lastName`, `contactno`, `emailid`, `password`, `userDeparment`, `job_title`, `userName`, `timestump`, `flag` FROM `user` WHERE `emailid`='$email' AND `password`='$passs' AND flag =1";
                       
                        $result= query($quary);
                          confirm($result);
                          
                        while($row =fetch_array($result)){
                        			$emilener = $row['emailid'];
                        			$passener = $row['password'];
                                    $userDeparment = $row['userDeparment'];
                                    $firstName = $row['firstName'];
                                    $job_title = $row['job_title'];
                        }
                          global $userDeparment;
                        if($userDeparment == 1) {
                        		$_SESSION['user']=$firstName;
                        		$_SESSION['job']=$job_title;
                        		$_SESSION['department']=$userDeparment;
                           // echo  $quary;
                        		header("Location: admin");
                        	}
                        elseif($userDeparment== 2){
                        	$_SESSION['user']=$firstName;
                            $_SESSION['job']=$job_title;
                            $_SESSION['department']=$userDeparment;
                        	header("Location: main");
                            //   echo  $quary;
                        }
                        
                        else {
 echo "<script type='text/javascript'>alert('The username or password not correct>');
window.location='login.php'; </script>";
                        	
                        }
                        
                      }
                      ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="copyrights text-center">
            <p>Design by <a href="#" class="external">Yetimeshet T</a>
            </p>
        </div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js">
    </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js">
    </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
    </body>
    <script>
        $( document ).ready( function () {
            $( 'form' ).validate( {
                rules: {
                    email: {
                        required: true,
                        email: true,

                    },
                    password: {
                        required: true,
                        minlength: 6

                    }
                },
                messages: {
                    email: {
                        required: "Email field required ...",
                        email: "Enter valid Email address ...",

                    },
                     password: {
                        required: "Password field required ...",
                        minlength: "minmum length should be 6 charcter ..."

                    }

                }
     
            } );

        } );
    </script>

    </html>