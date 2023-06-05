<?php
include("../config.php");

if(isset($_POST['deletedata']))
{
    $bookId = $_POST['delete_book'];

    $query = "DELETE FROM tblbook WHERE bookId=$bookId;";
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