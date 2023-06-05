<?php
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

<style>
    select {
        width: 100%;
        /* border: 1px solid blue; */
        border-radius: 05px;
        box-shadow: 1px 1px 2px 1px grey;
        padding: 5px 15px 10px 15;
    }

    select {
        width: 80%;
        border: 1px solid blue;
        border-radius: 05px;
        box-shadow: 1px 1px 2px 1px grey;
        padding: 10px 15px 10px 15;
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
                    <h5 class="modal-title" id="exampleModalLabel">Add College</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php

                $query     = "select universityID, universityName from tblUniversity;";
                $query_run = mysqli_query($connection, $query);
                ?>

                <form action="insertcode.php" method="POST">
                    <div class="modal-body">
                        <!-- <div class="form-group">
                            <label> UniversityId </label>
                            <input type="text" name="Uid" class="form-control" placeholder="Enter UniversityId">
                        </div> -->
                        <div class="form-group">
                            <label> College Name </label>
                            <input type="text" name="collegeName" id="collegeName" class="form-control"
                                placeholder="Enter College Name"> <br>
                        </div>
                        <div class="form-group">
                            <label> college ShortCode </label>
                            <input type="text" name="collegeShortCode" id="collegeShortCode" class="form-control"
                                placeholder="Enter collegeShortCode"> <br>
                        </div>
                        <div class="form-group">
                            <label> University Name </label>
                            <!-- <input type="text" name="Universityshortcode" class="form-control"
                                placeholder="Enter University Shortcode"> -->
                            <select name="universityID" id="universityID">
                                <option selected disabled>Select university</option>
                                <?php
                                if ($query_run) {
                                    foreach ($query_run as $row) {
                                        ?>
                                        <option value="<?php echo $row['universityID']; ?>"><?php echo $row['universityName']; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label> DTE Code </label>
                            <td><input type="text" id="DTECode" name="DTECode" class="form-control"
                                    placeholder="Enter DTE Code"></td>
                        </div>
                        <div class="form-group">
                            <label> DTE Region </label>
                            <td><input type="text" name="DTERegieon" id="DTERegieon" class="form-control"
                                    placeholder="Enter DTE Region"></td>
                        </div>
                        <div class="form-group">
                            <label> District </label>
                            <td><input type="text" name="District" id="District" class="form-control"
                                    placeholder="Enter District"></td>
                        </div>
                        <div class="form-group">
                            <label> Taluka </label>
                            <td><input type="text" name="Taluka" id="Taluka" class="form-control"
                                    placeholder="Enter Taluka"></td>
                        </div>
                        <div class="form-group">
                            <label> college Pincode</label>
                            <td><input type="text" name="Pincode" id="Pincode" class="form-control"
                                    placeholder="Enter Pincode"></td>
                        </div>
                        <div class="form-group">
                            <label> college Email-ID </label>
                            <td><input type="text" name="CollegeEmail" id="CollegeEmail" class="form-control"
                                    placeholder="Enter College Email-ID"></td>
                        </div>
                        <div class="form-group">
                            <label> college contact no </label>
                            <td><input type="text" name="CollegeContact" id="CollegeContact" class="form-control"
                                    placeholder="Enter College Contact"></td>
                        </div>
                        <div class="form-group">
                            <label> POC </label>
                            <td><input type="text" name="Poc" id="Poc" class="form-control" placeholder="POC"></td>
                        </div>
                        <div class="form-group">
                            <label> OfficeNumber </label>
                            <td><input type="text" name="OfficeNumber" id="OfficeNumber" class="form-control"
                                    placeholder="OfficeNumber"></td>
                        </div>
                        <div class="form-group">
                            <label> PersonalNumber </label>
                            <td><input type="text" name="PersonalNumber" id="PersonalNumber" class="form-control"
                                    placeholder="PersonalNumber"></td>
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



    <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->





    <!--College DELETE POP UP FORM (Bootstrap MODAL) -->

    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Delete College Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="deletecode.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="delete_college" id="delete_college">
                        <h4> Do you want to Delete this Data ??</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                        <button type="submit" name="deletedata" class="btn btn-primary"> Yes !! Delete it. </button>
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
                    <h5 class="modal-title" id="exampleModalLabel"> College Data </h5>
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
                ADD COLLEGE
            </button>
            <input type="button" class="btn btn-danger" onclick="generateTable()" value="Generate PDF" />

            <input type="button" class="btn btn-primary" onclick="PrintTable()" value="PRINT" />

            <!-- <a href="../pdf.php" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> View PDF</a> -->
            <!-- <button type="submit" id="export_data" name='export_data' value="Export to excel"
                        class="btn btn-success">Export to excel </button> -->
            <button class="btn btn-success" onclick="generateXLSX()">EXCEL</button>
        </div>
    </div>

    <div class="table-responsive">
        <div class="card-body">

            <?php


            $query     = "select collegeId, collegeName, collegeShortCode, universityName, DTECode, DTERegieon, District, Taluka, Pincode, CollegeEmail, CollegeContact, Poc, OfficeNumber, PersonalNumber from tblCollege, tbluniversity where tblcollege.universityID = tbluniversity.universityID;";
            $query_run = mysqli_query($connection, $query);
            ?>
            <table id="datatableid" class="table table-hover table-bordered table-light">
                <thead>
                    <tr>
                        <th scope="col">Sr.no</th>
                        <th scope="col" style="display:none;">college id</th>
                        <th scope="col">college Name</th>
                        <th scope="col"> college ShortCode </th>
                        <th scope="col">University Name</th>
                        <th scope="col">DTE Code</th>
                        <th scope="col">DTE region</th>
                        <th scope="col">District</th>
                        <th scope="col">Taluka</th>
                        <th scope="col">Pincode</th>
                        <th scope="col">College Email</th>
                        <th scope="col">College Contact</th>
                        <th scope="col">POC</th>
                        <th scope="col">Office Number</th>
                        <th scope="col">Personal Number</th>
                        <th scope="col">VIEW</th>
                        <th scope="col">EDIT</th>
                        <th scope="col">DELETE</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $i = 1;
                    if ($query_run) {
                        foreach ($query_run as $row) {

                            ?>

                            <tr>

                                <td class="counterCell"> </td>
                                <td class="reg_id" style="display:none;"><?php echo $row['collegeId']; ?></td>
                                <td><?php echo $row['collegeName']; ?></td>
                                <td><?php echo $row['collegeShortCode']; ?></td>
                                <td class="uni_id_"><?php echo $row['universityName']; ?></td>
                                <td><?php echo $row['DTECode']; ?></td>
                                <td><?php echo $row['DTERegieon']; ?></td>
                                <td><?php echo $row['District']; ?></td>
                                <td><?php echo $row['Taluka']; ?></td>
                                <td><?php echo $row['Pincode']; ?></td>
                                <td><?php echo $row['CollegeEmail']; ?></td>
                                <td><?php echo $row['CollegeContact']; ?></td>
                                <td><?php echo $row['Poc']; ?></td>
                                <td><?php echo $row['OfficeNumber']; ?></td>
                                <td><?php echo $row['PersonalNumber']; ?></td>
                                <td><button type="button" class="btn btn-info viewbtn"> VIEW </button></td>
                                <!-- <td><button type="button" class="btn btn-success editbtn"> EDIT </button></td> -->
                                <td> <a class='btn btn-success' name="editdata"
                                        href='edit.php?editid=<?php echo $row["collegeId"]; ?>'>Edit</a></td>
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
                    'collegeId': reg_id,
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

    <!-- <script>
        $(document).ready(function () {
            $('#datatableid_').DataTable({
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





    <script>
        $(document).ready(function () {

            $('body').on('click', '.deletebtn', function () {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_college').val(data[0]);

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
                        { header: 'courseId', dataKey: 'courseId' },
                        { header: 'courseName', dataKey: 'courseName' },
                        { header: 'courseShortCode', dataKey: 'courseShortCode' },
                        { header: 'universityName', dataKey: 'universityName' },
                        { header: 'courseId', dataKey: 'courseId' },
                        { header: 'courseName', dataKey: 'courseName' },
                        { header: 'courseShortCode', dataKey: 'courseShortCode' },
                        { header: 'universityName', dataKey: 'universityName' },
                        { header: 'courseId', dataKey: 'courseId' },
                        { header: 'courseName', dataKey: 'courseName' },
                        { header: 'courseShortCode', dataKey: 'courseShortCode' },
                        { header: 'universityName', dataKey: 'universityName' },
                        { header: 'courseShortCode', dataKey: 'courseShortCode' },
                        { header: 'universityName', dataKey: 'universityName' },

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
                        { header: 'courseId', dataKey: 'courseId' },
                        { header: 'courseName', dataKey: 'courseName' },
                        { header: 'courseShortCode', dataKey: 'courseShortCode' },
                        { header: 'universityName', dataKey: 'universityName' },
                        { header: 'courseId', dataKey: 'courseId' },
                        { header: 'courseName', dataKey: 'courseName' },
                        { header: 'courseShortCode', dataKey: 'courseShortCode' },
                        { header: 'universityName', dataKey: 'universityName' },
                        { header: 'courseId', dataKey: 'courseId' },
                        { header: 'courseName', dataKey: 'courseName' },
                        { header: 'courseShortCode', dataKey: 'courseShortCode' },
                        { header: 'universityName', dataKey: 'universityName' },
                        { header: 'courseShortCode', dataKey: 'courseShortCode' },
                        { header: 'universityName', dataKey: 'universityName' },

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
                rowData["college Name"] = table.rows[i].cells[2].innerHTML;
                rowData["college ShortCode"] = table.rows[i].cells[3].innerHTML;
                rowData["University Name"] = table.rows[i].cells[4].innerHTML;
                rowData["DTE Code"] = table.rows[i].cells[5].innerHTML;
                rowData["DTE Regieon"] = table.rows[i].cells[6].innerHTML;
                rowData["District"] = table.rows[i].cells[7].innerHTML;
                rowData["Taluka"] = table.rows[i].cells[8].innerHTML;
                rowData["Pincode"] = table.rows[i].cells[9].innerHTML;
                rowData["College Email"] = table.rows[i].cells[10].innerHTML;
                rowData["College Contact"] = table.rows[i].cells[11].innerHTML;
                rowData["POC"] = table.rows[i].cells[12].innerHTML;
                rowData["Office Number"] = table.rows[i].cells[13].innerHTML;
                rowData["Personel Number"] = table.rows[i].cells[14].innerHTML;

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