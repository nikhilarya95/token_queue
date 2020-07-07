 document.getElementById("signup").addEventListener("click",function(){
           document.querySelector(".signup_pop").style.display = "flex";
        })
        document.querySelector(".close").addEventListener("click",function(){
            document.querySelector(".signup_pop").style.display="none";
        })
//var name=/^[^a-z]$/;
//    var mobile=[0-9];
//    var email=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
//document.querySelector(".cus_submit").addEventListener("click",function(){
//    
//  var firstname=document.Signup.sign_firstname.value;
//    var lastname=document.Signup.sign_lastname.value;
//    var mobile=document.Signup.sign_mobile.value;
//    var email=document.Signup.sign_email.value;
//    var password=document.Signup.sign_password.value;
//    var confirmpassword=document.Signup.sign_confirmpassword.value;
//    if(!name.test(firstname))
//        {
//            alert("Enter valid First name");
//            document.Signup.sign_firstname.focus();
//            return false;
//        }
//    
//})
var ck_name = /^[A-Za-z0-9 ]{3,20}$/;
var ck_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
var ck_password =  /^(?=.*[\d])(?=.*[!@#$%^&*])[\w!@#$%^&*]{6,16}$/i;
var phn=/^([7-9]{1})+([0-9]{9})$/;
function validate()
{
var name =Signup.sign_firstname.value;
    
var lname =Signup.sign_lastname.value;
var email =Signup.sign_email.value;
var password =Signup.sign_password.value;
var password1=Signup.sign_confirmpassword.value;
var mobile=Signup.sign_mobile.value;
var errors = [];
if (!ck_name.test(name)) 
{
  errors[errors.length] = "You must enter valid first Name .";
 }
if (!ck_name.test(lname)) 
{
  errors[errors.length] = "You must enter valid last Name .";
 }

 if (!ck_email.test(email))
 {
  errors[errors.length] = "You must enter a valid email address.";
 }



 if (!ck_password.test(password)) 
{
  errors[errors.length] = "You must enter a valid Password ";
 }
if(password!=(password1))
{
    errors[errors.length] ="password is not similar";
    password1.focus;
            
}
if(!phn.test(mobile))
{
    errors[errors.length] ="phone number must be ten digit and start from 7-9";
            
}


 if (errors.length > 0) 
{

  reportErrors(errors);
    
  return false;
    document.querySelector(".signup_pop").style.display = "flex";
 }
    
return true;
    
}


function reportErrors(errors)
{
 var msg = "Please Enter Valide Data...\n";
 for (var i = 0; i<errors.length; i++) 
{
 var numError = i + 1;
  msg += "\n" + numError + ". " + errors[i];
}
 alert(msg);
    
}
