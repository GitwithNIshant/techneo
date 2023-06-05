<?php
include "connection.php";
include("../header.php");
include("../config.php");


$id              = "";
$bookName      = "";
$bookCode = "";
$AcademicYear = "";
$GraduationYear = "";
$Semister = "";
$BookPrice = "";
$BookShortCode = "";

//   $phone="";

$error   = "";
$success = "";



if ($_SERVER["REQUEST_METHOD"] == 'GET') {
     if (!isset($_GET['editid'])) {
          header("location:crud100/index.php");
          exit;
     }
     $id     = $_GET['editid'];
     $sql    = "SELECT bookId, bookName,BookShortCode, bookCode, tblcourse.courseId, courseName, AcademicYear, GraduationYear, Semister, BookPrice, tbluniversity.universityID, universityName   FROM tblbook, tblcourse, tbluniversity where tblbook.courseId = tblcourse.courseId and tbluniversity.universityID = tblcourse.universityID and bookId=$id;";
     $result = $conn->query($sql);
     $row    = $result->fetch_assoc();
     while (!$row) {
          header("location: crud100/index.php");
          exit;
     }
     $bookName      = $row["bookName"];
     $bookCode = $row["bookCode"];
     $AcademicYear = $row["AcademicYear"];
     $universityID = $row["universityID"];
     $courseId = $row["courseId"];
     $GraduationYear = $row["GraduationYear"];
     $Semister = $row["Semister"];
     $BookPrice = $row["BookPrice"];
     $BookShortCode = $row["BookShortCode"];
  

} else {
     $id             = $_GET["editid"];
     $bookName       = $_POST["bookName"];
     $bookCode       = $_POST["bookCode"];
     $BookShortCode       = $_POST["BookShortCode"];
     $AcademicYear   = $_POST["AcademicYear"];
     $GraduationYear = $_POST["GraduationYear"];
    // $universityID   = $_POST["universityID"];
     $courseId       = $_POST["courseId"];
     $Semister       = $_POST["Semister"];
     $BookPrice      = $_POST["BookPrice"];
     

     $sql    = "UPDATE tblbook SET bookName='$bookName', BookShortCode='$BookShortCode', bookCode='$bookCode', AcademicYear='$AcademicYear', GraduationYear='$GraduationYear', courseId=$courseId, Semister='$Semister', BookPrice='$BookPrice' WHERE bookId='$id'";
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
     
     $query     = "select universityID, universityName from tblUniversity;";
     $query_run = mysqli_query($connection, $query);
     
     $query     = "select courseId, courseName from tblcourse;";
     $course_query = mysqli_query($connection, $query);
     
     $course = mysqli_query($connection, "SELECT DISTINCT universityID FROM tblcourse");

     $option = mysqli_query($connection, "SELECT  universityID, universityName FROM tbluniversity");

     // $edite = mysqli_query($connection, "SELECT tbluniversity.universityID, universityName FROM tblbook, tblcourse, tbluniversity where tblbook.courseId = tblcourse.courseId and tbluniversity.universityID = tblcourse.universityID;");
     // $row   = mysqli_fetch_array($edite);
     ?>


     <div class="col-lg-6 m-auto">

          <form method="POST">

               <br><br>
               <div class="card-body">
                    <div class="card-body">
                         <input type="hidden" name="courseId" value="<?php echo $courseId; ?>" class="form-control">
                         <br>

                         <div class="form-group">
                              <label>book Name</label>
                              <input type="text" name="bookName" value="<?php echo $bookName; ?>"
                                   class="form-control"> <br>
                         </div>
                         <br>

                         <div class="form-group">
                              <label> book Code </label>
                              <input type="text" name="bookCode" value="<?php echo $bookCode; ?>"
                                   class="form-control">
                         </div>
                         <br>

                         <div class="form-group">
                              <label> Book ShortCode </label>
                              <input type="text" name="BookShortCode" value="<?php echo $BookShortCode; ?>"
                                   class="form-control">
                         </div>
                         <br>
                         <div class="form-group">
                              <label> Academic Year </label>
                              <input type="text" name="AcademicYear" value="<?php echo $AcademicYear; ?>"
                                   class="form-control">
                         </div>
                         <br>
                        <div class="form-group">
                          <label><b>Graduation-Year</b></label>
                            <select name="GraduationYear" id="GraduationYear">
                                <option selected disabled>Select Year</option>
                                <option value="First Year" <?php if($GraduationYear == 'First Year') {echo "selected";} ?>>First Year</option>
                                <option value="Second Year" <?php if($GraduationYear == 'Second Year') {echo "selected";} ?>>Second Year</option>
                                <option value="Third Year" <?php if($GraduationYear == 'Third Year') {echo "selected";} ?>>Third Year</option>
                                <option value="Fourth Year" <?php if($GraduationYear == 'Fourth Year') {echo "selected";} ?>>Fourth Year</option>
                                <option value="Fifth Year" <?php if($GraduationYear == 'Fifth Year') {echo "selected";} ?>>Fifth Year</option>
                            </select>
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
                              <label> Course Name </label>
                              <select name="courseId" id="courseId">
                                   <?php
                                   if ($query_run) {
                                        foreach ($course_query as $rows) {
                                             ?>
                                             <option value="<?php echo $rows['courseId']; ?>" <?php if ($row['courseId'] == $rows['courseId'])
                                                     echo 'selected="selected"'; ?>><?php echo $rows['courseName']; ?>
                                             </option>
                                        <?php
                                        }
                                   }
                                   ?>
                              </select>
                         </div>

                         <div class="form-group">
                            <label><b>Semister</b></label>
                            <select name="Semister" id="Semister">
                                <option selected disabled>Select Semister</option>
                                <option value="I" <?php if ($Semister == 'I') {
                                     echo "selected";
                                } ?>> I </option>
                                <option value="II" <?php if ($Semister == 'II') {
                                     echo "selected";
                                } ?>> II </option>
                                <option value="III" <?php if ($Semister == 'III') {
                                     echo "selected";
                                } ?>> III </option>
                                <option value="IV" <?php if ($Semister == 'IV') {
                                     echo "selected";
                                } ?>> IV </option>
                                <option value="V" <?php if ($Semister == 'V') {
                                     echo "selected";
                                } ?>> V </option>
                                <option value="VI" <?php if ($Semister == 'VI') {
                                     echo "selected";
                                } ?>> VI </option>
                                <option value="VII" <?php if ($Semister == 'VII') {
                                     echo "selected";
                                } ?>> VII </option>
                                <option value="VIII" <?php if ($Semister == 'VIII') {
                                     echo "selected";
                                } ?>> VIII </option>
                                <option value="IX" <?php if ($Semister == 'IX') {
                                     echo "selected";
                                } ?>> IX </option>
                                <option value="X" <?php if ($Semister == 'X') {
                                     echo "selected";
                                } ?>>X</option>
                            </select>
                        </div>
                         <br>


                         <div class="form-group">
                              <label> Book Price </label>
                              <input type="text" name="BookPrice" value="<?php echo $BookPrice; ?>"
                                   class="form-control">
                         </div>
                         <br>
                       
                      

                        

                         <button class="btn btn-success" type="submit" name="updatedata"> update </button>
                         <a class="btn btn-danger" type="submit" name="cancel" href="index.php"> Cancel </a>

                    </div>
               </div>
          </form>
     </div>
</body>

</html>