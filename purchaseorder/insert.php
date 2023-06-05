<?php
$connection = mysqli_connect("localhost", "root", "Nishant@12345");
$db         = mysqli_select_db($connection, 'dbtechneo');
if (isset($_POST['insertdata'])) {
   // $Uid = $_POST['Uid'];
   $Pdate = date('Y-m-d', strtotime($_POST['Pdate']));
   // $Pstatus = $_POST['Pstatus'];
   $collegeID = $_POST['collegeID'];

   $query1 = "INSERT INTO tblpurchaseorder (Pdate,collegeID) VALUES ('$Pdate','$collegeID')";
   $query_run = mysqli_query($connection, $query1);
   $query2 = "select max(pid) as maxpid from tblpurchaseorder;";
   $maxquery_run = mysqli_query($connection, $query2);
   while ($row = mysqli_fetch_assoc($maxquery_run)):
     $maxpid=$row['maxpid'];
   endwhile;
   echo $maxpid;
   for ($str = 1; $str <= 150; $str++) {
      //$BookNameid='BookName'.$str;
      if (isset($_POST['bookId'.$str])) {
   $bookId    = $_POST['bookId'.$str];
   $facultyID = $_POST['facultyID'.$str];
   $purchasequentity    = $_POST['purchasequentity'.$str];
   //$BookName2    = $_POST['BookName2'];
   //$FacultyName2 = $_POST['FacultyName2'];
   //$quentity2    = $_POST['quentity2'];
   // $facultyID = $_POST['facultyID'];
   // $quentity = $_POST['quentity'];

   // $query_run = mysqli_query($connection, $query);

   $query3 = "insert into tblpurchaseitem (bookID,facultyID,purchasequentity,pid) values ($bookId,$facultyID,$purchasequentity,$maxpid);";
   // echo $queryt."</br>";
   //$queryt2 = " insert into tblitem (BookName,FacultyName,quentity) values ($BookName2,$FacultyName2,$quentity2);";
   //echo $queryt2;
  
   $query_run = mysqli_query($connection, $query3);
   
   if ($query_run) {
        echo "Data Saved"; 
        header('Location: index.php');
   } else {
        echo '<script> alert("Data Not Saved"); </script>';
   }
      }
   }
   }
?>