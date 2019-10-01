<?php
require_once( "dbcon.php" );

function escape( $string ) {
    global $conn;
    return mysqli_real_escape_string( $conn, $string );
}

function query( $query ) {
    global $conn;
    return mysqli_query( $conn, $query );
}

function fetch_array( $result ) {
    return mysqli_fetch_array($result );
}

function confirm( $result ) {
    global $conn;
    if ( !$result ) {
        die( "quary failed" . mysqli_error( $conn ) );
    }
}


function row_count( $query ) {
    return mysqli_affected_rows( $query );
}

function clean( $string ) {
    return htmlentities( $string );
}

function redirect( $location ) {
    return header( "Location: {$location}" );
}

function display_message() {
    if ( isset( $_SESSION[ 'message' ] ) ) {
        echo $_SESSION[ 'message' ];
        unset( $_SESSION[ 'message' ] );

    }
}


function dispaly_error( $message ) {
    $messasge = <<<DELIMITER
					<div class="alert alert-danger alaert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-lebel="Close" >
	<span aria-hidden="true">&times;</span>
	</button>
	<strong>Warninig</strong>'$message 
</div>
DELIMITER;
    return $messasge;
}

function email_exist( $email ) {
    $sql = "SELECT * FROM USER WHERE email = '$email'";
    $result = query( $sql );
    if ( row_count( $result ) >= 1 ) {
        return true;

    } else {
        return false;
    }
}

function user_exist( $user_name ) {
    $sql = "SELECT * FROM USER WHERE username  = '$user_name'";
    $result = query( $sql );
    if ( row_count( $result ) >= 1 ) {
        return true;

    } else {
        return false;
    }
}

function number_of_trucks() {
    $sql = "SELECT `PlateNumber` FROM `vehicle` WHERE `flag` =1";
     $result = query( $sql );
  return  $result = mysqli_num_rows( $result );
}

function number_of_drivers() {
    $sql = "SELECT  `drivereID` FROM `driver` WHERE `flag` =1";
     $result = query( $sql );
  return  $result = mysqli_num_rows( $result );
}
function active_operation() {
    $sql = "SELECT `id` FROM `operation` WHERE `flag` =1";
     $result = query( $sql );
  return  $result = mysqli_num_rows( $result );
}
function cargo_volume() {
    $sql = "SELECT  sum(`CargoVolumMT`) FROM `operation` WHERE `flag` =1";
    $result = query( $sql );
    $row = mysqli_fetch_array( $result );
    return number_format( $row[ 0 ], 2 );
  
}

function uplifted_ton() {
    $sql = "SELECT sum(performance.`CargoVolumMT`) FROM `performance` JOIN operation on  performance.`OperationId`=operation.OperationId WHERE operation.flag = 1";
    $result = query( $sql );
    $row = mysqli_fetch_array( $result );
    return number_format( $row[ 0 ], 2 );
  
}
function remaining_ton() {
    $sql1 = "SELECT  sum(`CargoVolumMT`) FROM `operation` WHERE `flag` =1";
    $result1 = query( $sql1 );
    $row1 = mysqli_fetch_array( $result1 );
    $sql2 = "SELECT sum(performance.`CargoVolumMT`) FROM `performance` JOIN operation on  performance.`OperationId`=operation.OperationId WHERE operation.flag = 1";
    $result2 = query( $sql2 );
    $row2 = mysqli_fetch_array( $result2 );
    $dif = $row1[0] - $row2[0];
    return number_format( $dif, 2 );
  
}



?>