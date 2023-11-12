<!--LOGIN-->

<section id="login">
<i class="gg-close" onclick="close_forms()"></i>
    <h1>Login</h1>
    <form action="login.php" method="post" id="login_form">
        <div class="text_field">
            <input type="text" name="email" id="login_email" required > <span></span> <label>Email</label>
        </div>
        <div class="text_field">
            <input type="password" name ="login_password" id ="login_password" required><span></span> <label>Password</label>
            <a><i onclick="login_pass()" class="fa-solid fa-eye" id="login_pass"></i></a>
        </div>
        <div id="status_login"></div>
        <button type="submit" id="submit_login" onclick="loading_login()" value="Login" disabled><i id="spinner" class=""></i>Login</button>
        <div class="signup_link">
            Not a member? <a id="signclick" onclick="popsign()">Sign up</a>
            
        </div>
    </form>
    <script>
  
      $("#submit_login").click( function() {
      
        $.post( $("#login_form").attr("action"),
                $("#login_form :input").serializeArray(),
            function (info) {
      
             
              $("#response").empty();
              $("#response").html(info);
              check_av1();  
             
            });
      
        $("#login_form").submit( function() {
          return false;  
        });
      });
     
     function check_av1(){
      var element = document.getElementById('response');
      var status = document.getElementById('status_login');
      var text = element.innerText || element.textContent;
      element.innerHTML = text;
      var status_text = status.innerText || status.textContent;
      status.innerHTML = status_text;
      let submit_login=document.getElementById("submit_login");
  
      
      if (text=="login"){
        localStorage.setItem("text",text);
        location.reload();
  
      }
      else if (text=="email"){
        document.getElementById('login').style.display = 'none';
        document.getElementById('email_verify').style.display='block';
        resend_time();
        submit_login.innerHTML ="Login";
      }
      else{
        status.innerHTML="Invalid Email or Password";
        localStorage.removeItem("text",text);
        submit_login.innerHTML ="Login";
      }
  
     } 
  
  
      </script>
      
  </section> 
  <!--SIGNUP------->
  
  <section id="signup">
  <i class="gg-close" onclick="close_forms()"></i>
    <h1>Sign up</h1>
    <form  action="signup.php" method="post" id="signup_form"  >
        <div class="text_field" id="name" >
            <input type="text" name="username" id ="username"  required > <span></span> <label>Username</label>
        </div>
        <div class="text_field" id="pass" >
            <input type="password" name="password" id ="signup_password" required><span></span> <label>Password</label>
            <a><i onclick="signup_pass()" class="fa-solid fa-eye" id="signup_pass"></i></a>
        </div>
        
        <div class="text_field" id="mail">
            <input type="text" name="email" id="email" required > <span></span> <label>Email</label>
        </div>
        <div id="email_error"></div>
        
        <div class="text_field" id="phone">
            
            <input type="numbers" name="number" id ="phone_number" required  > <span></span> <label>Phone number </label>
        </div>
        <div id="phone_error"></div>
        <div class="text_field1" id="date">
            <input type="date" value="" name="date" id="day" required > <span></span> <label>Date of birth</label>
        </div>
        <div id="date_error">Please enter a valid date</div>
        <div class="text_field">
        <select name="sex" >
            <option selected disabled>Select a gender</option>
            <option  value="male" >Male</option>
            <option value="famele" >Famale</option>
        </select>
   
        </div>
        <button type="submit" id="submit_signup" onclick="loading_signup()" value="sign up" disabled><i id="spinner" class=""></i>Sign up</button>
        <div class="signup_link">
            You are a member? <a onclick="poplogin()">Login</a>
        </div>
        
    </form>
   
  
    
  <script>
  
          $("#submit_signup").click( function() {
          
            $.post( $("#signup_form").attr("action"),
                    $("#signup_form :input").serializeArray(),
                function (info) {
          
                 
                  $("#response").empty();
                  $("#response").html(info);
                  check_av2()
                 
                });
          
            $("#signup_form").submit( function() {
              return false;  
            });
          });
          
  
  
  function check_av2(){
  /*email infos*/
  let email = document.getElementById("email");
  var email_error= document.getElementById("email_error");
  var mail1= document.head.appendChild(document.createElement("style"));
  var mail2= document.head.appendChild(document.createElement("style"));  
  var element = document.getElementById('response');
  var text = element.innerText || element.textContent;
  element.innerHTML = text;
  var email_text = email_error.innerText || email_error.textContent;
  email_error.innerHTML = email_text;
  /*phone infos*/
  let phone_number = document.getElementById("phone_number");
  var phone_error= document.getElementById("phone_error");
  var phone1= document.head.appendChild(document.createElement("style"));
  var phone2= document.head.appendChild(document.createElement("style"));
  var phone_text = phone_error.innerText || phone_error.textContent;
  phone_error.innerHTML = phone_text; 
  let submit_signup=document.getElementById("submit_signup");
  
  
  if (text=="email"){
    email_error.style.display="block";
    mail1.innerHTML="#mail span::before {background: brown;}";
    mail2.innerHTML="#mail input:valid ~ label, #mail input:focus ~ label  {color: brown;}";
    email_error.innerHTML="This email address has been used already";
  }
  if (text=="phone"){
    phone_error.innerHTML="This phone number has been used already";
    phone1.innerHTML="#phone span::before {background: brown;}";
    phone2.innerHTML="#phone input:valid ~ label, #mail input:focus ~ label  {color: brown;}";
    phone_error.style.display="block";
    submit_signup.innerHTML ="Sign up";
  
  }
  else if(text=="emailphone"){
    /*email*/
    email_error.style.display="block";
    mail1.innerHTML="#mail span::before {background: brown;}";
    mail2.innerHTML="#mail input:valid ~ label, #mail input:focus ~ label  {color: brown;}";
    email_error.innerHTML="This email address has been used already";
    /*phone*/
    phone_error.innerHTML="This phone number has been used already";
    phone1.innerHTML="#phone span::before {background: brown;}";
    phone2.innerHTML="#phone input:valid ~ label, #mail input:focus ~ label  {color: brown;}";
    phone_error.style.display="block";
    submit_signup.innerHTML ="Sign up";
  
  }
  else if(text=="true"){  
    submit_signup.innerHTML ="Sign up";
    document.getElementById('signup').style.display = 'none';
    poplogin();
  }
    
  }
  
  </script>
  
  
  
  </section>
  
  <!--EMAIL----->
  
  <section id="email_verify">
      <i class="gg-close" onclick="close_forms()"></i>

    <h1>Email Verification</h1>
    <form action="verify_email.php" method="post" id="email_form">
        <div class="text_field">
            <input type="number" name="code" id="code"  required ><span></span> <label>Code</label>
        </div>
        <div id="status_email"></div>
        <button type="submit" id="submit_email" onclick="loading_verify()" value="verify email" disabled><i id="spinner" class=""></i>Verify</button>
        <div class="resendcode">
        Didn't Receive the Verification Code? <a href="login.php">Resend</a> in <span id="time">01:00</span>
        </div>

  
    </form>
    <script>
  
      $("#submit_email").click( function() {
      
        $.post( $("#email_form").attr("action"),
                $("#email_form :input").serializeArray(),
            function (info) {
      
             
              $("#response").empty();
              $("#response").html(info);
              check_av3();
             
            });
      
        $("#email_form").submit( function() {
          return false;  
        });
      });
  
      function check_av3(){
        var element = document.getElementById('response');
        var status = document.getElementById('status_email');
        var text = element.innerText || element.textContent;
        element.innerHTML = text;
        var status_text = status.innerText || status.textContent;
        status.innerHTML = status_text;
        let submit_email=document.getElementById("submit_email");
        
        if (text=="login"){
          location.reload();
          localStorage.setItem("text",text);
          submit_email.innerHTML="Verify";
  
        }
        else{
          submit_email.innerHTML="Verify";
          status.innerHTML="Incorrect Verification Code";
          localStorage.removeItem("text",text);
        }
  
       } 
    </script>
  </section> 