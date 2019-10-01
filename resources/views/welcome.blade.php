@include('master.head')
@section('styles')
@endsection
@section('content')
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
                                    <p><i class="fa fa-google"></i> &nbsp; yetimnew@gmail.com</p>
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
    @endsection
    @section('javascript')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}" > </script>
    <script>
    $(document).ready(function(){
    $('#customer').DataTable();
    });
    </script>
    @endsection