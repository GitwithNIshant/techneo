<?php

include("../config.php");

if (isset($_POST['insertdata'])) {
    //$Uid = $_POST['Uid'];
    $courseName      = $_POST['courseName'];
    $courseShortCode = $_POST['courseShortCode'];
    $universityID    = $_POST['universityID'];

    $query           = "insert into tblcourse(courseName, courseShortCode, universityID) values ('$courseName','$courseShortCode', $universityID);";
    // echo $query;
    $query_run       = mysqli_query($connection, $query);
    if ($query_run) 
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: index.php');
    } 
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>