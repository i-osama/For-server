<?php
if(isset($_POST['Name'])){
    $server = "localhost";
    $username = "id20158841_admin";
    $password = "pdoO#ryQ/6pz3KN~";
    $database = "id20158841_userdatase";
    $con = mysqli_connect($server, $username, $password, $database);

    if(!$con){
        die("connection to this database failed. Due to ". mysqli_connect_error());
    }

    // echo "success!";
    $name = $_POST['Name'];
    $age = $_POST['Age'];
    $gender = $_POST['Gender'];
    $details = $_POST['Details'];

    $sql = "INSERT INTO `user` (`Name`, `Age`, `Gender`, `Details`, `Date`) VALUES ('$name','$age', '$gender', '$details', current_timestamp())";

    if($con->query($sql) == true){
        echo "Data inserted successfully!";
    }
    else{
        echo "Error!  $sql <br> $con->error";
    }
}

if(isset($_GET)){
    // for get request
    $server = "localhost";
    $username = "id20158841_admin";
    $password = "pdoO#ryQ/6pz3KN~";
    $database = "id20158841_userdatase";
    $con = mysqli_connect($server, $username, $password, $database);

    if(!$con){
        die("connection to this database failed. Due to ". mysqli_connect_error());
    }

    $sql = "SELECT * FROM user";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $data = array();
        while($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        echo json_encode($data);
    } else {
        echo "Nothing to show!";
    }
    mysqli_close($con);
}

?>
