<?php
include "connection.php";
include("../header.php");
include("../config.php");


$id              = "";
$courseName      = "";
$courseShortCode = "";
//   $phone="";

$error   = "";
$success = "";



if ($_SERVER["REQUEST_METHOD"] == 'GET') {
     if (!isset($_GET['editid'])) {
          header("location:index.php");
          exit;
     }
     $id     = $_GET['editid'];
     $sql    = "SELECT courseName, courseShortCode, universityID from tblcourse where courseId=$id";
     $result = $conn->query($sql);
     $row    = $result->fetch_assoc();
     while (!$row) {
          header("location: index.php");
          exit;
     }
     $courseName      = $row["courseName"];
     $courseShortCode = $row["courseShortCode"];


} else {
     $id              = $_GET['editid'];
     $courseName      = $_POST["courseName"];
     $courseShortCode = $_POST["courseShortCode"];
     $universityID = $_POST["universityID"];


     $sql    = "UPDATE tblcourse SET courseName='$courseName', universityID='$universityID', courseShortCode='$courseShortCode' WHERE courseId='$id'";
     $result = $conn->query($sql);
     echo '<script> alert("Data Updated"); </script>';
     header("Location:index.php");
} 

?>

<!DOCTYPE html>
<html>

<head>


     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>

     <?php
     // $connection = mysqli_connect("localhost", "root", "Nishant@12345");
     // $db = mysqli_select_db($connection, 'techneodb');
     
     $query     = "SELECT universityID, universityName FROM tblUniversity;";
     $query_run = mysqli_query($connection, $query);

     $course = mysqli_query($connection, "SELECT DISTINCT universityID FROM tblcourse");

     $option = mysqli_query($connection, "SELECT  universityID, universityName FROM tbluniversity");

     // $edite     = mysqli_query($connection, "SELECT * FROM tblcourse WHERE `tblcourse`.`courseId` = '$id';");
     // $row       = mysqli_fetch_array($edite);
     ?>


     <div class="col-lg-6 m-auto">

          <form method="POST">

               <br><br>
               <div class="card-body">
                    <div class="card-body">
                         <input type="hidden" name="courseId" value="<?php echo $courseId; ?>" class="form-control"> <br>

                         <div class="form-group">
                              <label>Course Name</label>
                              <input type="text" name="courseName" value="<?php echo $courseName; ?>" class="form-control"> <br>
                         </div>
                         
                         <div class="form-group">
                              <label> course ShortCode </label>
                              <input type="text" name="courseShortCode" value="<?php echo $courseShortCode; ?>"class="form-control">
                         </div>                    
                         <br>
                    
                         <div class="form-group">
                              <label> University Name </label>
                              <SELECT name="universityID" id="universitysID">
                                   <?php
                                   if ($query_run) {
                                        foreach ($query_run as $rows) {
                                             ?>
                                             <option value="<?php echo $rows['universityID']; ?>" <?php if ($row['universityID'] == $rows['universityID'])
                                                            echo 'selected="selected"'; ?>><?php echo $rows['universityName']; ?>
                                             </option>
                                             <?php   
                                        }
                                   }
                                   ?> 
                              </SELECT>
                         </div>
                         
                         <button class="btn btn-success" type="submit" name="updatedata"> update </button>
                         <a class="btn btn-danger" type="submit" name="cancel" href="index.php"> Cancel </a>

                    </div>
               </div>     
          </form>
     </div>
</body>

</html>