<?php
// include_once("db_connect.php");
// include("export_data.php");
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

    <!-- Modal -->
    <div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Book</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
            

                $query     = "select courseId, courseName from tblcourse;";
                $query_run = mysqli_query($connection, $query);

                $uniquery     = "select universityID, universityName from tblUniversity;";
                $uniquery_run = mysqli_query($connection, $uniquery);
                ?>

                <form action="insertcode.php" method="POST">

                    <div class="modal-body">
                                    <!-- <div class="form-group">
                            <label> UniversityId </label>
                            <input type="text" name="Uid" class="form-control" placeholder="Enter UniversityId">
                        </div> -->

                        <div class="form-group">
                            <label> <b> book Name </b> </label>
                            <input type="text" id="bookName" name="bookName" class="form-control"
                                placeholder="Enter book Name">
                        </div>

                        <div class="form-group">
                            <label> <b> book Code </b> </label>
                            <input type="text" id="bookCode" name="bookCode" class="form-control"
                                placeholder="Enter book Code">
                        </div>
                          
                        <div class="form-group">
                            <label> <b> Book Short Code </b> </label><br>
                            <input type="text" id="BookShortCode" name="BookShortCode" class="form-control"
                                placeholder="Enter Book ShortCode">
                        </div>

                        <div class="form-group">
                            <label> <b> Academic-Year </b> </label><br>
                            <input type="text" id="AcademicYear" name="AcademicYear" class="form-control"
                                placeholder="Enter Academic-Year">
                        </div>
                        <div class="form-group">
                          <label><b>Graduation-Year</b></label>
                            <select name="GraduationYear" id="GraduationYear">
                                <option selected disabled>Select Year</option>
                                <option value="First Year">First Year</option>
                                <option value="Second Year">Second Year</option>
                                <option value="Third Year">Third Year</option>
                                <option value="Fourth Year">Fourth Year</option>
                                <option value="Fifth Year">Fifth Year</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label><b> University Name </b></label><br>
                            <!-- <input type="text" name="Universityshortcode" class="form-control"
                                placeholder="Enter University Shortcode"> -->
                            <select name="universityID" id="universityID">
                                <option selected disabled>Select university</option>
                                <?php
                                if ($uniquery_run) {
                                    foreach ($uniquery_run as $row) {
                                        ?>
                                        <option value="<?php echo $row['universityID']; ?>"><?php echo $row['universityName']; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label> <b>Course Name </b></label><br>
                            <select name="courseId" id="courseId">
                                <option selected disabled>Select Course Name</option>
                                <?php
                                if ($query_run) {
                                    foreach ($query_run as $row) {
                                        ?>
                                        <option value="<?php echo $row['courseId']; ?>"><?php echo $row['courseName']; ?>
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
                                <option value="I"> I </option>
                                <option value="II"> II </option>
                                <option value="III"> III </option>
                                <option value="IV"> IV </option>
                                <option value="V"> V </option>
                                <option value="VI"> VI </option>
                                <option value="VII"> VII </option>
                                <option value="VIII"> VIII </option>
                                <option value="IX"> IX </option>
                                <option value="X">X</option>
                            </select>
                        </div>
                        </br>
                        <div class="form-group">
                            <label> <b> Book Price </b> </label><br>
                            <input type="text" id="BookPrice" name="BookPrice" class="form-control"
                                placeholder="Enter Book Price">
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="insertdata" class="btn btn-primary">Save Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- BOOK EDIT POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit Book Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="updatecode.php" method="POST">
                    <?php
                
                    
                    $query     = "select courseId, courseName from tblcourse;";
                    $query_run = mysqli_query($connection, $query);
                    ?>

                    <div class="modal-body">
                        <input type="hidden" name="edit_book" id="edit_book">
                        <div class="form-group">
                            <label> book Name </label>
                            <input type="text" name="bookName" id="bookName" class="form-control"
                                placeholder="Enter book Name">
                        </div>
                        <div class="form-group">
                            <label> book ShortCode </label>
                            <input type="text" name="bookCode" id="bookCode" class="form-control"
                                placeholder="Enter bookCode">
                        </div>
                        <div class="form-group">
                            <label> branch Name </label>
                            <select name="courseId" id="courseId">
                                <?php
                                if ($query_run) {
                                    foreach ($query_run as $row) {
                                        ?>
                                        <option value="<?php echo $row['courseId']; ?>"><?php echo $row['courseName']; ?>
                                        </option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- VIEW POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="registerVIEWModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> View Book Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="deletecode.php" method="POST">

                    <div class="modal-body">

                        <div class="registration_viewing_data">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    </div>
                </form>

            </div>
        </div>
    </div>




    <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Delete Book Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="deletecode.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="delete_book" id="delete_book">
                        <h4> Do you want to Delete Data ??</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                        <button type="submit" name="deletedata" class="btn btn-primary"> Yes !! Delete it. </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- 
    <div class="container">
        <div class="jumbotron"> -->
            <div class="card">
                <ul>
                    <h2> Publication </h2>
                </ul>
            </div>
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentaddmodal">
                        ADD BOOK
                    </button>
                    <input type="button" class="btn btn-danger" onclick="generateTable()" value="Generate PDF" />

                    <input type="button" class="btn btn-primary" onclick="PrintTable()" value="PRINT" />
                       
                    <!-- <a href="../pdf.php" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> View PDF</a> -->
                    <!-- <button type="submit" id="export_data" name='export_data' value="Export to excel"
                        class="btn btn-success">Export to excel </button> -->
                        <button class="btn btn-success" onclick="generateXLSX()">EXCEL</button>

                    <!-- <input type="button" id="btnExport" value="Export" onclick="Export()" /> -->
                </div>
            </div>

            <div class="table-responsive">
                <div class="card-body">
                    <?php
                  

                    $query     = "SELECT bookId, bookName, bookCode, courseName, AcademicYear, GraduationYear, Semister, BookPrice, BookShortCode, tbluniversity.universityID, universityName   FROM tblbook, tblcourse, tbluniversity where tblbook.courseId = tblcourse.courseId and tbluniversity.universityID = tblcourse.universityID;";
                    $query_run = mysqli_query($connection, $query);
                    ?>
                    <table id="datatableid" class="table table-hover table-bordered table-light">
                        <thead>
                            <tr>
                                <th scope="col"> Sr.No </th>
                                <th scope="col" style="display:none;">  book id </th>
                                <th scope="col"> book Name </th>
                                <th scope="col"> book Code </th>
                                <th scope="col"> book Short Code </th>
                                <th scope="col"> Academic Year </th>
                                <th scope="col">University Name</th>
                                <th scope="col">Course Name</th>
                                <th scope="col">Graduation-Year</th>
                                <th scope="col">Semister</th>
                                <th scope="col">Book Price</th>
                                <th scope="col"> VIEW </th>
                                <th scope="col"> EDIT </th>
                                <th scope="col"> DELETE </th>
                            </tr>
                        </thead>



                        <tbody>
                            <?php
                            $i = 1;
                            if ($query_run) {

                                foreach ($query_run as $row) {
                                    ?>


                                    <tr>
                                        <td class="counterCell"></td>
                                        <td class="reg_id" style="display:none;"><?php echo $row['bookId']; ?></td>
                                        <td><?php echo $row['bookName']; ?></td>
                                        <td><?php echo $row['bookCode']; ?></td>
                                        <td><?php echo $row['BookShortCode']; ?></td>
                                        <td><?php echo $row['AcademicYear']; ?></td>
                                        <td><?php echo $row['universityName']; ?></td>
                                        <td class="uni_id_"><?php echo $row['courseName']; ?></td>
                                        <td><?php echo $row['GraduationYear']; ?></td>
                                        <td><?php echo $row['Semister']; ?></td>
                                        <td><?php echo $row['BookPrice']; ?></td>
                                        <td><button type="button" class="btn btn-info viewbtn"> VIEW </button></td>
                                        <!-- <td><button type="button" class="btn btn-success editbtn"> EDIT </button></td> -->
                                        <td> <a class='btn btn-success' name="editdata" href='edit.php?editid=<?php echo $row["bookId"]; ?>'>Edit</a></td>  
                                        <td><button type="button" class="btn btn-danger deletebtn"> DELETE </button></td>
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
        <!-- </div>
    </div> -->


        <!-- CALL ALL CDN  -->
        <script src="../js/dependencies.js"></script>



    <script>
        $('.viewbtn').click(function (e) {
            e.preventDefault();
            var reg_id = $(this).closest('tr').find('.reg_id').text();
            console.log(reg_id);
            $.ajax({
                type: "POST",
                url: "code.php",
                data: {
                    'checking_viewbtn': true,
                    'bookId': reg_id,
                },
                success: function (response) {
                    //console.log(reg_id);  
                    $('.registration_viewing_data').html(response);
                    $('#registerVIEWModal').modal('show');
                }
            });
        });
    </script>



    <script>
        $(document).ready(function () {
            $('#datatableid').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [50, 75, 100, -1],
                    [50, 75, 100, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search Your Data",
                }
            });

        });
    </script>


    <!-- <script>
$(document).ready(function () {
    $('#datatableid').DataTable({
        scrollY: '200px',
        scrollCollapse: true,
        paging: true,
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search Your Data",
        }
    });
});
</script> -->

    <!-- 
    <script>
        $(document).ready(function () {
            $('body').on('click', '.editbtn', function () {
                $('#editmodal').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#edit_book').val(data[0]);
                $('#bookName').val(data[1]);
                $('#bookCode').val(data[2]);
                $('#courseId').val(data[3]);
                //console.log("data[0] = " + data[0]);  //"data[0] = " + data[0]
            });
        }); 
    </script> -->
    
    <script>
        $(document).ready(function () {
            $('body').on('click', '.deletebtn', function () {
                $('#deletemodal').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#delete_book').val(data[0]);
            });
        });
    </script>

            
    <script>
            function generateTable() {
            var doc = new jsPDF('p', 'pt', 'letter');
            var y = 20;
            doc.setLineWidth(2);
            doc.text(200, y = y + 30, "University Incformation");
            doc.autoTable({
                html: '#datatableid',
                startY: 70,
                theme: 'grid',
                columnStyles: {
                    0: {
                        halign: 'right',
                        tableWidth: 100,
                        },
                    1: {
                        tableWidth: 100,
                    },
                    2: {
                        halign: 'right',
                        tableWidth: 100,
                    },
                    3: {
                        halign: 'right',
                        tableWidth: 100,
                    }
                },
                columns: 
                [
                {header: 'courseId', dataKey: 'courseId'},
                {header: 'courseName', dataKey: 'courseName'},
                {header: 'courseShortCode', dataKey: 'courseShortCode'},
                {header: 'universityName', dataKey: 'universityName'},
                
                ],

            })
            doc.save('auto_table_pdf');
        }
    </script>

    <script>
        function PrintTable() {
        var doc = new jsPDF('p', 'pt', 'letter');
        var y = 20;
        doc.setLineWidth(2);
        doc.text(200, y = y + 30, "Univesity Incformation");
        doc.autoTable({
            html: '#datatableid',
            startY: 70,
            theme: 'grid',
            columnStyles: {
                0: {
                    halign: 'right',
                    tableWidth: 100,
                    },
                1: {
                    tableWidth: 100,
                },
                2: {
                    halign: 'right',
                    tableWidth: 100,
                },
                3: {
                    halign: 'right',
                    tableWidth: 100,
                }
            },
            columns: 
            [
            {header: 'courseId', dataKey: 'courseId'},
            {header: 'courseName', dataKey: 'courseName'},
            {header: 'courseShortCode', dataKey: 'courseShortCode'},
            {header: 'universityName', dataKey: 'universityName'},
            
            ],

        })

        doc.autoPrint();
        doc.save('techneo');
    }
    </script> 


    
    <script>
        function generateXLSX() {
            // select the HTML table by its id
            var table = document.getElementById("datatableid");

            // create an array to store the table data
            var data = [];

            // loop through each row of the table, starting from the second row
            for (var i = 1; i < table.rows.length; i++) {
                // create an object to store the data of each row
                var rowData = {};

                // add the first five columns to the rowData object
                rowData["Sr.No"] = i;
                rowData["Book Name"] = table.rows[i].cells[2].innerHTML;
                rowData["Book Code"] = table.rows[i].cells[3].innerHTML;
                rowData["Book ShortCode"] = table.rows[i].cells[4].innerHTML;
                rowData["Academic Year"] = table.rows[i].cells[5].innerHTML;
                rowData["University Name"] = table.rows[i].cells[6].innerHTML;
                rowData["Course Name"] = table.rows[i].cells[7].innerHTML;
                rowData["Graduation Year"] = table.rows[i].cells[8].innerHTML;
                rowData["Semister"] = table.rows[i].cells[9].innerHTML;
                rowData["Book Price"] = table.rows[i].cells[10].innerHTML;
                

                // push the rowData object to the data array
                data.push(rowData);
            }

            // create a new workbook and worksheet
            var wb = XLSX.utils.book_new();
            var ws = XLSX.utils.json_to_sheet(data);

            // add the worksheet to the workbook
            XLSX.utils.book_append_sheet(wb, ws, "Sheet1");

            // save the workbook as an xlsx file with the correct file extension
            XLSX.writeFile(wb, "table_data.xls", { bookType: 'xls', type: 'binary' });
        }

    </script>
    


<?php
include("../footer.php");
?>

</body>

</html>