<style>
    <?php
    //  CSS linking for cart table----
    include("./css/style.css");
    ?>
</style>
<?php
session_start();
if (count($_SESSION['product']) > 0) {
    echo '  <table style="width:50%" align="center" id="table" border="1px solid">
        <tr>
            <th>
                <center>Product Name</center>
            </th>
            <th>
                <center>Product Category</center>
            </th>
            <th>
                <center>Product Rate</center>
            </th>
            <th>
                <center>Product Quantity</center>
            </th>
            <th>
                <center>Total Price</center>
            </th>
            <th>
                <center>Date</center>
            </th>
            <th>
                <center>Action</center>
            </th>

        </tr>';
    echo "<tr>";
    $grand_total = 0;

    foreach ($_SESSION['product'] as $key => $value) {
        $pro_total_price = $value['pro_quantity'] * $value['pro_rate'];
        echo "<td>" . $value['pro_name'] . "</td>";
        echo "<td>" . $value['pro_category'] . "</td>";
        echo "<td>" . $value['pro_rate'] . "</td>";
        echo "<td>" . $value['pro_quantity'] . "</td>";
        echo "<td>" . $value['pro_quantity'] * $value['pro_rate'] . " Rs.</td>";
        echo "<td>" . $value['pro_date'] . "</td>";
        echo "<td><a href='index.php?index=" . $key . "&&action=edit'><button>Edit</button></a> <a href='delete.php?index=" . $key . "'><button>Delete</button></a></td>";
        echo "</tr>";
    
        $grand_total = $grand_total + $pro_total_price;
        $_SESSION['expense']=$grand_total;
    }
$saving=$_SESSION['amount']-$grand_total;
    echo '   </table>';
    echo "<br/>";
    echo '<span style="margin-left:340px;font-weight: bold;bold;background-color:black;color:white;border-radius:5px;font-size:20px;"> Wallet: ' . $_SESSION['amount'] . '.00 Rs.</span>';
    echo '<span style="margin-left:70px;font-weight: bold;bold;background-color:red;color:white;border-radius:5px;font-size:20px;"> Total Expense: ' . $grand_total . '.00 Rs.</span>';
    echo '<span style="margin-left:60px;font-weight: bold;bold;background-color:darkgreen;color:white;border-radius:5px;font-size:20px;"> Saving: ' . $saving. '.00 Rs.</span>';

}else{
  echo '<center><p style="font-weight:bold;font-size:22px;">Empty, Please Add Items.!!</p></center>';
    echo '<span style="margin-left:435px;font-weight: bold;background-color:red;color:white;border-radius:5px;font-size:20px;">Total Expense: 0.00 Rs.</span>';
    echo '<span style="margin-left:150px;font-weight: bold;background-color:darkgreen;color:white;border-radius:5px;font-size:20px;">Total Saving: 0.00 Rs.</span>';

}
