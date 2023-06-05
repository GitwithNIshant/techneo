<?php
include "connection.php";
include("../header.php");
include("../config.php");


$id              = "";
$collegeName      = "";
$DTECode = "";
$DTERegieon = "";
$District = "";
$Taluka = "";
$Pincode = "";
$CollegeEmail = ""; 
$CollegeContact = "";
$Poc = "";
$OfficeNumber = "";
$PersonalNumber = "";
//   $phone="";

$error   = "";
$success = "";



if ($_SERVER["REQUEST_METHOD"] == 'GET') {
     if (!isset($_GET['editid'])) {
          header("location:index.php");
          exit;
     }
     $id     = $_GET['editid'];
     $sql    = "select * from tblcollege where collegeID=$id";
     $result = $conn->query($sql);
     $row    = $result->fetch_assoc();
     while (!$row) {
          header("location: index.php");
          exit;
     }
     $collegeName      = $row["collegeName"];
     $collegeShortCode = $row["collegeShortCode"];
     $DTECode = $row["DTECode"];
     $DTERegieon = $row["DTERegieon"];
     $District = $row["District"];
     $Taluka = $row["Taluka"];
     $Pincode = $row["Pincode"];
     $CollegeEmail = $row["CollegeEmail"];
     $CollegeContact = $row["CollegeContact"];
     $Poc = $row["Poc"];
     $OfficeNumber = $row["OfficeNumber"];
     $PersonalNumber = $row["PersonalNumber"];
 

} 
else {

     $id               = $_GET['editid'];
     $collegeName      = $_POST['collegeName'];
     $collegeShortCode = $_POST['collegeShortCode'];
     $universityID     = $_POST['universityID'];
     $DTECode          = $_POST['DTECode'];
     $DTERegieon       = $_POST['DTERegieon'];
     $District         = $_POST['District'];
     $Taluka           = $_POST['Taluka'];
     $Pincode          = $_POST['Pincode'];
     $CollegeEmail     = $_POST['CollegeEmail'];
     $CollegeContact   = $_POST['CollegeContact'];
     $Poc              = $_POST['Poc'];
     $OfficeNumber     = $_POST['OfficeNumber'];
     $PersonalNumber   = $_POST['PersonalNumber'];


     $sql    = "UPDATE tblCollege SET collegeName = '$collegeName', 
     collegeShortCode = '$collegeShortCode', DTECode = '$DTECode', DTERegieon = '$DTERegieon', 
     District = '$District', Taluka = '$Taluka', Pincode = '$Pincode', CollegeEmail = '$CollegeEmail', CollegeContact = '$CollegeContact', 
     Poc = '$Poc', OfficeNumber = '$OfficeNumber', 
     PersonalNumber = '$PersonalNumber', universityID = $universityID WHERE collegeID = $id;";
     $result = $conn->query($sql);
     echo "Data Updated";
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
     
     $query     = "select universityID, universityName from tblUniversity;";
     $query_run = mysqli_query($connection, $query);

     $course = mysqli_query($connection, "SELECT DISTINCT universityID FROM tblcollege");

     $option = mysqli_query($connection, "SELECT  universityID, universityName FROM tbluniversity");

     $edite = mysqli_query($connection, "SELECT * FROM tblcollege WHERE `tblcollege`.`collegeID` = '$id';");
     $row   = mysqli_fetch_array($edite);
     ?>


     <div class="col-lg-6 m-auto">

          <form method="POST">

               <br><br>
               <div class="card-body">
                    <div class="card-body">



                         <input type="hidden" name="courseId" value="<?php echo $collegeId; ?>" class="form-control">
                         <br>

                         <div class="form-group">
                              <label>college Name</label>
                              <input type="text" name="collegeName" value="<?php echo $collegeName; ?>"
                                   class="form-control"> <br>
                         </div>

                         <div class="form-group">
                              <label> collegeShortCode </label>
                              <input type="text" name="collegeShortCode" value="<?php echo $collegeShortCode; ?>"
                                   class="form-control">
                         </div>
                         <br>
                          <div class="form-group">
                              <label> University Name </label>
                              <select name="universityID" id="universitysID">
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
                              </select>
                         </div>
                         <br>
                         <div class="form-group">
                              <label> DTECode </label>
                              <input type="text" name="DTECode" value="<?php echo $DTECode; ?>"
                                   class="form-control">
                         </div>
                         <br>
                         <div class="form-group">
                              <label> DTERegieon </label>
                              <input type="text" name="DTERegieon" value="<?php echo $DTERegieon; ?>"
                                   class="form-control">
                         </div>
                         <br>
                         <div class="form-group">
                              <label> District </label>
                              <input type="text" name="District" value="<?php echo $District; ?>"
                                   class="form-control">
                         </div>
                         <br>
                         <div class="form-group">
                              <label> Taluka </label>
                              <input type="text" name="Taluka" value="<?php echo $Taluka; ?>"
                                   class="form-control">
                         </div>
                         <br>
                         <div class="form-group">
                              <label> Pincode </label>
                              <input type="text" name="Pincode" value="<?php echo $Pincode; ?>"
                                   class="form-control">
                         </div>
                         <br>
                         <div class="form-group">
                              <label> College Email </label>
                              <input type="text" name="CollegeEmail" value="<?php echo $CollegeEmail; ?>"
                                   class="form-control">
                         </div>
                         <br>
                         <div class="form-group">
                              <label> College Contact </label>
                              <input type="text" name="CollegeContact" value="<?php echo $CollegeContact; ?>"
                                   class="form-control">
                         </div>
                         <br>
                         <div class="form-group">
                              <label> Poc </label>
                              <input type="text" name="Poc" value="<?php echo $Poc; ?>"
                                   class="form-control">
                         </div>
                         <br>
                         <div class="form-group">
                              <label> Office Number </label>
                              <input type="text" name="OfficeNumber" value="<?php echo $OfficeNumber; ?>"
                                   class="form-control">
                         </div>
                         <br>
                         <div class="form-group">
                              <label> Personal Number </label>
                              <input type="text" name="PersonalNumber" value="<?php echo $PersonalNumber; ?>"
                                   class="form-control">
                         </div>
                         <br>

                      
                         <div class="form-group">
                         <button class="btn btn-success" type="submit" name="submit"> update </button>
                         <a class="btn btn-danger" type="submit" name="cancel" href="index.php"> Cancel </a>
                         </div>

                    </div>
               </div>
          </form>
     </div>
</body>

</html>