<?php include("../config.php");

if (isset($_POST['deletedata'])) {
    $collegeId = $_POST['delete_college'];
    try {
        $query     = "DELETE FROM tblCollege WHERE collegeId=$collegeId";
        $query_run = mysqli_query($connection, $query);
        echo '<script> alert("Data Deleted"); </script>';
        header("Location:index.php");
    } catch (mysqli_sql_exception $e) {
        $error_message = $e->getMessage();
        if (strpos($error_message, 'foreign key constraint') !== false) {
            echo '<script> alert("Cannot delete college because it has related data in another table."); </script>';
            header("index.php");
        } else {
            echo '<script> alert("Error deleting college: ' . $error_message . '"); </script>';
        }
    }
} else {
    echo '<script> alert("Data Not Deleted"); </script>';
}
?>