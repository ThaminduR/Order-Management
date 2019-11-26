<?php
//session_start();
require_once("dbconnection.php");

function ShowProducts($subcat)
{
    $conn = DBConnection::connectDB();
    $sql = "SELECT * FROM (tbl_product JOIN  tbl_pro_images ON tbl_product.prod_id=tbl_pro_images.prod_id) JOIN tbl_prod_details ON tbl_pro_images.prod_id=tbl_prod_details.prod_id WHERE tbl_prod_details.sub_cat_id='$subcat';";
    $result = $conn->query($sql);

    if ($conn->errno) {
        echo ("SQL Error : " . $conn->error);
        exit;
    }

    $output = "<table border=0 cellpadding='10px' cellspacing='10px'>";
    $i = 0;
    while ($rec = $result->fetch_assoc()) {
        
        $product_qty = $rec['prod_qty'];
        if ($i == 0)
            $output .= "<tr>";
        $output .= "<td>";
        $output .= $rec['prod_name'] . "<br>";
        $path = "../Stylish/image/" . $rec["cat_id"] . "/" . $rec["prod_id"] . "/" . $rec["img_name"];
        $output .= "<img src='$path' width='400' height='400' alt='" . $rec["prod_name"] . "'/>";
        $output .= "<br>Qty:<input type='number' id='" . $rec['prod_id'] . "qty' min='1' max='" . $product_qty . "' value='1' length='2'/>";
        $output .= "<br/>";
        if ($product_qty != 0) {
            $output .= "<br><button type='button' onclick=\"addCartItem('" . $rec['prod_id'] . "')\" class='btn btn-success'>Add to cart</button>";
            $output .= "<br/>";
            $output .= "<br><button type='button' onclick=\"addWishItem('" . $rec['prod_id'] . "')\" class='btn'>Add to Wishlist</button>";
        }
        $output .= "</td>";
        $i++;
        if ($i == 2) {
            $output .= "</tr>";
            $i = 0;
        }
    }
    if ($i != 0)
        $output .= "</tr>";
    $output .= "</table>";
    $conn->close();
    return $output;
}
