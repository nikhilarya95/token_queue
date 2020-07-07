<!DOCTYPE html>
<html>
<head>
<title>Token queue</title> 
<link rel="stylesheet" type="text/css" href="header.css"/>
    <link rel="stylesheet" type="text/css" href="User.css"/>   
   <style>
::-webkit-scrollbar { width: 10px;}


/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 3px #D3B8B0 ; 
  border-radius: 10px;
}
/* Handle */
::-webkit-scrollbar-thumb {
  background: #E59B87; 
  border-radius: 10px;
}
/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #D17860;}
       </style>
<!--    <script type="text/javascript" href="date.javascript"></script>-->
   
</head>
<body>
    
    <?php include('connectivity.php');
    session_start();
    
    $sessionemail = $_SESSION['sessionemail'];
    if($sessionemail==false )
    {
        header('location:index.html');
    }
   
    $sessionquery = "SELECT * FROM client_detail WHERE email='$sessionemail'";
    $sessionresult = mysqli_query($con,$sessionquery);
    $sessiondata = mysqli_fetch_assoc($sessionresult);

    ?>
     
<div class="header">
    <div class="logo">
        <img style="margin: 2px;width:220px" src="img\logo.png" alt="logo"/>
    </div>
    
    <div  style="font-size:40px; margin:2%;text-align:center;position:absolute; left:25%;color:#173164 ;padding-left:2%; font-weight: 700; " >
     <?php echo $sessiondata['com_shop_name'];?>
</div>

    <div class="logid">
        
        <p class="logout"><a href="Logout.php">Logout</a></p>
        
    </div>
    
</div>
     <p style="font-size:16px;font-weight:600;color:#9D3E00; float:left;margin:2%;"><?php echo "Welcome " .$sessiondata['first_name']." ".$sessiondata['last_name'];?></p>
    <a id="date" name="tokendate">
        <script>
    var currentdate = new Date();
         
    var month = currentdate.getMonth();
        month=  month+1;
         
    var day = currentdate.getDate();
         
    var year = currentdate.getFullYear();
         
    var fulldate = day +"/"+ month +"/"+ year;
        document.write(fulldate);
         
    </script>
    </a>
    <p ><a class="addbtn" id="addbtn" href="#">+</a></p>
    <div class="tokenarea" id="tokenarea" style="overflow:auto; ">
  
        <?php
include('connectivity.php');
$matchdate=date("d/m/yy");



$tokenselector = "SELECT token_no FROM token_detail where date_of_token = '$matchdate'";
$tokenquery = $con->query($tokenselector);
if($tokenquery -> num_rows >0)
{
    while($row = $tokenquery->fetch_assoc())
    {
        echo "<script>var newPara = document.createElement('a');
        newPara.classList.add('token');
        
        var textnode=document.createTextNode(".$row['token_no'].");
        newPara.appendChild(textnode);
        document.getElementById('tokenarea').appendChild(newPara); </script>";
    }
    
}

?>
        
    </div>
    <div class="customer">
        <div class="customer_detail">
            <div class="close">
            <p >x</p>
            </div>
            <form name="custom_form" action="Tokencreated.php" method="POST">
            <table>
                  <tr>
                      <td><lable>Token number:</lable></td>
                    <td><a class="tokenno" name="cus_tokenno" id="tokenno"></a></td>
                    
                </tr>
                <tr>
                    <td><input type="text" name="cus_firstname" placeholder="First Name" required /></td>
                    <td><input type="text" name="cus_lastname" placeholder="Last Name" required /></td>
                    
                    
                </tr>
                <tr>
                    <td><input type="text" name="cus_mobile" placeholder="Mobile" required /></td>
                <td><input type="text" name="cus_email" placeholder="Email Id" required ></td>
                    
                </tr>
                <tr>
                    <td colspan="2"><input name="cus_formname" class="formtype" type="text" placeholder="Form Name" required/></td>
                    
                </tr>
                <tr>
                    <td colspan="2"><button class="cus_submit" name="cus_submitbtn" id="cus_submit" type="submit"> Submit </button></td>
                </tr>
            </table>
            
            </form>

            
        </div>
    </div>
     <script src="User.js"></script>
   
</body>
</html>
