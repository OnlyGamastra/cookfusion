<?php
    session_start();
    session_destroy();
    header('location: http://localhost/COOKFUSION%20V2/index.php');
    exit;
    ?>