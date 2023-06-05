<?php
include("../header.php");
include 'connection.inc.php';
include("../config.php");

$country        = "SELECT * FROM tblUniversity";
$university_qry = mysqli_query($conn, $country);
$collegeQry     = "SELECT * FROM tblcollege";
$college_qry    = mysqli_query($conn, $collegeQry);
$faculty        = "SELECT * FROM tblFaculty";
$faculty_qry    = mysqli_query($conn, $faculty);
$book           = "SELECT * FROM tblBook;";
$book_qry       = mysqli_query($conn, $book);
$purchase_Pid   = "SELECT Pid, Pstatus from tblpurchaseorder order by Pid;";
$Pid_qry        = mysqli_query($conn, $purchase_Pid);
$delivery_Dcid  = "SELECT Dcid from tbldeliverychallan order by Dcid;";
$Did_qry        = mysqli_query($conn, $delivery_Dcid);
$dcidquery      = "select max(Dcid) as maxpid from tbldeliverychallan;";
$Dcid_qry       = mysqli_query($conn, $dcidquery);
// $fetch_Pid  = "SELECT BookId, FacultyId, purchasequentity, collegeId FROM tblpurchaseitem,tblpurchaseorder WHERE tblpurchaseorder.Pid = tblpurchaseitem.Pid;";
// $fetch_qry        = mysqli_query($conn, $fetch_Pid);
?>

<style>
    .icon-button {
  background-image: url('icon.png');
  background-size: contain;
  background-repeat: no-repeat;
  width: 32px;
  height: 32px;
}
</style>


<!-- -------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- INSERT DATA IN DELIVERY CHALLAN -->
<!-- -------------------------------------------------------------------------------------------------------------------------------------------------------- -->


<?php
$connection = mysqli_connect("localhost", "root", "Nishant@12345");
$db         = mysqli_select_db($connection, 'dbtechneo');
if (isset($_POST['insertdata'])) {
    // //echo "1";
    $Dcdate = date('Y-m-d', strtotime($_POST['Dcdate']));
    // $Pstatus = $_POST['Pstatus'];
    $collegeID = $_POST['collegeID'];
    $P_id      = $_POST['P_id'];


    $query1    = "INSERT INTO tbldeliverychallan (Dcdate,collegeID,Pid) VALUES ('$Dcdate','$collegeID','$P_id')";
    $query_run = mysqli_query($connection, $query1);
    $query2    = "select max(Dcid) as maxDcid from tbldeliverychallan;";
    // echo $query1;
    $maxquery_run = mysqli_query($connection, $query2);
    while ($row = mysqli_fetch_assoc($maxquery_run)):
        $maxDcid = $row['maxDcid'];
    endwhile;
    // echo $maxpid;
    for ($str = 1; $str <= 150; $str++) {
        // echo "2";
        if (isset($_POST['bookId' . $str])) {
            // echo "3";
            $bookID           = $_POST['bookId' . $str];
            $facultyID        = $_POST['facultyID' . $str];
            $purchasequentity = $_POST['purchasequentity' . $str];
            //$BookName2    = $_POST['BookName2'];
            //$FacultyName2 = $_POST['FacultyName2'];
            //$quentity2    = $_POST['quentity2'];
            // $facultyID = $_POST['facultyID'];
            // $quentity = $_POST['quentity'];

            //   $query_run = mysqli_query($connection, $query);

            $query3 = "insert into tbldeliveryitem (bookID,facultyID,deliveryquentity,Dcid ) values ($bookID,$facultyID,$purchasequentity,$maxDcid);";
            // echo $query;
            // echo $query3;
            // echo $queryt."</br>";
            // $queryt2 = " insert into tblitem (BookName,FacultyName,quentity) values ($BookName2,$FacultyName2,$quentity2);";
            // echo $queryt2;

            $query_run = mysqli_query($connection, $query3);

            // if ($connection->query($query3)) {
            //     echo "Data Saved";
            //     header('Location: index.php');
            // } else {
            //     echo '<script> alert("Data Not Saved"); </script>';
            // }
            if ($query_run) {
                echo "Data Saved";
                header('Location: index.php');
            } else {
                echo '<script> alert("Data Not Saved"); </script>';
            }
        }
    }
}
// there is something in the field, do stuff
// else {
//     // trigger error
// }

?>

<!-- -------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- update previous delivery challan -->
<!-- -------------------------------------------------------------------------------------------------------------------------------------------------------- -->

<?php
$connection = mysqli_connect("localhost", "root", "Nishant@12345");
$db         = mysqli_select_db($connection, 'dbtechneo');
if (isset($_POST['updatedata'])) {
    // //echo "1";
    $Dcid = $_POST['D_id'];

    // $Pstatus = $_POST['Pstatus'];
    $collegeID = $_POST['collegeID'];
    echo $collegeID;
    $Dcdate = date('Y-m-d', strtotime($_POST['Dcdate']));
    //$P_id      = $_POST['P_id'];


    $query1    = "UPDATE tbldeliverychallan SET Dcdate = '$Dcdate', collegeID = $collegeID WHERE Dcid = $Dcid;"; //UPDATE tbldeliverychallan SET Dcdate = '2023-03-10', collegeID = 61 WHERE Dcid = 92;
    $query_run = mysqli_query($connection, $query1);
    // $query2    = "select max(Dcid) as maxDcid from tbldeliverychallan;";
    // echo $query1;
    // $maxquery_run = mysqli_query($connection, $query2);
    // while ($row = mysqli_fetch_assoc($maxquery_run)):
    // $maxDcid = $row['maxDcid'];
    //endwhile;
    // echo $maxpid;
    for ($str = 1; $str <= 150; $str++) {
        // echo "2";

        if (isset($_POST['bookId' . $str])) {
            // echo "3";
            // $ItemdeliveryId  = $_POST['ItemdeliveryId'];    
            $bookID           = $_POST['bookId' . $str];
            $facultyID        = $_POST['facultyID' . $str];
            $purchasequentity = $_POST['purchasequentity' . $str];

            $query2    = "UPDATE tbldeliveryitem SET bookID = $bookID, facultyID = $facultyID, deliveryquentity = $purchasequentity WHERE Dcid = $Dcid;";
            $query_run = mysqli_query($connection, $query2);
            //$BookName2    = $_POST['BookName2'];
            //$FacultyName2 = $_POST['FacultyName2'];
            //$quentity2    = $_POST['quentity2'];
            // $facultyID = $_POST['facultyID'];
            // $quentity = $_POST['quentity'];

            //   $query_run = mysqli_query($connection, $query);


            // echo $query;
            // echo $query3;
            // echo $queryt."</br>";
            // $queryt2 = " insert into tblitem (BookName,FacultyName,quentity) values ($BookName2,$FacultyName2,$quentity2);";
            // echo $queryt2;

            //$query_run = mysqli_query($connection, $query3);

            // if ($connection->query($query3)) {
            //     echo "Data Saved";
            //     header('Location: index.php');
            // } else {
            //     echo '<script> alert("Data Not Saved"); </script>';
            // }
            if ($query_run) {
                echo '<script> alert("Data Updated Successfuly"); </script>';
                //header('Location: index.php');
            } else {
                echo '<script> alert("Data Not Updated"); </script>';
            }
        }
    }
}
// there is something in the field, do stuff
// else {
//     // trigger error
// }

?>


<!-- insert code -->

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // collect value of input field
    if (isset($_POST['D_id'])) {
        $Did = $_POST['D_id'];

        $sql = "SELECT tbldeliveryitem.Dcid,
                        tbldeliverychallan.collegeID,
                        tblcollege.collegeName,
                        tbluniversity.universityID,
                        tbluniversity.universityName,
                        Dcdate,
                        tbldeliveryitem.facultyID,
                        tblfaculty.facultyName,
                        tbldeliveryitem.bookID,
                        tblbook.bookName,
                        tbldeliveryitem.deliveryquentity
                FROM
                        tbldeliveryitem,
                        tbldeliverychallan,
                        tblcollege,
                        tblbook,
                        tblfaculty,
                        tbluniversity
                WHERE  tbldeliveryitem.Dcid = tbldeliverychallan.Dcid
                        AND tbldeliveryitem.bookID = tblbook.bookID
                        AND tbldeliveryitem.facultyID = tblfaculty.facultyID
                        AND tbldeliverychallan.collegeID = tblcollege.collegeID
                        AND tbluniversity.universityID = tblcollege.universityID
                        AND tbldeliveryitem.Dcid = $Did;";
        //$result = $conn->query($sql);
        //$rows    = $result->fetch_assoc();
        $delivery_qry = mysqli_query($conn, $sql);
        /*
        foreach($item_qry as $row) {
        $row['ItempurchaseId'];
        }
        */
    } else {
        //echo $deliveryquentity;
    }
}
?>


<!-- -------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!--  purcharchase order post method -->
<!-- -------------------------------------------------------------------------------------------------------------------------------------------------------- -->



<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // collect value of input field
    if (isset($_POST['P_id'])) {
        $id  = $_POST['P_id'];
        $sql = "SELECT  ItempurchaseId,
                        tblpurchaseitem.bookID, 
                        tblbook.bookname, 
                        tblpurchaseitem.facultyID, 
                        tblfaculty.facultyName, 
                        purchasequentity, 
                        tblpurchaseitem.pid, 
                        tbluniversity.universityID,
                        tbluniversity.universityName,
                        tblcollege.collegeID, 
                        tblcollege.collegeName 
                FROM tblpurchaseitem,
                     tblbook, 
                     tblfaculty,
                     tblpurchaseorder, 
                     tblcollege, 
                     tbluniversity 
                WHERE tblpurchaseitem.bookID = tblbook.bookID
                    AND tblpurchaseitem.facultyID = tblfaculty.facultyID 
                    AND tblpurchaseitem.pid = tblpurchaseorder.Pid 
                    AND tblpurchaseorder.collegeId = tblcollege.collegeID 
                    AND tbluniversity.universityID = tblcollege.universityID 
                    AND tblpurchaseorder.Pid = $id;";
        //$result = $conn->query($sql);
        //$rows    = $result->fetch_assoc();
        $item_qry = mysqli_query($conn, $sql);
        /*
        foreach($item_qry as $row) {
        $row['ItempurchaseId'];
        }
        */
    } else {
        //echo $purchasequentity;
    }
}
?>
<!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- PDF GENERATING CODE -->
<!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->
<?php
// Get the maximum value of Dcid from the tbldeliverychallan table
$sql     = "SELECT MAX(Dcid) as maxDcid FROM tbldeliverychallan";
$result  = mysqli_query($connection, $sql);
$row     = mysqli_fetch_assoc($result);
$maxDcid = $row['maxDcid'];

?>






<!-- PDF GENERATING CODE -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DropDownlist</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    /* option {
        font-weight: normal;
        display: block;
        white-space: nowrap;
        min-height: 1.2em;
        padding: 16px;
    } */
    select {
        width: 100%;
        /* border: 1px solid blue; */
        border-radius: 05px;
        box-shadow: 1px 1px 2px 1px grey;
        padding: 5px 10px 5px 15;
    }

    .footer {
        flex-shrink: 0;
    }

    .btn-danger {
        background-color: red;
        color: white;
        padding: 9px 15px;
        border-radius: 5px;
        border: none;
        font-size: 16px;
        text-decoration: none;
    }
</style>

<body>
    <?php
    // $connection = mysqli_connect("localhost", "root", "Nishant@12345");
    // $db = mysqli_select_db($connection, 'techneodb');
    $query     = "select universityID, universityName from tblUniversity;";
    $query_run = mysqli_query($connection, $query);
    $course    = mysqli_query($connection, "SELECT DISTINCT universityID FROM tblcourse");
    $option    = mysqli_query($connection, "SELECT  universityID, universityName FROM tbluniversity");
    // $edite     = mysqli_query($connection, "SELECT * FROM tblcourse WHERE `tblcourse`.`courseId` = '$id';");
    // $row       = mysqli_fetch_array($edite);
    ?>

    <form action="" method="POST">
        <div class="table-resposive">
            <div class="card-body">
                <table id="datatableid_index" class="table table-hover table-bordered table-light">
                    <tbody>
                        <button class="btn btn-primary" href="/techneo/deliverychallen/index.php">Insert New Record</button><br>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <b> <label> Previous Delivery Challan </label> </b>
                                    <select name="D_id" onchange="this.form.submit()">
                                        <option selected disabled>Select Did</option>
                                        <?php
                                        if ($Did_qry) {
                                            foreach ($Did_qry as $row) {
                                                ?>
                                                <option value="<?php echo $row['Dcid']; ?>" <?php if (isset($_POST['D_id'])) {
                                                       if ($row['Dcid'] == $_POST['D_id'])
                                                           //$pid = $_POST['P_id'];
                                                           echo "selected";
                                                   }
                                                   ?>><?php echo $row['Dcid']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <b> <label> Purchase order no </label> </b>
                                    <select name="P_id" onchange="this.form.submit()">
                                        <option selected disabled>Select Pid</option>
                                        <?php
                                        if ($Pid_qry) {
                                            foreach ($Pid_qry as $row) {
                                                ?>
                                                <option value="<?php echo $row['Pid']; ?>" <?php if (isset($_POST['P_id'])) {
                                                       if ($row['Pid'] == $_POST['P_id'])
                                                           //$pid = $_POST['P_id'];
                                                           echo "selected";
                                                   }
                                                   ?>>
                                                    <?php echo $row['Pid']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <b> <label> Date </label></b>
                                <div class="input-group date" id="datepicker">
                                    <input type="text" name="Dcdate"
                                        value="<?php date_default_timezone_set('Asia/Kolkata');
                                        echo date('d-m-Y', strtotime("today")); ?>"
                                        class="form-control">
                                    <span class="input-group-append">
                                        <span class="input-group-text bg-white">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </span>
                                </div>
                            </td>
                            <td>
                                <?php if (isset($_POST['D_id'])) {
                                    $universityID = "";
                                    if ($delivery_qry) {
                                        //echo "yes";
                                        foreach ($delivery_qry as $rows) {
                                            $universityID = $rows['universityID'];
                                            break;
                                        }
                                    } else {
                                        //echo "no";
                                    }
                                }
                                ?>
                                <?php if (isset($_POST['P_id'])) {
                                    $universityID = "";
                                    if ($item_qry) {
                                        //echo "yes";
                                        foreach ($item_qry as $rows) {
                                            $universityID = $rows['universityID'];
                                            break;
                                        }
                                    } else {
                                        //echo "no";
                                    }
                                }
                                ?>
                                <select class="form-select" id="university" name="university">
                                    <option selected disabled>Select university</option>
                                    <?php while ($row = mysqli_fetch_assoc($university_qry)): ?>
                                        <option value="<?php echo $row['universityID']; ?>" <?php if (isset($_POST['D_id'])) {
                                               if ($row['universityID'] == $universityID)
                                                   //$pid = $_POST['P_id'];
                                                   echo "selected";
                                           }
                                           ?><?php if (isset($_POST['P_id'])) {
                                               if ($row['universityID'] == $universityID)
                                                   //$pid = $_POST['P_id'];
                                                   echo "selected";
                                           }
                                           ?>><?php echo $row['universityName']; ?> </option>
                                    <?php endwhile; ?>
                                </select>
                            </td>
                            <td>
                                <?php if (isset($_POST['D_id'])) {
                                    $collegeID = "";
                                    if ($delivery_qry) {
                                        //echo "yes";
                                        foreach ($delivery_qry as $rows) {
                                            $collegeID = $rows['collegeID'];
                                            break;
                                        }
                                    } else {
                                        //echo "no";
                                    }
                                }
                                ?>
                                <?php if (isset($_POST['P_id'])) {
                                    $collegeID = "";
                                    if ($item_qry) {
                                        //echo "yes";
                                        foreach ($item_qry as $rows) {
                                            $collegeID = $rows['collegeID'];
                                            break;
                                        }
                                    } else {
                                        //echo "no";
                                    }
                                }
                                ?>
                                <select class="form-select" id="college" name='collegeID'>
                                    <option selected disabled>Select college</option>
                                    <?php while ($row = mysqli_fetch_assoc($college_qry)): ?>
                                        <option value="<?php echo $row['collegeID']; ?>" <?php if (isset($_POST['D_id'])) {
                                               if ($row['collegeID'] == $collegeID)
                                                   //$pid = $_POST['P_id'];
                                                   echo "selected";
                                           }
                                           ?><?php if (isset($_POST['P_id'])) {
                                               if ($row['collegeID'] == $collegeID)
                                                   //$pid = $_POST['P_id'];
                                                   echo "selected";
                                           }
                                           ?>>
                                            <?php echo $row['collegeName']; ?> </option>
                                    <?php endwhile; ?>
                                </select>

                            </td><br>
                            <td>
                                <!-- <div class="modal-footer"> -->
                                <!-- <td> <a class='btn btn-primary' name="insertdata" href='insert.php?'>Save</a></td> -->
                                <!-- <button type="button" class="btn btn-primary savebtn"> SAVE </button> -->
                                <!-- <p><input class="btn btn-primary" id="insertdata" type="submit" value="Submit" name="insertdata" /></p> -->
                                <?php
                                if (isset($_POST['D_id'])) {
                                    // If the 'D_id' POST variable exists, show the 'Update' button
                                    echo '<p><input class="btn btn-primary" id="updatedata" type="submit" value="Update" name="updatedata" /></p>';
                                } else if (isset($_POST['P_id'])) {
                                    // If the 'P_id' POST variable exists, show the 'Submit' button
                                    echo '<p><input class="btn btn-primary" id="insertdata" type="submit" value="Submit" name="insertdata" /></p>';
                                }
                                ?>
                                <!-- <button href='pdf.php?id=$maxDcid' type="submit" name="generatePDF">Generate PDF</button>
                                       <button onclick="redirectToPage()">Go to PDF</button> -->
                                <p><a class="fa fa-file-pdf-o btn-danger" href="pdf.php?id=<?php echo $maxDcid; ?>">PDF</a>
                                </p>

                                <!-- </div> -->
                            </td>

                        </tr>
                    </tbody>
                </table>
                <!-- </form>      -->
            </div>
        </div>
        <!-- =========================================================================================================== -->
        <div class="container">
            <div class="jumbotron">
                <div class="card">
                    <ul>
                        <h2> Publication </h2>
                    </ul>
                </div>
                <!-- <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentaddmodal">
                            ADD FACULTY
                        </button>
                    </div>
                </div> -->
                <div class="card">
                    <div class="card-body">
                        <?php
                        $query = "select * from tblpurchaseorder;";
                        // echo $query;
                        $query_run = mysqli_query($connection, $query);
                        ?>
                        <!-- <form action="" method="POST"> -->
                        <table id="datatableid" class="table table-hover table-bordered table-light">
                            <thead>
                                <tr>
                                    <th scope="col"> Sr.No </th>
                                    <th scope="col"> Book Name </th>
                                    <th scope="col"> Faculty Name </th>
                                    <th scope="col"> Quantity </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $str = 1;

                                for ($str = 1; $str <= 150; $str++) {
                                    ?>
                                    <tr data-id='<?php echo $row['id'] ?>'>
                                        <td> <?php echo $str; ?> </td>
                                        <?php
                                        foreach ($book_qry as $key => $get) {
                                            ?> <td>
                                                <?php if (isset($_POST['D_id'])) {
                                                    $bookID = "";
                                                    if ($delivery_qry) {
                                                        //echo "yes";
                                                        $i = 1;
                                                        foreach ($delivery_qry as $rows) {
                                                            if ($i == $str) {
                                                                $bookID = $rows['bookID'];
                                                                break;
                                                            }
                                                            $i++;
                                                        }

                                                    } else {
                                                        //echo "no";
                                                    }
                                                }
                                                ?>
                                                <?php if (isset($_POST['P_id'])) {
                                                    $bookID = "";
                                                    if ($item_qry) {
                                                        //echo "yes";
                                                        $i = 1;
                                                        foreach ($item_qry as $rows) {
                                                            if ($i == $str) {
                                                                $bookID = $rows['bookID'];
                                                                break;
                                                            }
                                                            $i++;
                                                        }

                                                    } else {
                                                        //echo "no";
                                                    }
                                                }
                                                ?>

                                                <select class="form-select" id='bookId<?php echo $str; ?>'
                                                    name='bookId<?php echo $str; ?>'>
                                                    <option selected disabled>Select book</option>
                                                    <?php while ($row = mysqli_fetch_assoc($book_qry)): ?>
                                                        <option value="<?php echo $row['bookID']; ?>" <?php if (isset($_POST['D_id'])) {
                                                               if ($row['bookID'] == $bookID)
                                                                   //$pid = $_POST['P_id'];
                                                                   echo "selected";
                                                           }
                                                           ?><?php if (isset($_POST['P_id'])) {
                                                               if ($row['bookID'] == $bookID)
                                                                   //$pid = $_POST['P_id'];
                                                                   echo "selected";
                                                           }
                                                           ?>> <?php echo $row['bookName']; ?>
                                                        </option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </td>
                                            <?php
                                        }
                                        foreach ($faculty_qry as $key => $get) {
                                            ?>
                                            <td>
                                                <?php if (isset($_POST['D_id'])) {
                                                    $facultyID = "";
                                                    if ($delivery_qry) {
                                                        //echo "yes";
                                                        $i = 1;
                                                        foreach ($delivery_qry as $rows) {
                                                            if ($i == $str) {
                                                                $facultyID = $rows['facultyID'];
                                                                break;
                                                            }
                                                            $i++;
                                                        }
                                                    } else {
                                                        //echo "no";
                                                    }
                                                }
                                                ?>
                                                <?php if (isset($_POST['P_id'])) {
                                                    $facultyID = "";
                                                    if ($item_qry) {
                                                        //echo "yes";
                                                        $i = 1;
                                                        foreach ($item_qry as $rows) {
                                                            if ($i == $str) {
                                                                $facultyID = $rows['facultyID'];
                                                                break;
                                                            }
                                                            $i++;
                                                        }
                                                    } else {
                                                        //echo "no";
                                                    }
                                                }
                                                ?>
                                                <select class="form-select" id="facultyID<?php echo $str; ?>"
                                                    name="facultyID<?php echo $str; ?>">
                                                    <option selected disabled>Select faculty</option>
                                                    <?php while ($row = mysqli_fetch_assoc($faculty_qry)): ?>
                                                        <option value="<?php echo $row['facultyID']; ?>" <?php if (isset($_POST['D_id'])) {
                                                               if ($row['facultyID'] == $facultyID)
                                                                   //$pid = $_POST['P_id'];
                                                                   echo "selected";
                                                           }
                                                           ?><?php if (isset($_POST['P_id'])) {
                                                               if ($row['facultyID'] == $facultyID)
                                                                   //$pid = $_POST['P_id'];
                                                                   echo "selected";
                                                           }
                                                           ?>> <?php echo $row['facultyName']; ?>
                                                        </option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </td>
                                        <?php } ?>
                                        <td>
                                            <div class="form-group">
                                                <?php $purchasequentity = "1";
                                                if (isset($_POST['D_id'])) {
                                                    //echo "1";
                                                    if ($delivery_qry) {
                                                        $rowcount = mysqli_num_rows($delivery_qry);
                                                        //echo "yes";
                                                        $i = 1;
                                                        foreach ($delivery_qry as $rows) {
                                                            if ($i == $str) {
                                                                //echo $rows['deliveryquentity'];
                                                                $purchasequentity = $rows['deliveryquentity'];
                                                                break;
                                                            }
                                                            $i++;
                                                            if ($i > $rowcount) {
                                                                $purchasequentity = "1";
                                                            }
                                                        }
                                                    } else {
                                                        echo "no";
                                                    }
                                                }
                                                ?>
                                                <?php
                                                if (isset($_POST['D_id'])) {
                                                } else {
                                                    //echo "3";
                                                    $purchasequentity = "1";
                                                }
                                                if (isset($_POST['P_id'])) {
                                                    //echo "1";
                                                    if ($item_qry) {
                                                        $rowcount = mysqli_num_rows($item_qry);
                                                        //echo "yes";
                                                        $i = 1;
                                                        foreach ($item_qry as $rows) {
                                                            if ($i == $str) {
                                                                $purchasequentity = $rows['purchasequentity'];
                                                                break;
                                                            }
                                                            $i++;
                                                            if ($i > $rowcount) {
                                                                $purchasequentity = "1";
                                                            }
                                                        }
                                                    } else {
                                                        //echo "no";
                                                    }
                                                }
                                                ?>
                                                <input type="text" id="purchasequentity<?php echo $str; ?>"
                                                    name="purchasequentity<?php echo $str; ?>"
                                                    value="<?php echo $purchasequentity; ?>" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                    //$str++;
                                }
                                ?>
                            </tbody>
                        </table>
    </form>
    </div>
    <!-- <div class="w-100 d-flex pposition-relative justify-content-center">
                        <button class="btn btn-flat btn-primary" id="add_member" type="button" onclick="addItem();">Add New
                            Data</button>
                    </div> -->
    <!-- <td><input type="button" value="Add" id="nameselbtn" onclick="javascript:addrow();" /></td> -->
    <div class="w-100 d-flex pposition-relative justify-content-center">
        <a class="btn btn-flat btn-primary" id="insertRow">Add new data</a>
    </div>
    </div>
    </div>
    </div>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        // University college
        $('#university').on('change', function () {
            var universityId = this.value;
            // console.log(universityId);
            $.ajax({
                url: 'ajax/college.php',
                type: "POST",
                data: {
                    university_data: universityId
                },
                success: function (result) {
                    $('#college').html(result);
                    console.log(result);
                }
            })
        });
    </script>

    <script>
        function fetchpid() {
            var id = document.get("P_id").value;
            // alert("id");
            $.ajax({
                url: "fetchpid.php",
                method: "post",
                data: {
                    x: id
                },
                dataType: "json",
                success: function (data) {
                    // console.log(data);
                    // document.getElementById("collegeId").value = data.collegeId;
                    // document.getElementById("book").value = data.book;
                    // document.getElementById("FacultyName").value = data.FacultyName;
                    // document.getElementById("purchasequentity").value = data.purchasequentity;

                }
            })
        };
    </script>

    <script>
        $(document).ready(function () {
            var i = 1;
            $('#insertRow').click(function () {
                var newRowHtml = '<tr id="row' + i + '"><td>' + (i + 150) + '</td>';

                // add the book dropdown column
                newRowHtml += '<td><select class="form-select" id="book' + i + '" name="book' + i + '"><option selected disabled>Select book</option>';
                <?php foreach ($book_qry as $key => $get) { ?>
                    newRowHtml += '<?php while ($row = mysqli_fetch_assoc($book_qry)): ?><option value="<?php echo $row['bookID']; ?>"><?php echo $row['bookName']; ?></option><?php endwhile; ?>';
                <?php } ?>
                newRowHtml += '</select></td>';

                // add the faculty dropdown column
                newRowHtml += '<td><select class="form-select" id="faculty' + i + '" name="faculty' + i + '"><option selected disabled>Select faculty</option>';
                <?php foreach ($faculty_qry as $key => $get) { ?>
                    newRowHtml += '<?php while ($row = mysqli_fetch_assoc($faculty_qry)): ?><option value="<?php echo $row['facultyID']; ?>"><?php echo $row['facultyName']; ?></option><?php endwhile; ?>';
                <?php } ?>
                newRowHtml += '</select></td>';

                // add the purchase quantity input column
                newRowHtml += '<td><div class="form-group"><input type="text" name="purchasequentity" id="purchasequentity' + i + '" value="1" class="form-control"></div></td></tr>';

                // append the new row to the DataTable
                $('#datatableid').append(newRowHtml);

                i++;
            });

            $(document).on('click', '.btn_remove', function () {
                var button_id = $(this).attr("id");
                $('#row' + button_id).remove();
            });
        });

    </script>


    <script type="text/javascript">
        // $(function() {
        //     $('#datepicker').datepicker();
        // });
    </script>
    <script type="text/javascript">
        //   $('.input-group.date').datepicker({
        //        todayBtn: "linked",
        //        language: "it",
        //        autoclose: true,
        //        todayHighlight: true,
        //        format: 'dd-mm-yyyy',
        //   });
    </script>


    <script type="text/javascript">
        $('.input-group.date').datepicker({

            todayBtn: "linked",
            language: "it",
            autoclose: true,
            todayHighlight: true,
            format: 'dd-mm-yyyy',
        });
    </script>


    <script>
        // function redirectToPDF() {
        // // Retrieve the maximum ID value from the database using an AJAX request
        // var xhttp = new XMLHttpRequest();
        // xhttp.onreadystatechange = function() {
        //     if (this.readyState == 4 && this.status == 200) {
        //     var maxId = this.responseText;
        //     // Redirect the user to the desired page with the maximum ID value as a parameter
        //     window.location.href = "pdf.php?id=" + $maxDcid;
        //     }
        // };
        // xhttp.open("GET", "get_max_id.php", true);
        // xhttp.send();
        // }
    </script>

    <script>
        function redirectToPage() {
            window.location.href = "pdf.php"; // Replace this with your desired URL
        }
    </script>




    <?php
    include("../footer.php");
    ?>
</body>

</html>