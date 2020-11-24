<?php
//Get values passe from form in login.php file
 session_start();


$username = $_POST['user'];
$password = $_POST['pass'];
$type = $_POST['type'];

//to prevent mysql injection
$con = mysqli_connect("localhost", "root", "","newdatabase");


$username = stripcslashes($username); //This function 'stripcslashes' can be used to clean up data retrieved from a database or from an HTML form
$password = stripcslashes($password);
$username = mysqli_real_escape_string($con, $username); //escapes special characters in a string for use in an SQL statement
$password = mysqli_real_escape_string($con, $password);



//connect to the server and select database
mysqli_connect("localhost", "root", "","newdatabase");


//query the database for user
$result = mysqli_query($con, "SELECT * FROM hr_admins WHERE user_name = '$username' AND password = '$password'")
                or die("Failed to query database ".mysqli_error($con));
$row = mysqli_fetch_array($result);

if($row['user_name'] == $username && $row['password'] == $password)
{
    
// echo "Login success!  wellcome".$row['user_name'];
    
    $_SESSION['sess_user']=$username;
    header('Location: reports.php');

}   else{
echo "Failed to login!";
}             

if($type == "Owner"){
    echo "owner";
}else if($type == "HrAdmin"){
    echo "Hr Admin";
}else{
    echo "ahmed";
}

?>



<!DOCTYPE html> 
<html>
    <head>
	<title>HR System</title>
	</head>
    <style>
        body{
            background-color: #252839;
          
            /*background-image:url(bg.jpg);*/
            /* background-repeat: no-repeat;
            background-size:cover;
            background-attachment: fixed; */
            color: #677077;
        }
        .emailandpass ,#form-signin-heading,#login-btn,#stack_select
        {
            
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        #container{
         margin-top: 120px;
               }
        #signin-form
        {
         margin: 0 auto;
         background-color: #fff;
         opacity: 0.9;
         border: 1px solid rgba(0, 0, 0, 0.1);
         max-width: 380px;
         padding: 15px 35px 45px;
            border-radius:7%; 
        }
        h2{
            "margin-bottom: 30px;
        }
        
        #rememberme{
        margin-top: 10px;
        margin-bottom:30px;
        margin-left: 35%;
        }
        
        
        .emailandpass {
            font-size: 16px;
            height: 25px;
            width: 70%;
            padding: 10px;
        }
        #stack_select
        {
            height:30px;
            
        }
        #login-btn{
            background-color:#f2b632;
            color:#252839;
            width:210px;
            height:40px; 
            font-size:18px;
            border: 1px solid #f2b632;
        }
    </style>
 <body>  

    <div id="container">
    <form id="signin-form" method ="POST" action="">       
      <h2 id="form-signin-heading" style="text-align: center;" >Please login</h2>
        <!-- </br> -->
      <input class="emailandpass"  type="text"  name="user" placeholder="Email Address" />
        

       </br>
      <input class="emailandpass" type="password" name="pass" placeholder="Password" />   
     </br>
    <select id="stack_select"name="type" style="width:100px;">
            <option value="Owner">Owner</option>
            <option value="Hr admin">Hr Admin</option>
            <option value="Employee">Employee</option>
        </select>
    </br> 
    <input id="rememberme" type="checkbox" value="remember-me"  name="rememberMe"> Remember me
       
    </br>
      <input id="login-btn" type="submit" value="Login" name="login-submit">   
    </form>
  </div>
     
 </body>
</html>