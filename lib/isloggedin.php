<?php
function isloggedin()
{
    if (isset($_SESSION['cus_info'])) {
        return true;
    }
    return false;
}
