<?php
session_start();
$index=$_REQUEST['index'];
// echo $index;
array_splice($_SESSION['product'],$index,1);
echo '<script>alert("Product Removed Successfully");
window.location.href="index.php";
</script>';

?>