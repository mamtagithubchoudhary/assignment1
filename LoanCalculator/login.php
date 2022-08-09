<html>
<head>
    <title>Login and Registration</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    
    <div class="container">
        <div class="card">
            <div class="inner-box" id="card">
                <div class="card-front">
                    <h3>LOGIN</h3>
                    <h5> EMI Calculator For Home Loan,Car Loan & Personal Loan</h5>
                    <form action="" method="POST">
                        <input type="email" name="email" class="input-box" placeholder="Your Email Id"required>
                        <input type="password" name="password"class="input-box" placeholder="Password"required>
                        
                        <button type="submit" class="submit-btn" onclick="window.location.href='Homepage.html'">submit</button>
                        <input type="checkbox"><span>Remember Me</span>
                    </form>
                    <button type="button" class="btn" onclick="openRegister()">I'm New Here</button>
                    <a href="">Forgot Password</a>
                
                
                </div>
                <div class="card-back">
                    <h2>REGISTER</h2>
                    <form action="" method="POST" >
                        <input type="text" name="name" class="input-box" placeholder="Your Name"required>
                        <input type="email" name="email"class="input-box" placeholder="Your Email Id"required>
                        <input type="password" name="Password" class="input-box" placeholder="Password"required>

                        <button type="submit" name="submit" class="submit-btn" >submit</button>
                        <input type="checkbox"><span>Remember Me</span>
                    </form>
                    <button type="button" class="btn" onclick="openLogin()">I've an account</button>
                    <a href="">Forgot Password</a>
                </div>
            </div>
        </div>
    </div>
    <script>
    var card = document.getElementById("card");
    function openRegister(){
        card.style.transform="rotateY(-180deg)";
    }
    function openLogin(){
        card.style.transform="rotateY(0deg)";
    }
    
       function myFunction() {
         window.location.href="http://127.0.0.1:5500/personalloan.html";  
       }
     
</script>


      <?php
   

    if(isset($_POST['submit']))
    {
       

        //1. Get the Data from form
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = md5($_POST['password']); //Password Encryption with MD5

        //2. SQL Query to Save the data into database
        $sql = "INSERT INTO register SET 
            name='$name',
            email='$email',
            password='$password'
        ";
 
        //3. Executing Query and Saving Data into Datbase
        $res = mysqli_query($conn, $sql) or die($mysqli_error());

        //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
        if($res==TRUE)
        {
            //Data Inserted
            //echo "Data Inserted";
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='success'>login Successfully.</div>";
            //Redirect Page to Manage Admin
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else
        {
           
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='error'>Failed to Add Admin.</div>";
            //Redirect Page to Add Admin
            header("location:".SITEURL.'admin/add-admin.php');
        }

    }
    
?>


</body>
</html>
