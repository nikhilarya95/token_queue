<?php

$firstname=$_POST['sign_firstname'];
$lastname=$_POST['sign_lastname'];
$mobile=$_POST['sign_mobile'];
$email=$_POST['sign_email'];
$password=$_POST['sign_password'];
$companyname=$_POST['sign_companyname'];
if(!empty($firstname)||!empty($lastname)||!empty($mobile)||!empty($email)||!empty($companyname))   
{
    $host = "localhost";
$DB_USER = "root";
$DB_PASS = "";
$DB_NAME = "tokenqueue";
$con = new mysqli($host,$DB_USER,$DB_PASS,$DB_NAME);
// Check connection
if (mysqli_connect_error())
{
   die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
}
else
{
    $signupselect = "SELECT email FROM client_detail WHERE email = ? LIMIT 1";
    $insertQuery1= "INSERT Into client_detail (first_name, last_name, mobile, email, password, com_shop_name) VALUES(?,?,?,?,?,?)";
    $stmt = $con->prepare($signupselect);
    $stmt ->bind_param("s",$email);  
    $stmt ->execute();
    $stmt ->bind_result($email);
    $stmt ->store_result();
    $rnum =$stmt->num_rows;
    if($rnum==0)
    {
        $stmt->close();
        $stmt = $con->prepare($insertQuery1);
        $stmt -> bind_param("ssssss", $firstname, $lastname, $mobile, $email, $password, $companyname);
        $stmt ->execute();
        echo "<script>alert('Registation completed')</script>";
        
    }
    else
    {
        echo "<script>alert('You account is already created')</script>";
        
    }

    $firstname="";
    $lastname="";
    $mobile="";
    $email="";
    $password="";
    $companyname="";
        $stmt -> close();
        $con -> close();
    // $insertedata1= mysqli_query($con,$insertQuery1);
}
}
header("location:index.html");
exit;
?>