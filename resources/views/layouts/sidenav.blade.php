<nav class="side-navbar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="../img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle">

        </div>
        <div class="title">
            <h1 class="h4">
                <?php if(isset($_SESSION['user'])){ echo $_SESSION['user']; } else { echo "user not set yet";} ?>
            </h1>
            <p>
                <?php if(isset($_SESSION['job'])){ echo $_SESSION['job']; } else { echo "sample datea";} ?>
            </p>
        </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
        <li><a href="index.php"> <i class="icon-home"></i>Home </a>
        </li>
        <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Truckes </a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="trucks.php">Truck</a>
                </li>
                <li><a href="trucks_model.php">Truck Model</a>
                </li>
            </ul>
        </li>
        <li><a href="drivers.php"> <i class="icon-user"></i>Driver </a>
        </li>
        <li><a href="#exampledropdownDropdown2" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Operations </a>
            <ul id="exampledropdownDropdown2" class="collapse list-unstyled ">
                <li><a href="operation.php">Operation</a>
                </li>
                <li><a href="operation_place.php">Operations Place</a>
                </li>
                <li><a href="operation_region.php">Operations Region</a></li>
                <li><a href="operation_place_distance.php">Place Distance</a></li>
            </ul>
        </li>
        <li><a href="customers.php"> <i class="icon-home"></i>Customers </a>
        </li>
        <li><a href="performance.php"> <i class="icon-home"></i>Performance </a>
        </li>

        <li><a href="#exampledropdownDropdown3" aria-expanded="false" data-toggle="collapse"> <i class="icon-form"></i>Status </a>
            <ul id="exampledropdownDropdown3" class="collapse list-unstyled ">
                 <li><a href="status_new_view.php">Status </a>
                </li>
                <li><a href="status_type.php">Status Type</a>
                </li>
              
            </ul>
        </li>

        <li><a href="truck_driver.php"> <i class="icon-home"></i>Truck Driver Assign </a>
        </li>


        <li><a href="#exampledropdownDropdown6" aria-expanded="false" data-toggle="collapse"> <i class="icon-line-chart"></i>Report </a>
            <ul id="exampledropdownDropdown6" class="collapse list-unstyled ">
                <li><a href="rep_performance_by_driver.php">Performance By Driver</a> </li>
                <li><a href="rep_performance_by_plate.php">Performance By truck</a>
                </li>
                <li><a href="rep_performance_by_operation.php">Operation & performance</a>
                </li>
                <li><a href="rep_performance_by_operation_date.php">Operation by date</a>
                </li>
                <li><a href="rep_performance_by_model.php">Performance By Model</a></li>
                <li><a href="rep_status_by_date.php">Status By Date</a></li>
                <li><a href="rep_truk_driver_all.php">All Truck Driver</a></li>
            </ul>

            <li><a href="#exampledropdownDropdown7" aria-expanded="false" data-toggle="collapse"> <i class="icon-clock"></i>Setting </a>
                <ul id="exampledropdownDropdown7" class="collapse list-unstyled ">

                </ul>
            </li>

    </ul>
</nav>