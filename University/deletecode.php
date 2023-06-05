<?php
include("../config.php");


if(isset($_POST['deletedata']))
{
    $delete_id = $_POST['delete_id'];
    $query = "DELETE FROM tbluniversity WHERE universityID=$delete_id";
    // echo $query;
    $query_run = mysqli_query($connection, $query);
    
    

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("Location:index.php");
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}    

?>