<!DOCTYPE html>
<html>
    <head>
    <style type="text/css">
    body {
        background: #ADD8E6;
        }
         table {
            width: 100%;
            text-align: centre;
            color: white;
            background: #2F2FA2;
        }
        table, th, td {
            border: 3px solid green;
            padding: 15px;
            font-size: 20px;
            text-align: center;
            border-collapse: collapse;
            font-weight: bold;
        }
        th {
            background: #242582;
        }
        h1 {
        font-size: 25px;
        position: absolute;
        top: 8px;
        left: 16px;
        margin: 1px;
        text-align: center;
        font-weight: bold;
       }
      
        </style>
         <title>Transactions</title>
    </head>
    <body>
   <div class="dh"> <h1>TRANSACTIONS HISTORY :-</h1></div> 
        <br> <br>
       <div class="tab"> <table id="dashboard" method="post" >
           <div class="itab"> <tr>
             <th>Senders Name</th>
             <th>Reciever's Name</th>
              <th>Amount Transferred</th>
              <th>Date and Time</th>
            </tr>
<?php
                $conn = mysqli_connect('localhost','root','','Customers');
                if($conn-> connect_error) {
                    die("connection failed:". $conn-> connect_error);
                }

                $sql = "SELECT * from transfers";
                $result = $conn-> query($sql);

                if($result->num_rows > 0) {
                    while ($row = $result-> fetch_assoc()) {
                        echo "<tr><td>". $row["sender"] .
                        "</td><td>". $row["reciever"] .
                        "</td><td>". $row["amount"] .
                        "</td><td>". $row["date"] .
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