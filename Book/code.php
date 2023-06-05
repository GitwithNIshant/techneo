<?php
include("../config.php");

if (isset($_POST['checking_viewbtn'])) {
     $bookId = $_POST['bookId'];
    

     $query = "SELECT bookId, bookName, bookCode, courseName, AcademicYear, GraduationYear, Semister, BookPrice, tbluniversity.universityName FROM tblbook, tblcourse, tbluniversity where tblbook.courseId = tblcourse.courseId and tbluniversity.universityID = tblcourse.universityID and bookId = $bookId;";
     // echo $query;
     $query_run = mysqli_query($connection, $query);

     if (mysqli_num_rows($query_run) > 0) {
          foreach ($query_run as $row) {
               echo $return = '
               <h5>book Id :            ' . $row['bookId'] . ' </h5>
               <h5>book Name :          ' . $row['bookName'] . ' </h5>
               <h5>book Code :          ' . $row['bookCode'] . ' </h5>
               <h5>Academic Year        ' . $row['AcademicYear'] . ' </h5>
               <h5>university Name :    ' . $row['universityName'] . ' </h5>
               <h5>Graduation Year :    ' . $row['GraduationYear'] . ' </h5>
               <h5>Course Name :        ' . $row['courseName'] . ' </h5>
               <h5>Semister :           ' . $row['Semister'] . ' </h5>
               <h5>Book Price :         ' . $row['BookPrice'] . ' </h5>
             ';
          }         
     } else {

          echo $return = "<h5>No Record Found</h5>";
     }
}
?>