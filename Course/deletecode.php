<?php
include("../config.php");

if(isset($_POST['deletedata']))
{
    $courseId = $_POST['delete_course'];

    $query = "DELETE FROM tblCourse WHERE courseId=$courseId;";
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