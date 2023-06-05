<?php

include("../export_data.php");
include("../header.php");
include("../config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> TechNeoBooks</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
</head>
<style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table tr td,
    table tr th {
        border: 1px solid black;
        padding: 25px;
    }
     select{
        width: 100%;
        /* border: 1px solid blue; */
        border-radius: 05px;
        box-shadow: 1px 1px 2px 1px grey;
        padding: 5px 15px 10px 15;
    }
    
    table {
        counter-reset: tableCount;
    }

    .counterCell:before {
        content: counter(tableCount);
        counter-increment: tableCount;
    }
</style>

<body>
        <div class="card">
                <div class="card-body">
          
                    <input type="button" class="btn btn-danger" onclick="generateTable()" value="Generate PDF" />

                    <input type="button" class="btn btn-primary" onclick="PrintTable()" value="PRINT" />
                    
                    <!-- <a href="../pdf.php" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> View PDF</a> -->
                    <!-- <button type="submit" id="export_data" name='export_data' value="Export to excel"
                        class="btn btn-success">Export to excel </button> -->
                    <button class="btn btn-success" onclick="exceller()">EXCEL</button>
                </div>
            </div>

     <div class="table-responsive">
          <div class="card-body">

               <?php


               $query     = "SELECT facultyName, facultyMobileNo, tblcollege.universityID, tbluniversity.universityName, tbluniversity.universityID, tblcollege.collegeID, tblcollege.collegeName, bookName, courseName,tbldeliveryitem.bookID, tbldeliveryitem.facultyID, GraduationYear, Semister from tbldeliveryitem, tblcollege, tblfaculty, tbluniversity, tblbook, tblcourse where tblcollege.collegeID = tblfaculty.collegeID and tbldeliveryitem.bookID = tblbook.bookID and tblbook.courseId = tblcourse.courseId and tbldeliveryitem.facultyID = tblfaculty.facultyID and tblcollege.universityID = tbluniversity.universityID;";
               $query_run = mysqli_query($connection, $query);
               ?>
               <table id="datatableid" class="table table-hover table-bordered table-light">
                    <thead>
                         <tr style="height:1px;">
                              <th scope="col"> Sr.No </th>
                              <th scope="col"> faculty name </th>
                              <th scope="col"> faculty Mobile No </th>
                              <th scope="col"> faculty university </th>
                              <th scope="col"> faculty college </th>
                              <th scope="col"> book name </th>
                              <th scope="col"> Graduation Year </th>
                              <th scope="col"> Semister </th>

                         </tr>
                    </thead>
                       <h5 style="color: #007bff; font-size: 24px; font-weight: bold; text-align: center;">Faculty Wise Report</h5><br>

                    <tbody>
                         <?php
                         $i = 1;
                         if ($query_run) {

                              foreach ($query_run as $row) {

                                   ?>

                                   <tr>


                                        <td class="counterCell"> </td>
                                        <td><?php echo $row['facultyName']; ?></td>
                                        <td><?php echo $row['facultyMobileNo']; ?></td>
                                        <td><?php echo $row['universityName']; ?></td>
                                        <td><?php echo $row['collegeName']; ?></td>
                                        <td><?php echo $row['bookName']; ?></td>
                                        <td><?php echo $row['GraduationYear']; ?></td>
                                        <td><?php echo $row['Semister']; ?></td>


                                        <!-- <td><button type="button" class="btn btn-info viewbtn"> VIEW </button></td>
                                                       <td><button type="button" class="btn btn-success editbtn"> EDIT </button></td>
                                                       <td><button type="button" class="btn btn-danger deletebtn"> DELETE </button></td> -->

                                   </tr>
                                   <?php
                                   $i++;

                              }
                         } else {
                              echo "No Record Found";
                         }
                         ?>
                    </tbody>

               </table>

          </div>
     </div>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>

    

    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>
    <script src="assets/js/jspdf-autotable-custom.js"></script>


    
        <script>
            $(document).ready(function () {
                $('#datatableid').DataTable({
                    scrollY: '100%',
                    scrollCollapse: true,
                    paging: true,
                    "pagingType": "full_numbers",
                    "lengthMenu": [
                        [50, 100, 150, -1],
                        [50, 100, 150, "All"]
                    ],
                    responsive: true,
                    language: {
                        search: "_INPUT_",
                        searchPlaceholder: "Search Your Data",
                    }
                });
            });
        </script>

</body>

</html>