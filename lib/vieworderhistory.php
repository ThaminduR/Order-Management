
<?php
require_once("dbconnection.php");

function getOrder()
{
    $conn = DB::connectDB();

    $sql = "SELECT order_id, order_dot,cus_id,deliver_person_id,track_status FROM (tbl_order NATURAL JOIN tbl_delivery) JOIN tbl_order_track USING(deli_id);";
    $result = $conn->query($sql);
    $output = "<tr value='order_id'></tr>";
    $rows = $result->num_rows;
    if ($rows > 0) {
        while ($rec = $result->fetch_assoc()) {
            $output .= "<tr><td>" . $rec["order_id"] . "</td><td>" . $rec["order_dot"] . "</td><td>" . $rec["cus_id"] . "</td><td>" . $rec["deliver_person_id"] . "</td><td>" . $rec["track_status"] . "</td></tr>";
        }


        echo $output;
        $conn->close();
    }
}
