<?php
session_start();

if (!isset($_SESSION['product'])) {

    // session_start();

    $_SESSION['product'] = array();
}

if (isset($_POST['submit'])) {


    $pro_name = $_POST['pro_name'];
    // echo $pro_name;
    $pro_category = $_POST['pro_category'];
    // echo $pro_category;
    $pro_rate = $_POST['pro_rate'];
    // echo $pro_rate;
    $pro_quantity = $_POST['pro_quantity'];
    // echo $pro_quantity;
    $pro_date = $_POST['pro_date'];
    // echo $pro_date;

    $form_data = array("pro_name" => $pro_name, "pro_category" => $pro_category, "pro_rate" => $pro_rate, "pro_quantity" => $pro_quantity, "pro_date" => $pro_date);
    //print_r($form_data);

    array_push($_SESSION['product'], $form_data);
    print_r($_SESSION['product']);
    //   $max=sizeof($_SESSION['product']);
    //   echo "size=$max";

}

if(isset($_POST['amount_form'])){
$up_amount=0;
    $amount=$_POST['amount'];
   // echo $amount;
   $up_amount=$up_amount+$amount;
  
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Expense Manager</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div>

        <center>
            <h1 style="background-color:lightgray;">Expense Manager</h1><a href="logout.php">Reset</a>
        </center>

        <form action="" method="post">
            Product Name: <input type="text" name="pro_name" /> <br><br>
            Category: <select name="pro_category" id="pro_category">
                <option value="select">--Select--</option>
                <option value="grocery">Grocery</option>
                <option value="veggies">Veggies</option>
                <option value="travelling">Travelling</option>
                <option value="miscellaneous">Miscellaneous</option>


            </select><br><br>
            Product Rate: <input type="number" name="pro_rate" min="0" />
            <br><br>
            Product Quantity: <input type="number" min="1" name="pro_quantity" /><br><br>
            Date: <input type="date" name="pro_date" /> <br><br>
            <input type="submit" value="Add" name="submit" /><br><br>
        </form>
    </div>
    <br><br>
    <form action="" method="post">
        Income: <input type="number" name="amount" />
        <input type="submit" value="Add" name="amount_form"><br><br>
        <b>Wallet: <?php 
      
        //  echo $default_amount; 
         echo $up_amount;
         ?>
          Rs.</b>

    </form>
    <br>
    <br>
    <table style="width:50%" align="center" id="table" border="1px solid">

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
                <center>Date</center>
            </th>
            <th>
                <center>Action</center>
            </th>

        </tr>

        <?php
        echo "<tr>";
        $i = 0;
        foreach ($_SESSION['product'] as $key => $val1) {
            foreach ($val1 as $key1 => $val2) {

                echo "<td>" . $val2 . "</td>";
            }
            echo "<td><button>Edit</button> <button onclick='del(" . $i++ . ")'>Delete</button></td>";
            echo "</tr>";
        }


        ?>
    </table>

</body>
<script>
    function del($i) {
        alert($i);



    }
</script>


</html>