<?php
    $sname=$_POST['var'];
    $rname = $_POST['name'];
    $money = $_POST['money'];
    $dt=date("Y-m-d H:i:s");

    $conn = new mysqli('localhost','root','','Customers');
    if($conn->connect_error)
    {
        die('Connection Failed : '.$conn->connect_error);
    }
    
    $sql = "SELECT balance from customers WHERE name = '$sname'";
    $query = mysqli_query($conn, $sql);
    while($rs = mysqli_fetch_assoc($query)){
        $sbalance = $rs['balance'];
    }
    $sql2 = "SELECT balance from customers WHERE name = '$rname'";
$query2 = mysqli_query($conn, $sql2);
while($rs = mysqli_fetch_assoc($query2)){
    $rbalance = $rs['balance'];
}
if($sbalance>=$money)
{
$sbalance = $sbalance-$money;
$rbalance = $rbalance+$money;



    
$conn = new mysqli('localhost','root','','Customers');
if($conn->connect_error)
{
    die('Connection Failed : '.$conn->connect_error);
}
else{
    $stmt =$conn->prepare( "INSERT INTO transfers(sender, reciever, amount, date)
     values(?,?,?,?)");
     $stmt->bind_param("ssis", $sname,$rname, $money, $dt);
     $stmt->execute();
     header("Location: customers.php");


     $ret ="UPDATE customers SET balance = '$sbalance' WHERE name = '$sname'";
      $conn->query($ret);
     $ter = "UPDATE customers SET balance = '$rbalance' WHERE name = '$rname'";
      $conn->query($ter);
          
} 
}
else {
    header("Location: customers.php");
}

    
?>
