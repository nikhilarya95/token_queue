<?php
//     include('connectivity.php');
// $firstname=$_POST['sign_firstname'];
// $lastname=$_POST['sign_lastname'];
// $mobile=$_POST['sign_mobile'];
// $email=$_POST['sign_email'];
// $password=$_POST['sign_password'];
// $company=$_POST['sign_companyname'];
// $insertQuery= "INSERT INTO client_detail VALUES('$firstname','$lastname','$mobile','$email','$password','$company')";
// $insertedata= mysqli_query($con,$insertQuery);
// if($insertedata)
// {
//    
    
// }
?>
<?php

if(isset($_POST['cus_submitbtn']))
{
$firstname=$_POST['cus_firstname'];
            
$lastname=$_POST['cus_lastname'];
$mobile=$_POST['cus_mobile'];
$email=$_POST['cus_email'];

$formname=$_POST['cus_formname'];
   
$insertQuery1= "INSERT INTO token_detail (`first_name`,`last_name`,`mobile`,`email`,`form_name`) VALUES('$firstname','$lastname','$mobile','$email','$formname')";
$insertedata1= mysqli_query($con,$insertQuery1);


if($insertedata1)
{
   ?><script>alert("token created");</script><?php
   
    header('Location:User.php');
}
}

?>