<!DOCTYPE html>
<html>
<head>
    <?php include 'process.php'?>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIGN UP PAGE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
   
</head>
<body>
    <?php
         
        $message = ''; 
        if(isset($_POST['submit'])){
            $firstname = $_POST['firstname']; 
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $password = $_POST['password'];
            $phone = $_POST['phone'];
            $gender = $_POST['gender'];
            $country = $_POST['country'];
            if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($pass) || empty($phone) || empty($country)) {     
                $message = 'All fields are required'; }
            else if (strlen($phone) != 11) {     
                $message = 'Phone number should be 11 digits long'; 
            } 
            else if (!is_numeric($phone)) {     
                $message .= 'Phone number should be numeric';  
            }
            else if ($pass != $password) {     
                    $message = 'password Mis match'; 
            }
            else if (is_numeric($gender))  {    
                    $message = 'Please select you gender'; 
            } else {
            $sql = "INSERT INTO user (firstname, lastname, email, pass, phone, gender, country)       
            VALUES ('$firstname', '$lastname', '$email', '$pass', '$phone', '$gender', '$country')";   
             $result60 = mysqli_query($link, $sql) or die ("Couldn't execute sql");
             if ($result60) { header("location:success.html"); } 
            }}
    ?>
<section id="bg">
    <div class="form-bg">
        <br>
        <form class="form" name="regForm" action="" onsubmit="return validateForm()" method="POST">
            <fieldset>           
                <legend><b>SIGN UP:</b></legend>
               <?php echo $message; ?><br>
                <label for="firstname">First Name:</label>       <br>     
                <input type="text" name="firstname" id="firstname">           <br>    
                <label for="lastname">Last Name:</label>       <br>     
                <input type="text" name="lastname" id="lastname">           <br>    
                <label for="email">Email:</label>           <br> 
                <input type="text" name="email" id="email">           <br>    
                <label for="password">Password:</label>         <br>   
                <input type="password" name="pass" id="password">           <br>    
                <label for="password">Confirm Password:</label>        <br>    
                <input type="password" name="password" id="confirmpassword">           <br>   
                <label for="phone">Phone Number:</label>           <br> 
                <input type="text" name="phone" id="phone">           <br>
                <label for="gender">Gender:</label>            <br>
                <select name="gender" id="gender"> 
                <option value ="1">***Select Your Gender***</option> 
                <option>Male</option>                   
                <option>Female</option>      
                </select>                                       <br>   
                <label for="country">Country:</label>           <br> 
                <input type="text" name="country" id="country">           <br>        
                <input type="submit" name="submit" value="submit" >     
            </fieldset> 
     </form>  
    </div> <!-- /form -->
</section>
  <script type="text/javascript">
    function validateForm() {           
        var firstname = document.regForm.firstname           
        if (firstname.value == "") 
        {               
            alert("Please input your First Name");               
            firstname.focus();               
            return false;          
        }
        var lastname = document.regForm.lastname;           
        if (lastname.value == "") 
        {               
            alert("Please input your Last Name");              
            lastname.focus();               
            return false;           
            }

             var email = document.regForm.email;           
        if (email.value == "") 
        {               
            alert("Please input your Email Address @example.com");              
            email.focus();               
            return false;           
            }
            var password = document.regForm.password;           
        if (password.value == "") 
        {               
            alert("Please input password");              
            password.focus();               
            return false;           
            }
            var confirmpassword = document.regForm.confirmpassword;           
        if (confirmpassword.value == "") 
        {               
            alert("Please input password confirm");              
            confirmpassword.focus();               
            return false;           
            }
        if (password.value != confirmpassword.value) {
            alert("Passwords do not match.");
            return false;
        }

            var phone = document.regForm.phone           
            if (phone.value == "" || isNaN(phone.value)) 
            {               
            alert("Phone number should be numeric.");               
            phone.focus();               
            return false;           
            }
            if (phone.value.length != 11) 
            {               
            alert( "Phone number should be exactly 11 digits.");               
            phone.focus();               
            return false;           
            }
            var gender = document.regForm.gender;           
            if (gender.value == "***Select Your Gender***") 
            {               
                alert("Please select your Gender");               
                return false;          
            }         
            
            var country = document.regForm.country;           
        if (country.value == "") 
        {               
            alert("Please input your Country");              
            country.focus();               
            return false;           
            }
            }
            </script>
</body>
</html>