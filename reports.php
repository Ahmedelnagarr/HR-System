<?php


session_start();


    include('connection.php'); 
    $query="select * from users";
    $result=mysqli_query($con,$query); 
    $query2="select * from users";
    $result2=mysqli_query($con,$query2);
    ?>




<!DOCTYPE html>
<!-- Employee_NAVGATION  -->
<html>
    <head>
<link rel="stylesheet" type="text/css" href="Header_Nav_Style_Hr_Admin.css">
    <title >Hr Admin </title>
</head>
   
<body>
    <!-- *********************** Start Of The Navigation & Header ******************************** -->
    <ul id="ul-nav-Header">
      <li><img id="avatar" src="img_avatar.jpg" alt="Avatar"></li>
      <li ><a   href="#">Mahmoud Refaat</a></li>
      <li id="header_logout"; ><a style="float:right; " style="float:right; " href="logout.php">Log Out</a></li>
       <li id="header_info"; ><a  style="float:right;" href="../header_page/myinfo_hradmin.html" >My Info</a></li>
    </ul>
    <ul id="ul-nav" >
        <li> <img id="logo" src="logo.png" alt="logo"> </li>
        <li> <a href="Hr_Admain_Home.html">View Reports </a> </li>
        <li> <a href="search-employee.html">Search Employee </a> </li>
        <li> <a href="update-empoyee.html">Update Employee </a> </li>
        <li> <a href="calculate-salary.html">Calculate Salary</a> </li>
        <li> <a href="add-employee.html">Add Employee</a> </li>
        <li> <a href="delete%20.html">Delete Employee</a> </li>
    </ul> 
    <!-- ***********************End Of The Navigation and Header***************************** -->
    
            <div class="grid_content" > <!-- Start Of The Big div ------>
                
                  <div class="grid_content_second_div"  >
        <h3 style="margin-left: 230px;" >Research and development</h3>                
    <table class="public_employee_table" id="signin_form" border ="1" cellpadding="11" cellspacing="10">
        
      <!--
       $query="select * from users";
    $result=mysqli_query($con,$query); ?>
         -->
        <tr> <th>Employee Name </th>          <th>Code</th>    <th> <a href="#"> Report </a> </th></tr>

        <?php 

        while($rows=mysqli_fetch_assoc($result)){ 
            if($rows['department'] == "Research and development")
            {
            ?>

        <tr> <td id="d_name"><?php echo $rows['username']; ?></td> 
            <td id="d_department"> <?php echo $rows['code']; ?></td>
            
             <td id="view_report">
              <a href="#">View Report</td></tr>
   <?php
            }
        } ?>
    </table>
    
                  </div>   
                
                <div class="grid_content_second_div"  >
            <h3 style="margin-left: 230px;">IT services</h3> 

        <table class="public_employee_table" id="signin_form" border ="1" cellpadding="11" cellspacing="10">
            <tr> <th>Employee Name </th>   <th>Code</th>  <th> <a href="#"> Report </a> </th></tr>

            <?php 

        while($rows=mysqli_fetch_assoc($result2)){ 
            if($rows['department'] == "IT services")
            {
            ?>

            <tr> <td id="d_name"><?php echo $rows['username']; ?></td>
             <td id="d_department"> <?php echo $rows['code']; ?></td> 
              
              <td id="view_report">
               <a href="##">View Report</td></tr>

                    <?php
                        }
                   } ?>

        </table>
    
                </div>   
                
                
    </div><!-- Close of the big div -->
    </body>

</html>