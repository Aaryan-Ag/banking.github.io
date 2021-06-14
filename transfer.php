<?php
 $conn = mysqli_connect('localhost','root','','Customers');
 if($conn-> connect_error) {
     die("connection failed:". $conn-> connect_error);
 }
error_reporting(0);

$cname=$_GET['rn'];
$sql = "SELECT email, balance from customers WHERE name = '$cname'";
$query = mysqli_query($conn, $sql);
while($rs = mysqli_fetch_assoc($query)){
    $cbalance = $rs['balance'];
    $cemail = $rs['email'];
}
?>

<!DOCTYPE html>
<html>
    <head>
        <style>
            body {
            background: #15e0eb;
            }
            form {
                text-align: center;
                padding: 50px;
                font-size: 25px;
            }
            input[name="button1"] {
                background-color: #4CAF50; /* Green */
            border-collapse: collapse;
            border: 3px solid black;
            border-radius: 12px;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            }
            input[type="text"] {
                border-collapse: collapse;
            border: 3px solid black;
            width:300px;
            height:30px;
            }
            select[name="name"] {
                border-collapse: collapse;
            border: 3px solid black;
            width:300px;
            height:40px;
            text-align: center;
                font-size: 20px;
            }
            h1 {
                text-align: center;
                font-size: 40px;
            }
            p {
                text-align: center;
                font-size: 25px;
            }
            .check {
                text-align: center;
                font-size: 25px;
            }
        </style>
        <script>
            function hide() {
             document.getElementById('form').style.display='none';
            }
            function showHide() {
                if(document.getElementById('button').checked) {
                    document.getElementById('form').style.display='block';
                } else {
                    document.getElementById('form').style.display='none';
                }
            }
        </script>
        <title>Details</title>
    </head>
    <body>
        <h1>Details Of Customer :-</h1>
        <br>
        <p><?php echo "Name :$cname"; ?></p> 
        <p><?php echo "Balance :$cbalance"; ?></p>
        <p><?php echo "EMAIL :$cemail"; ?></p>
    <br>
    <div class="check">
    <input type="checkbox" id="button" name="button" onclick="showHide()">
    <label for="button">Make a Transaction</label>
        </div>
        <form method="POST" action="submit.php" id="form">
            Transfer to:
            <select name="name" required>
                <option value="Aaryan">Aaryan</option>
                <option value="Balaji">Balaji</option>
                <option value="Shubham">Shubham</option>
                <option value="Damon">Damon</option>
                <option value="Elena">Elena</option>
                <option value="Arjun">Arjun</option>
                <option value="Chandan">Chandan</option>
                <option value="Suresh">Suresh</option>
                <option value="Somesh">Somesh</option>
                <option value="Karna">Karna</option>
            
            </select>
            <br>
            <br>
           &nbsp; Amount: &nbsp;
            <input type="text" name="money" required>
            <br>
            <br>
            <input type='hidden' name='var' value='<?php echo "$cname";?>'/> 
            <input type="submit" value="TRANSFER" name="button1">
        </form>
        <script>
        hide();
        </script>
    </body>
</html>


