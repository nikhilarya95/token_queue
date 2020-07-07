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
    $tokensubmit=NULL;
   $firstname=NULL;
   $lastname=NULL;
    $mobile=NULL;
    $email=NULL;
    $formname=NULL;
    $dateoftoken=NULL;
    $tokensubmit=$_POST['cus_submitbtn'];
 if(isset($tokensubmit))           
{
    $firstname=$_POST['cus_firstname'];
    $lastname=$_POST['cus_lastname'];
    $mobile=$_POST['cus_mobile'];
    $email=$_POST['cus_email'];
    $formname=$_POST['cus_formname'];
    $dateoftoken=date("d/m/yy");
    $time=date("h:iA");
    $host = "localhost";
    $DB_USER = "root";
    $DB_PASS = "";
    $DB_NAME = "tokenqueue";
    $con = new mysqli($host,$DB_USER,$DB_PASS,$DB_NAME);
    $tokenselector = "SELECT token_no FROM token_detail";
    $tokenquery = $con->query($tokenselector);

    if($tokenquery -> num_rows >0)
    {
        while($row = $tokenquery->fetch_assoc())
        {   
            $tokenno=$row['token_no']+1;
        }
    }
    else if($time=date("07:59AM"))
    {
        $tokenno=1;
    }
    else
    {
        $tokenno=1;
    }

    if(!empty($firstname)||!empty($lastname)||!empty($mobile)||!empty($email)||!empty($formname))   
    {
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
                $stmt -> bind_param("ssss", $tokenno, $email, $formname, $dateoftoken);
                $stmt ->execute();

                $to=$email;
                $msg= "YOUR TOKEN NUMBER IS : $tokenno.";   
                $subject="Token Queue " ;
                $headers .= "MIME-Version: 1.0"."\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
                $headers .= 'From: Token Queue'."\r\n";
                $ms.="<html></body><div><div>Dear $firstname,</div></br></br>";
                $ms.="<div style='padding-top:8px;'>YOUR TOKEN NUMBER IS : </div>
                <div style='padding-top:10px;'>$tokenno</div>
                </div>
                </body></html>";
                mail($to,$subject,$ms,$headers);
                echo "<script>alert('Token Created')</script>";
                }
                else
                {
                    $stmt->close();
                    $stmt = $con->prepare($inserttokenQuery);
                    $stmt -> bind_param("ssss", $tokenno, $email, $formname, $dateoftoken);
                    $stmt ->execute();

                    $to=$email;
                $msg= "YOUR TOKEN NUMBER IS : $tokenno.";   
                $subject="Token Queue " ;
                $headers .= "MIME-Version: 1.0"."\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
                $headers .= 'From: Token Queue'."\r\n";
                $ms.="<html></body><div><div>Dear $firstname,</div></br></br>";
                $ms.="<div style='padding-top:8px;'>YOUR TOKEN NUMBER IS : </div>
                <div style='padding-top:10px;'>$tokenno</div>
                </div>
                </body></html>";
                mail($to,$subject,$ms,$headers);
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
}


header("location:User.php");
exit;
?>