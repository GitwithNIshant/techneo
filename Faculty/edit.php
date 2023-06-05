<?php
include "connection.php";
include("../header.php");
include("../config.php");


$id              = "";
$facultyName      = "";
$facultyEmail = "";
$facultyMobileNo = "";
$facultyEmail = "";


$error   = "";
$success = "";



if ($_SERVER["REQUEST_METHOD"] == 'GET') {
     if (!isset($_GET['editid'])) {
          header("location:index.php");
          exit;
     }
     $id     = $_GET['editid'];
     $sql    = "select * from tblfaculty where facultyID=$id";
     $result = $conn->query($sql);
     $row    = $result->fetch_assoc();
     while (!$row) {
          header("location: index.php");
          exit;
     }
     $facultyName      = $row["facultyName"];
     $facultyMobileNo = $row["facultyMobileNo"];
     $facultyEmail = $row["facultyEmail"];
     
     //     $phone=$row["phone"];

} else {
     $id              = $_GET['editid'];
     $facultyName     = $_POST["facultyName"];
     $facultyMobileNo = $_POST["facultyMobileNo"];
     $facultyEmail    = $_POST["facultyEmail"];
     $collegeID       = $_POST["collegeID"];
     //     $phone=$_POST["phone"];

     $sql    = "UPDATE tblfaculty SET facultyName = '$facultyName', collegeID = '$collegeID', facultyMobileNo = '$facultyMobileNo', facultyEmail = '$facultyEmail' WHERE facultyID = '$id';";
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
     
     $query     = "select collegeID, collegeName from tblcollege;";
     $query_run = mysqli_query($connection, $query);

     $faculty = mysqli_query($connection, "SELECT DISTINCT collegeID FROM tblcollege");

     $option = mysqli_query($connection, "SELECT  collegeID, collegeName FROM tblcollege");

     $edite = mysqli_query($connection, "SELECT * FROM tblfaculty WHERE `tblfaculty`.`facultyID` = '$id';");
     $row   = mysqli_fetch_array($edite);
     ?>


     <div class="col-lg-6 m-auto">

          <form method="POST">

               <br><br>
               <div class="card-body">
                    <div class="card-body">
                         <input type="hidden" name="facultyID" value="<?php echo $facultyID; ?>" class="form-control">
                         <br>

                         <div class="form-group">
                              <label>faculty Name</label>
                              <input type="text" name="facultyName" value="<?php echo $facultyName; ?>"
                                   class="form-control"> <br>
                         </div>

                         <div class="form-group">
                              <label> faculty MobileNo </label>
                              <input type="text" name="facultyMobileNo" value="<?php echo $facultyMobileNo; ?>"
                                   class="form-control">
                         </div>
                         <br>

                         <div class="form-group">
                              <label> faculty Email </label>
                              <input type="text" name="facultyEmail" value="<?php echo $facultyEmail; ?>"
                                   class="form-control">
                         </div>
                         <br>

                         <div class="form-group">
                              <label> College Name </label>
                              <select name="collegeID" id="collegeID">
                                   <?php
                                   if ($query_run) {
                                        foreach ($query_run as $rows) {
                                             ?>
                                             <option value="<?php echo $rows['collegeID']; ?>" <?php if ($row['collegeID'] == $rows['collegeID'])
                                                     echo 'selected="selected"'; ?>><?php echo $rows['collegeName']; ?>
                                             </option>
                                        <?php
                                        }
                                   }
                                   ?>
                              </select>
                         </div>

                         <button class="btn btn-success" type="submit" name="submit"> update </button>
                         <a class="btn btn-danger" type="submit" name="cancel" href="index.php"> Cancel </a>

                    </div>
               </div>
          </form>
     </div>
</body>

</html>