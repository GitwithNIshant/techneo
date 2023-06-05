<?php
include("../config.php");
$deleteid = $_GET['deleteid'];

try {
    $sql      = "DELETE FROM tblFaculty WHERE facultyId=$deleteid";
    $query_run = mysqli_query($connection, $sql);
    echo '<script> alert("Data Deleted"); </script>';
    header("Location:index.php");
}
catch (mysqli_sql_exception $e) {
        $error_message = $e->getMessage();
        if (strpos($error_message, 'foreign key constraint') !== false) {
            echo '<script> alert("Cannot delete college because it has related data in another table."); </script>';
            header("index.php");
        } else {
            echo '<script> alert("Error deleting college: ' . $error_message . '"); </script>';
        }
    }
mysqli_close($connection);
?>