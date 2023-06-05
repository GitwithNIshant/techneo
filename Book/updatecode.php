<?php
include("../config.php");

if (isset($_POST['updatedata'])) {

     $bookId = $_POST['edit_book'];
     $bookName = $_POST['bookName'];
     $bookShortCode = $_POST['bookShortCode'];
     $courseId = $_POST['courseId'];
     $query = "UPDATE tblBook SET bookName = '$bookName', bookShortCode = '$bookShortCode', tblBook.courseId = $courseId WHERE bookId = $bookId;";
     // echo $query;
     $query_run = mysqli_query($connection, $query);
     if ($query_run) {
          echo '<script> alert("Data Updated"); </script>';
          header("Location:index.php");
     } else {
          echo '<script> alert("Data Not Updated"); </script>';
     }

}
?>