<?php
session_start();

if (!isset($_SESSION['User'])) {
     // echo ' Well Come ' . $_SESSION['User'] . '<br/>';
     // echo '<a href="logout.php?logout">Logout</a>';
} else {
     header("location:../university/index.php");
     // header("location:../session_login");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" href="css/bootstrap.css">
     <title>Login Form in PHP With Session</title>
</head>

<body style="background:#FFF;">

     <div class="container">
          <div class="row">
               <div class="col-lg-6 m-auto">
                    <div class="card bg-light mt-5">
                         <div class="card-title  text-white mt-5">
                              <h3 class="text-center py-3 text-dark">Login</h3>
                         </div>
                         <div class="card-body  bg-light">
                              <form action="process.php" method="post">
                                   <input type="text" name="UName" placeholder=" User Name" class="form-control mb-3">
                                   <input type="password" name="Password" placeholder=" Password"
                                        class="form-control mb-3">
                                   <button class="btn btn-success mt-3" name="Login">Login</button>
                              </form>
                         </div>
                    </div>
               </div>
          </div>
     </div>
 
     <?php 
                        if(@$_GET['Empty']==true)
                        {
                    ?>
                        <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Empty'] ?></div>                                
                    <?php
                        }
                    ?>


                    <?php 
                        if(@$_GET['Invalid']==true)
                        {
                    ?>
                        <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Invalid'] ?></div>                                
                    <?php
                        }
                    ?>

</body>

</html>