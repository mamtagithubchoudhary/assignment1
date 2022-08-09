<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
  <div class="topnav">
  <a class="active" href="http://localhost/LoanCalculator/homeloan.php">Home Loan</a>
  <a href="http://localhost/LoanCalculator/carloan.php">Car Loan</a>
  <a href="http://localhost/LoanCalculator/personalloan.php">Personal Loan</a>
</div>
    <div class="loan-calculator">
      <div class="top">
        <h2> Personal Loan Calculator</h2>

        <form action="personalloan.php" method="POST">
          <div class="group">
            <div class="title">Amount</div>
            <input type="text" value="750000" class="loan-amount" />
          </div>

          <div class="group">
            <div class="title">Interest Rate</div>
            <input type="text" value="11" class="interest-rate" />
          </div>

          <div class="group">
            <div class="title">Tenure (in months)</div>
            <input type="text" value="3" class="loan-tenure" />
          </div>
        </form>
      </div>

      <div class="result">
        <div class="left">
          <div class="loan-emi">
            <h3>Loan EMI</h3>
            <div class="value">123</div>
          </div>

          

          <div class="total-interest">
            <h3>Total Interest Payable</h3>
            <div class="value">1234</div>
          </div>

          
          <div class="total-amount">
            <h3>Total Amount
              <h4>(Principal-Interest)</h4></h3>
            <div class="value">12345</div>
          </div>

          

          <button name="calculate" class="calculate-btn">Calculate</button>
        </div>

        <div class="right">
          <canvas id="myChart" width="300" height="300"></canvas>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.2/dist/chart.min.js"></script>

    <script src="main.js"></script>

    <?php
   

    if(isset($_POST['calculate']))
    {
       

        //1. Get the Data from form
        $loanamount= $_POST['loanamount'];
        $interestrate = $_POST['interestrate'];
        $loantenure = md5($_POST['loantenure']); //Password Encryption with MD5

        //2. SQL Query to Save the data into database
        $sql = "INSERT INTO register SET 
            loanamount='$loanamount',
            interestrate='$interestrate',
            loantenure='$loantenure'
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