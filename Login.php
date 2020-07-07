<?php
session_start();
include('connectivity.php');

$logemail=$_POST['log_email'];
$logpassword=$_POST['log_password'];
if(empty($logemail)||empty($logpassword))
{
    echo "<script>alert('Please enter all the field')</script>";
    
}
else
{
    $logquery = "SELECT * FROM client_detail WHERE email='$logemail' AND password='$logpassword'";
    $logresult = mysqli_query($con,$logquery);
    $logdatacount = mysqli_num_rows($logresult);
    if($logdatacount==1)
    {
        $_SESSION['sessionemail']=$logemail;
        header('location: User.php');
    }
    else
    {
        // echo "<script> alert('Please enter correct email and Password');window.location.href = 'index.html'</script>";
       
        
    }
   
}




?>
