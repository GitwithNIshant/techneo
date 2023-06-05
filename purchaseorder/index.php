<?php
include 'connection.inc.php';
$country        = "SELECT * FROM tblUniversity";
$university_qry = mysqli_query($conn, $country);
$faculty        = "SELECT * FROM tblFaculty";
$faculty_qry    = mysqli_query($conn, $faculty);
$book           = "SELECT * FROM tblBook;";
$book_qry       = mysqli_query($conn, $book);
$indexquery2    = "select max(pid) as maxpid from tblpurchaseorder;";
$iquery_run     = mysqli_query($conn, $indexquery2);

include("../header.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Demo Purchase</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
</head>
<style>
     .footer {
          flex-shrink: 0;
     }
     select{
        width: 100%;
        /* border: 1px solid blue; */
        border-radius: 05px;
        box-shadow: 1px 1px 2px 1px grey;
        padding: 5px 10px 5px 15;
    }
</style>

<body>

     <form action="insert.php" method="POST">
               <div class="card">
                    <div class="card-body">
                              <table id="datatableid_index" class="table table-hover table-bordered table-light">

                                   <tbody>

                                        <tr> <br>
                                             <td>
                                                  <!-- <label class="container" for="pno">P.O.No: <b>1<b></label> -->
                                                  <!-- <label type="text" id="pno" name="pno"><br><br> -->
                                                  <div class="container">
                                                  <b><label for="">Purchase Order Id</label><b><br><br>
                                                  <?php
                                                  $i = 1;
                                                  
                                                  while ($row = mysqli_fetch_assoc($iquery_run)):
                                                       $maxpid = $row['maxpid'];
                                                  endwhile;
                                                   echo $maxpid + $i; 


                                                  ?>
                                                  </div>     
                                             </td>
                                             <td>
                                                  <!-- <section class="container">
                                                       <label for="">Date</label>
                                                       <input type="date" value="" id="Pdate" name="Pdate" class="form-control" />
                                                  </section> -->
                                                  <!-- <input type="text" id="Pdate" disabled /> -->

                                                  
                                            <b> <label >  Date</label> </b>
                                             <div class="input-group date" id="datepicker">
                                                  <input type="text" name="Pdate" value="<?php date_default_timezone_set('Asia/Kolkata');
                                                  echo date('d-m-Y', strtotime("today")); ?>" class="form-control">
                                                  <span class="input-group-append">
                                                       <span class="input-group-text bg-white">
                                                            <i class="fa fa-calendar"></i>
                                                       </span>
                                                  </span>
                                             </div>
                                        

                                             </td>
                                             <td>
                                                  <div class="container">
                                                       <select class="form-select" id="university" name="university">
                                                            <option selected disabled>Select university</option>
                                                            <?php while ($row = mysqli_fetch_assoc($university_qry)): ?>
                                                                 <option value="<?php echo $row['universityID']; ?>"> <?php echo $row['universityName']; ?> </option>
                                                            <?php endwhile; ?>
                                                       </select>
                                                  </div>
                                             </td>
                                             <td>
                                                  <select class="form-select" id="collegeID" name='collegeID'>
                                                       <option selected disabled>Select college</option>
                                                  </select>

                                             </td><br>
                                             <!-- <td>
                                                  <div class="container">
                                                       <label><b>Status</b></label>
                                                       <select name="Pstatus" id="Pstatus">
                                                            <option selected disabled>Select Status</option>
                                                            <option value="compete">Complete</option>
                                                            <option value="Semi Complete">Semi Complete</option>
                                                       </select>
                                                  </div>
                                             </td> -->
                                             <td>
                                                  <div class="modal-footer">
                                                       <button type="submit" name="insertdata" class="btn btn-primary">Save
                                                            Data</button>
                                                  </div>
                                             </td>



                                        </tr>

                                   </tbody>
                              </table>
                         <!-- </form> -->
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
                                   <!-- <form action="insert.php" method="POST"> -->
                                        <!-- <td>
                                             <div class="modal-footer">
                                                  <button type="submit" name="insertdata" class="btn btn-primary">Save
                                                       Data</button>
                                             </div>
                                        </td> -->

                                        <?php
                                        // $connection = mysqli_connect("localhost", "root", "Nishant@12345");
                                        // $db         = mysqli_select_db($connection, 'dbtechneo');
                                        
                                        // $query     = "SELECT * FROM tblBook;";
                                        // $query_run = mysqli_query($connection, $query);
                                        
                                        ?>
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
                                                                      <select class="form-select" id='bookId<?php echo $str; ?>' name='bookId<?php echo $str; ?>'>
                                                                                     <option selected disabled>Select book</option>
                                                                           <?php while ($row = mysqli_fetch_assoc($book_qry)): ?>
                                                                                <option value="<?php echo $row['bookID']; ?>"> <?php echo $row['bookName']; ?>
                                                                                </option>
                                                                           <?php endwhile; ?>
                                                                      </select>
                                                                 </td>
                                                                 <?php
                                                            }
                                                            foreach ($faculty_qry as $key => $get) {
                                                                 ?>
                                                                 <td>
                                                                      <select class="form-select" id="facultyID<?php echo $str; ?>" name="facultyID<?php echo $str; ?>">
                                                                                     <option selected disabled>Select faculty</option>
                                                                           <?php while ($row = mysqli_fetch_assoc($faculty_qry)): ?>
                                                                                <option value="<?php echo $row['facultyID']; ?>"> <?php echo $row['facultyName']; ?>
                                                                                </option>
                                                                           <?php endwhile; ?>
                                                                      </select>
                                                                 </td>
                                                            <?php } ?>
                                                            <td>
                                                                 <div class="form-group">
                                                                      <input type="text" id="purchasequentity<?php echo $str; ?>" name="purchasequentity<?php echo $str; ?>" value="1" class="form-control">
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
                                   <button class="btn btn-flat btn-primary" id="add_member" type="button" onclick="addItem();">Add
                                        New
                                        Data</button>
                              </div> -->
                             <div class="w-100 d-flex pposition-relative justify-content-center">
                              <a class="btn btn-flat btn-primary" id="insertRow">Add new data</a>
                              </div>
                              <!-- <td><input type="button" value="Add" id="nameselbtn" onclick="javascript:addrow();" /></td> -->

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
     <script
          src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
     <script type="text/javascript" src="bootstrap-datepicker.de.js" charset="UTF-8"></script>




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
                         $('#collegeID').html(result);
                         console.log(result);
                    }
               })
          });

     </script>

     <script> document.getElementById("Pdate").value = new Date().toLocaleDateString(); </script>



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

     <!-- 
     <script>
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

     </script> -->


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
//           $(document).ready(function() {
//     $('#txtDate').datepicker();
//     $('#txtDate').datepicker('setDate', 'today');
//       format: 'dd/mm/yyyy',
// });
     </script>



     <!-- <script>
          document.getElementById('Pdate').valueAsDate = new Date();
     </script> -->
     <script>
       

     </script>

    


     <?php


     include 'common/footer.php' ?>

</body>

</html>