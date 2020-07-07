document.querySelector("#forget").addEventListener("click",function(){
           document.querySelector(".forget_pop").style.display = "flex";
             
        })
document.querySelector("#close").addEventListener("click",function(){
            document.querySelector("#forget_pop").style.display = "none";
           
        })
document.querySelector("#close1").addEventListener("click",function(){
          document.querySelector("#forget_pop").style.display = "none";
         
      })
document.querySelector("#close2").addEventListener("click",function(){
        document.querySelector("#forget_pop").style.display = "none";
       
    })
document.getElementById("sendotp").addEventListener("click",function(){
          //  document.querySelector("#forget_verifypop").style.display = "flex";
             document.querySelector("#forget_verifypop_detail").style.display = "flex";
             document.querySelector("#forget_pop_detail").style.display = "none";
            //  document.querySelector("#send_otp1").style.display = "none";
            //  document.querySelector("#send_otp2").style.display = "none";
        })
        document.getElementById("verifyotp").addEventListener("click",function(){
           document.querySelector("#change_password").style.display = "flex";
             document.querySelector("#change_password1").style.display = "flex";
             document.querySelector("#verify_otp").style.display = "none";
             document.querySelector("#verify_otp1").style.display = "none";
             
        })
