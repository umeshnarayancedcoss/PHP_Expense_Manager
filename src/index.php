<?php
// session starts here---
session_start();
if (!isset($_SESSION['product'])) {
    $_SESSION['product'] = array();
}
if (!isset($_SESSION['amount'])) {
    $_SESSION['amount'] = 0;
}
if (!isset($_SESSION['expense'])) {
    $_SESSION['expense'] = 0;
}
if (!isset($_SESSION['btn'])) {
    $_SESSION['btn'] = '<input type="submit" class="btn" value="Add" name="submit" />';
}
// ----Form submission--------------
if (isset($_POST['submit'])) {
    $pro_name = $_POST['pro_name'];
    $pro_category = $_POST['pro_category'];
    $pro_rate = $_POST['pro_rate'];
    $pro_quantity = $_POST['pro_quantity'];
    $pro_date = $_POST['pro_date'];
    $form_data = array("pro_name" => $pro_name, "pro_category" => $pro_category, "pro_rate" => $pro_rate, "pro_quantity" => $pro_quantity, "pro_date" => $pro_date);
    array_push($_SESSION['product'], $form_data);
    $pro_name = "";
    $pro_rate = "";
    $pro_category = "";
    $pro_quantity = "";
    $pro_date = "";
}
// ----Amount add into wallet--------------
if (isset($_POST['amount_form'])) {
    $amount = $_POST['amount'];
    $_SESSION['amount'] = $_SESSION['amount'] + ($amount);
}
if (isset($_POST['amount_form_sub'])) {
    $amount = $_POST['amount'];
    // echo $amount;
    $_SESSION['amount'] = $_SESSION['amount'] - ($amount);
}
if (isset($_REQUEST['action']) == 'edit') {
    $index = $_REQUEST['index'];
    $_SESSION['btn'] = '<input type="submit" class="btn" value="Update" name="update" />';
}
if (isset($_POST['update'])) {
    $pro_name = $_POST['pro_name'];
    $pro_category = $_POST['pro_category'];
    $pro_rate = $_POST['pro_rate'];
    $pro_quantity = $_POST['pro_quantity'];
    $pro_date = $_POST['pro_date'];
    $_SESSION['product'][$index]['pro_name'] = $pro_name;
    $_SESSION['product'][$index]['pro_category'] = $pro_category;
    $_SESSION['product'][$index]['pro_rate'] = $pro_rate;
    $_SESSION['product'][$index]['pro_quantity'] = $pro_quantity;
    $_SESSION['product'][$index]['pro_date'] = $pro_date;
    echo "<script>alert('Updated Successfully');window.location.href='index.php';</script>";
    $_SESSION['btn'] = '<input type="submit" class="btn" value="Add" name="submit" />';
}
?>
<!-- HTML Starts here -->
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
            Product Name: <input type="text" name="pro_name" value="<?php echo $_SESSION['product'][$index]['pro_name'];
                                                                    echo $pro_name; ?>" style="margin-left:35px;" required /> <br><br>
            Category: <select name="pro_category" id="pro_category" style="margin-left:70px;">
                <option value="select">--Select--</option>
                <option value="grocery" <?php if ($_SESSION['product'][$index]['pro_category'] == 'grocery') echo 'selected'; ?>>Grocery</option>
                <option value="veggies" <?php if ($_SESSION['product'][$index]['pro_category'] == 'veggies') echo 'selected'; ?>>Veggies</option>
                <option value="travelling" <?php if ($_SESSION['product'][$index]['pro_category'] == 'travelling') echo 'selected'; ?>>Travelling</option>
                <option value="miscellaneous" <?php if ($_SESSION['product'][$index]['pro_category'] == 'miscellaneous') echo 'selected'; ?>>Miscellaneous</option>
            </select><br><br>
            Product Rate: <input type="number" name="pro_rate" min="0" required value="<?php echo  $_SESSION['product'][$index]['pro_rate'];
                                                                                        echo $pro_rate; ?>" style="margin-left:45px;" />
            <br><br>
            Product Quantity: <input type="number" min="1" name="pro_quantity" value="<?php echo  $_SESSION['product'][$index]['pro_quantity'];
                                                                                        echo $pro_quantity; ?>" style="margin-left:20px;" oninput="validity.valid||(value='');" /><br><br>
            Date: <input type="date" name="pro_date" required value="<?php echo  $_SESSION['product'][$index]['pro_date'];
                                                                        echo $pro_date; ?>" style="margin-left:100px;" /> <br><br>
            <?php echo  $_SESSION['btn']; ?>
            <br><br>
        </form>
    </div>
    <br><br>
    <form action="" method="post">
        Income: <input type="number" name="amount" min="1" required />
        <input type="submit" value="Add Income" name="amount_form"> <input type="submit" value="Sub Income" name="amount_form_sub"><a href="delete_income.php">Delete</a><br><br>
    </form>
    <b>Wallet: <?php echo $_SESSION['amount']; ?>Rs.</b><br><br><br>
    <?php include("display.php"); ?>
</body>

</html>