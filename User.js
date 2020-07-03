 let count=1;
        document.getElementById("addbtn").addEventListener("click",function(){
           document.querySelector(".customer").style.display = "flex";
            
            
            var textnode1=document.createTextNode(count);
            
            document.getElementById("tokenno").innerHTML= count;
                    
        console.log(tokenno)
            
        })
        document.querySelector(".close").addEventListener("click",function(){
            document.querySelector(".customer").style.display="none";
        })
        
  var ck_name = /^[A-Za-z0-9 ]{3,20}$/;
var ck_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
var ck_username = /^[A-Za-z0-9_]{3,20}$/;
var ck_password =  /^[A-Za-z0-9!@#$%^&*()_]{6,20}$/;
var phn=/^([7-9]{1})+([0-9]{9})$/;        

document.querySelector(".cus_submit").addEventListener("click",function(){
    
var name =custom_form.cus_firstname.value;
var lname =custom_form.cus_lastname.value;
var email =custom_form.cus_email.value;

var mobile=custom_form.cus_mobile.value;
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
    
if(!phn.test(mobile))
        {
            errors[errors.length] ="phone number must be ten digit and start from 7-9";
            
        }

if(custom_form.cus_formname=="")
    {
        errors[errors.length]="field should not be empty";
    }
 if (errors.length > 0) 
{

  reportErrors(errors);
  return false;
 }
//    
//custom_form.cus_firstname.value="";
//custom_form.cus_lastname.value="";
//custom_form.cus_email.value="";
//custom_form.cus_mobile.value="";
//    custom_form.cus_formname.value="";
           
            var newPara = document.createElement('a');
            newPara.classList.add('token');
            
            var textnode=document.createTextNode(count);
            newPara.appendChild(textnode);
            
            document.getElementById("tokenarea").appendChild(newPara);
            
            count=count+1; 
    return true;
            
            


            
        })
           
      
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