<?php
session_start();

header('cotent-type: application/json');
if (isset($_POST['id']) && isset($_POST['qte'])) {
    if (!$_SESSION['cart']) {
        $_SESSION['cart'] = [];
    }
    foreach ($_SESSION['cart'] as $p) {
        if ($p['id'] == $_POST['id'])
            $p['qte'] = $_POST['qte'];
    }
    $_SESSION['cart'][] = ['id' => $_POST['id'], 'qte' => $_POST['qte']];
}
?>