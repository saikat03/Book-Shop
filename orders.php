<?php
    session_start();
    
    

    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
        header('location:admin_login_page.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>BOOKSHOP</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css" rel="stylesheet" />

    <!--     inserted     -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">

</head>
<body class="index-page sidebar-collapse">
    <div class="wrapper"><br>
        <div class="main">
            <div class="section section-basic">
                <div class="container">
                      <h2>Customer Orders</h2>
                      <a class="btn btn-primary btn-round" href="admin_index.php"><i class="now-ui-icons arrows-1_minimal-left"></i> &nbsp Back to index</a>
                      <hr color="orange"> 
                
                <div class="col-md-12">
                <br>
            
                <div class="panel panel-success panel-size-custom">
                        <div class="panel-body">

                        <table id="" class="table table-condensed table-striped">
                                    <tr>
                                      <th>Order No</th>
                                      <th>Customer</th>
                                      <th>Book Name</th>
                                      <th>Quantity</th>
                                      <th>Shipping Address</th>
                                      <th>Contact</th>
                                      <th>Email</th>
                                      <th>Total price(Taka)</th>
                                    </tr>

<?php
                                      include('../config/dbconn.php');

                                      $action = isset($_GET['action']) ? $_GET['action'] : "";
                                      if($action=='deleted'){
                                          echo "<div class='alert alert-success'>Record was deleted.</div>";
                                      }

                                      $dbcon = new PDO("mysql:host=localhost:3306;dbname=bookshop_pro;","root","");
                                            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                      $query = "SELECT * FROM order_details ORDER BY order_details_id ASC";
                                      $qval=$dbcon->query($query);          	
                                      $info=$qval->fetchAll();
                                      ?>
                                      <tr> <?php
                                      foreach ($info as $row) {
                                      $oid = $row["order_details_id"];
                                      $pid = $row["prod_id"];
                                      $uid = $row["user_id"];
                                      ?><td><?php echo $oid; ?></td><?php
                                      $query2 = "SELECT * FROM users where user_id = $uid";
                                      $qval2=$dbcon->query($query2);          	
                                      $info2=$qval2->fetchAll();
                                      foreach ($info2 as $row2) {
                                          $uname = $row2["firstname"];
                                          ?><td><?php echo $uname; ?></td><?php
                                      }
                                      $tp = $row["total"];
                                      
                                      $query1 = "SELECT * FROM products where prod_id = $pid";
                                      $qval1=$dbcon->query($query1);          	
                                      $info1=$qval1->fetchAll();
                                      foreach ($info1 as $row1) {
                                          $pname = $row1['prod_name'];
                                          ?><td><?php echo $pname; ?></td><?php
                                          }
                                      $qty = $row["prod_qty"];
                                      ?><td><?php echo $qty; ?></td><?php
                                      $query2 = "SELECT * FROM users where user_id = $uid";
                                      $qval2=$dbcon->query($query2);          	
                                      $info2=$qval2->fetchAll();
                                      foreach ($info2 as $row2) {

                                          $add = $row2["address"];
                                          ?><td><?php echo $add; ?></td><?php
                                          $num = $row2["contact"];
                                          ?><td><?php echo $num; ?></td><?php
                                          $email = $row2["email"];
                                          ?><td><?php echo $email; ?></td><?php
                                          

                                          }
                                          ?><td><?php echo $tp; ?></td><?php

                                          ?>

                                          
                                          
                                          </tr>
                                          <?php
                                        }
                                      ?>  
                               
                        </div>
                    </div> 
                </div>
            </div>
        </div>
<br><br><br><br>
<footer class="footer" data-background-color="black">
            <div class="container">
                <nav>
                    <ul>
                        <li>
                            <a href="" target="_blank">
                                BOOKSHOPBD
                            </a>
                        
                    </ul>
                </nav>
                
            </div>
        </footer>
    </div>
</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="../assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // the body of this function is in assets/js/now-ui-kit.js
        nowuiKit.initSliders();
    });

    function scrollToDownload() {

        if ($('.section-download').length != 0) {
            $("html, body").animate({
                scrollTop: $('.section-download').offset().top
            }, 1000);
        }
    }
</script>


   <!---  inserted  -->
    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../plugins/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../plugins/demo.js"></script>
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script>
      $(function () {
        $("#example1").DataTable({
        });
      });
    </script>
     <!--  inserted  -->

</html>