<?php

include("../config.php");

if(isset($_POST['insertdata']))
{
        //$Uid = $_POST['Uid'];
    $facultyName = $_POST['facultyName'];                   ;
    $facultyMobileNo = $_POST['facultyMobileNo'];                                                                                                         
    $facultyEmail = $_POST['facultyEmail'];
    $collegeId = $_POST['collegeId'];                             
                                    

    $query = "insert into tblFaculty(facultyID, facultyName, facultyEmail, facultyMobileNo, collegeId) values(null, '$facultyName','$facultyEmail','$facultyMobileNo',$collegeId);";
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