<?php

include("../config.php");

if(isset($_POST['insertdata']))
{
    //$Uid = $_POST['Uid'];
    $universityName = $_POST['universityName'];
    $universityShortCode = $_POST['universityShortCode'];

    $query = "INSERT INTO tblUniversity (`universityName`,`universityShortCode`) VALUES ('$universityName','$universityShortCode')";
    // echo $query;
    $query_run = mysqli_query($connection, $query);

    if($query_run)
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