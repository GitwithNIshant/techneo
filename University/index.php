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
    <link rel="shortcut icon" type="img/png" href="img/techneo.png"/>
</head>

<style>
    select{
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
                    <h5 class="modal-title" id="exampleModalLabel">Add University</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="insertcode.php" method="POST">

                    <div class="modal-body">
                        <!-- <div class="form-group">
                            <label> universityID </label>
                            <input type="text" name="Uid" class="form-control" placeholder="Enter universityID">
                        </div> -->

                        <div class="form-group">
                            <label> University Name </label>
                            <input type="text" name="universityName" class="form-control"
                                placeholder="Enter University Name"> <br>
                        </div>

                        <div class="form-group">
                            <label> University Shortcode </label>
                            <input type="text" name="universityShortCode" class="form-control"
                                placeholder="Enter University Shortcode">
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

    <!-- EDIT POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit University Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="updatecode.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="edit_id" id="edit_id">


                        <div class="form-group">
                            <label> University Name </label>
                            <input type="text" name="universityName" id="universityName" class="form-control"
                                placeholder="Enter universityName">
                        </div>
                        <div class="form-group">
                            <label> University Shortcode </label>
                            <input type="text" name="universityShortCode" id="universityShortCode" class="form-control"
                                placeholder="Enter universityShortCode">
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

    <!-- DELETE POP UP FORM (Bootstrap MODAL) -->

    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Delete University Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="deletecode.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="delete_id" id="delete_id">
                        <h4> Do you want to Delete this Data ??</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                        <button type="submit" name="deletedata" class="btn btn-danger"> Yes !! Delete it. </button>
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
                    <h5 class="modal-title" id="exampleModalLabel"> View University Data </h5>
                    <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
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
                        <!-- <button type="button" class="btn btn-primary">Close</button> -->
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
                    <form action="" method="post">
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#studentaddmodal">
                            ADD UNIVERSITY
                        </button>
                        <input type="button" class="btn btn-danger" onclick="generateTable()" value="Generate PDF" />

                        <input type="button" class="btn btn-primary" onclick="printTable()" value="PRINT" />
                       
                        <!-- <a href="../pdf.php" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> View PDF</a> -->
                        <!-- <button type="submit" id="export_data" name='export_data' value="Export to excel"
                            class="btn btn-success">Export to excel </button> -->
                            <button class="btn btn-success" onclick="generateXLSX()">EXCEL</button>

                        <!-- <input type="button" id="btnExport" value="Export" onclick="Export()" /> -->
                    </form>
                </div>

                <div class="card">
                    <div class="card-body">

                        <?php


                        $query     = "SELECT universityID, universityName, universityShortCode FROM tbluniversity";
                        $query_run = mysqli_query($connection, $query);
                        ?>
                        <table id="datatableid" class="table table-hover table-bordered table-light">
                            <thead>
                                <tr style="height:1px;">
                                    <th class="counterCell" scope="col"> Sr.No </th>
                                    <th scope="col" style="display:none;"> University Id </th>
                                    <th scope="col"> University Name </th>
                                    <th scope="col"> University Shortcode </th>
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

                                                
                                            <td class="counterCell"> </td>
                                            <td class="reg_id" style="display:none;"><?php echo $row['universityID']; ?></td>
                                            <td><?php echo $row['universityName']; ?></td>
                                            <td><?php echo $row['universityShortCode']; ?></td>


                                            <td><button type="button" class="btn btn-info viewbtn"> VIEW </button></td>
                                            <td><button type="button" class="btn btn-success editbtn"> EDIT </button></td>
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
<!-- 
            </div>
        </div> -->


        <!-- CALL ALL CDN  -->
         



      

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
                        'universityID': reg_id,
                    },
                    success: function (response) {
                        //console.log(reg_id);  
                        $('.registration_viewing_data').html(response);
                        $('#registerVIEWModal').modal('show');
                    }
                });

            });
        </script>
        <!-- 
    <script type="text/javascript">
        $(document).ready(function () {

            $('#datatableid').DataTable();
                
            
        });
    </script> -->



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


        <script>
            $(document).ready(function () {

                //$('body').on('click', '.editbtn', function () { only this line change

                $('body').on('click', '.editbtn', function () {

                    $('#editmodal').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function () {
                        return $(this).text();
                    }).get();

                    // console.log(data);

                    $('#edit_id').val(data[1]);
                    $('#universityName').val(data[2]);
                    $('#universityShortCode').val(data[3]);
                    console.log("data[0] = " + data[0]);  //"data[0] = " + data[0]
                });
            }); 
        </script>





     




    <script>
        $(document).ready(function () {

            $('body').on('click', '.deletebtn', function () {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[1]);

            });
        });
    </script>
        
<script>

function generateTable() {
  var doc = new jsPDF('p', 'pt', 'letter');
  var y = 20;
  doc.setLineWidth(2);
  doc.text(200, y = y + 30, "University Information");

  var counter = 1; // variable to keep track of the counter

  doc.autoTable({
    html: '#datatableid',
    startY: 70,
    theme: 'grid',
    columnStyles: {
      0: {
        tableWidth: 100,
      },
      1: {
        tableWidth: 100,
      },
      2: {
        tableWidth: 100,
      }
    },
    columns: [
      {
        header: 'No.',
        dataKey: 'counterCell', // assign a dataKey to the column
        width: 30,
        align: 'right',
        // add a didParseCell function to increment the counter
        didParseCell: function (data) {
          data.cell.text(data.row.index + 1);
        }
      },
      {
        header: 'courseytrtyuName',
        dataKey: 'courseName'
      },
      {
        header: 'courseShortCode',
        dataKey: 'courseShortCode'
      }
    ],
    // add a createdCell function to assign a unique value to the counterCell property of each row
    createdCell: function (cell, data) {
      if (cell.column.dataKey === 'counterCell') {
        cell.raw = counter++; // assign a unique value to the counterCell property of each row
      }
    }
  });

  var pdfBlob = doc.output('blob');
  var pdfUrl = URL.createObjectURL(pdfBlob);
  window.open(pdfUrl);
}

</script>

<script>
  function printTable() {
  var table = document.getElementById("datatableid");
  var win = window.open();
  win.document.write("<html><head><title>Table</title></head><body>");
  
  // create a new table with the auto-increment column and the first two data columns
  var newTable = "<table><thead><tr>";
  for (var i = 0; i < 3; i++) {
    newTable += "<th>" + table.rows[0].cells[i].innerHTML + "</th>";
  }
  newTable += "</tr></thead><tbody>";
  for (var i = 1; i < table.rows.length; i++) {
    newTable += "<tr>";
    for (var j = 0; j < 3; j++) {
      newTable += "<td>" + table.rows[i].cells[j].innerHTML + "</td>";
    }
    newTable += "</tr>";
  }
  newTable += "</tbody></table>";
  
  win.document.write(newTable);
  win.document.write("</body></html>");
  win.print();
  win.close();
}


</script>





    <script>
    // function exceller() {
    //     var uri = 'data:application/vnd.ms-excel;base64,',
    //     template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>',
    //     base64 = function(s) {
    //         return window.btoa(unescape(encodeURIComponent(s)))
    //     },
    //     format = function(s, c) {
    //         return s.replace(/{(\w+)}/g, function(m, p) {
    //         return c[p];
    //         })
    //     }
    //     var toExcel = document.getElementById("datatableid").innerHTML;
    //     var ctx = {
    //     worksheet: name || '',
    //     table: toExcel
    //     };
    //     var link = document.createElement("a");
    //     link.download = "techneo.xls";
    //     link.href = uri + base64(format(template, ctx))
    //     link.click();
    // }
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
        rowData["University Name"] = table.rows[i].cells[2].innerHTML;
        rowData["University ShortCode"] = table.rows[i].cells[3].innerHTML;
        // rowData["facultyEmail"] = table.rows[i].cells[4].innerHTML;
        // rowData["collegeName"] = table.rows[i].cells[5].innerHTML;
        // rowData["collegeName"] = table.rows[i].cells[4].innerHTML;
        
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