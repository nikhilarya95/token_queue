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


    //$tokenno= $_POST['cus_tokenno'];
    //echo $tokenno;
    $tok=0;
            $firstname="";
            $lastname="";
            $mobile="";
            $email="";
            $formname="";
            $tokenno =0;
            $dateoftoken="";
    $tokenno=$tokenno+1;
    $firstname=$_POST['cus_firstname'];
    $lastname=$_POST['cus_lastname'];
    $mobile=$_POST['cus_mobile'];
    $email=$_POST['cus_email'];
    $formname=$_POST['cus_formname'];
    $dateoftoken=date("d/m/yy");
    
    if(!empty($firstname)||!empty($lastname)||!empty($mobile)||!empty($email)||!empty($formname))   
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
            $customerselect = "SELECT email FROM customer_detail WHERE email = ? LIMIT 1";
            $tokenselect = "SELECT token_no,date_of_token FROM token_detail WHERE token_no = ? AND date_of_token = ? LIMIT 1";
            $inserttokenQuery= "INSERT INTO token_detail ( token_no, email, form_name, date_of_token) VALUES(?,?,?,?)";
            $insertcustomerQuery= "INSERT INTO customer_detail (first_name, last_name, mobile, email) VALUES(?,?,?,?)";
            $stmt = $con->prepare($customerselect);
            $stmt ->bind_param("s",$email);
            $stmt ->execute();
            $stmt ->bind_result($email);
            $stmt ->store_result();
            $stmt1 = $con->prepare($tokenselect);
            $stmt1 ->bind_param("ss",$tokenno,$dateoftoken);
            $stmt1 ->execute();
            $stmt1 ->bind_result($tokenno,$dateoftoken);
            $stmt1 ->store_result();
            $rnum =$stmt->num_rows;
            $rnum1 =$stmt1->num_rows;
            
            if($rnum1==0)
            {
                  
                if($rnum==0)
                {
                $stmt->close();
                $stmt = $con->prepare($insertcustomerQuery);
                $stmt -> bind_param("ssss", $firstname, $lastname, $mobile, $email);
                $stmt ->execute();
                $stmt->close();
                $stmt = $con->prepare($inserttokenQuery);
                $stmt -> bind_param("sssd", $tokenno, $email, $formname, $dateoftoken);
                $stmt ->execute();
                echo "<script>alert('Token Created')</script>";
                }
                else
                {
                    $stmt->close();
                    $stmt = $con->prepare($inserttokenQuery);
                    $stmt -> bind_param("ssss", $tokenno, $email, $formname, $dateoftoken);
                    $stmt ->execute();
                    echo "<script>alert('Token Created')</script>";
                }
            }
            else
            {
                echo "<script>alert('not inside first if')</script>";
            }
        }
        $stmt -> close();
        $con -> close();

    }
    

include("User.php");
exit();
?>