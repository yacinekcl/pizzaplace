<?php
session_start();

header('cotent-type: application/json');

echo json_encode($_SESSION['cart']);


?>