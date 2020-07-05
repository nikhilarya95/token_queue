 <!DOCTYPE html>
<html>
<head>
<title>Token queue</title>    
    <link rel="stylesheet" type="text/css" href="header.css"/>
    <link rel="stylesheet" type="text/css" href="User.css"/>
<!--    <script type="text/javascript" href="date.javascript"></script>-->
   
</head>
<body>
<div class="header">
    <div class="logo">
        <img src="img\logo.png" alt="logo"/>
    </div>
    <div class="logid">
        
        <p class="logout"><a href="index.html">Logout</a></p>
        
    </div>
    
</div>
     
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
    <div class="tokenarea" id="tokenarea">
        <?php
include('connectivity.php');
$tokenselector = "SELECT token_no FROM token_detail";
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
