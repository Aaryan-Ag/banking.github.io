<!DOCTYPE html>
<html>
    <head>
        <style type="text/css">
        body {
        background: #FF7377;
        }
         table {
            width: 100%;
            text-align: centre;
            color: white;
            background: #CC0700;
        }
        table, th, td {
            border: 3px solid white;
            padding: 15px;
            font-size: 20px;
            text-align: center;
            border-collapse: collapse;
            font-weight: bold;
        }
        th {
            background: #8C0500;
        }
        button {
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
            position: absolute;
            top: 8px;
            right: 16px;
            font-size: 18px;
        }
        h1 {
        font-size: 30px;
        position: absolute;
        top: 8px;
        left: 16px;
        text-align: center;
        font-weight: bold;
       }
        </style>
        <title>Customers</title>
    </head>

    <body>
   <div class="dh"> <h1>Customers Data :-</h1></div> 
        <br> <br>
        <a href="transactions.php">
            <button>View Transactions</button>
        </a>
        <br> <br>
       <div class="tab"> <table id="dashboard" method="post" >
           <div class="itab"> <tr>
             <th>CUSTOMER NAME</th>
             <th>EMAIL</th>
              <th>CURRENT BALANCE</th>
            </tr>
<?php
                $conn = mysqli_connect('localhost','root','','Customers');
                if($conn-> connect_error) {
                    die("connection failed:". $conn-> connect_error);
                }

                $sql = "SELECT name, email, balance from customers";
                $result = $conn-> query($sql);

                if($result->num_rows > 0) {
                    while ($row = $result-> fetch_assoc()) {
                        echo "<tr><td> <a href='transfer.php?rn=$row[name]'>". $row["name"] ."</a>
                        </td><td>". $row["email"] .
                        "</td><td>". $row["balance"] .
                        "</td></tr>";
                    }
                    echo "</table>";
                }
                else {
                    echo "0 results";
                }

                $conn-> close();
                
                
            ?>
</div>
           
        </table></div>
    </body>
</html>