$(document).ready(function(){  
  $('#login_button').click(function(){  
       var username = $('#username').val();  
       var password = $('#password').val();  
       if(username != '' && password != '')  
       {  
            $.ajax({  
                 url:"action.php",  
                 method:"POST",  
                 data: {username:username, password:password},  
                 success:function(data)  
                 {  
                      //alert(data);  
                      if(data == 'No')  
                      {  
                           alert("Wrong Data");  
                      }  
                      else  
                      {  
                           $('#loginModal').hide();  
                           location.reload();  
                      }  
                 }  
            });  
       }  
       else  
       {  
            alert("Both Fields are required");  
       }  
  });  
  $('#logout').click(function(){  
       var action = "logout";  
       $.ajax({  
            url:"action.php",  
            method:"POST",  
            data:{action:action},  
            success:function()  
            {  
                 location.reload();  
            }  
       });  
  });  
});  

console.log("holaaaa");