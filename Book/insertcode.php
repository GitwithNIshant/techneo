<?php

include("../config.php");

if(isset($_POST['insertdata']))
{
    //$Uid = $_POST['Uid'];
    $bookName = $_POST['bookName'];
    $bookCode = $_POST['bookCode'];
    $BookShortCode = $_POST['BookShortCode'];
    $courseId = $_POST['courseId'];
    //$universityID = $_POST['universityID'];
    $AcademicYear = $_POST['AcademicYear'];
    $GraduationYear = $_POST['GraduationYear'];
    $Semister = $_POST['Semister'];
    $BookPrice = $_POST['BookPrice'];
    

    $query = "insert into tblbook(bookName, bookCode, BookShortCode, courseId, AcademicYear, GraduationYear, Semister, BookPrice) values ('$bookName','$bookCode', '$BookShortCode', $courseId ,'$AcademicYear','$GraduationYear', '$Semister','$BookPrice');";
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
