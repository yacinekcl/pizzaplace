<?php
session_start();

header('Content-Type: application/json');

if (isset($_POST['id']) && isset($_POST['qte'])) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $found = false;

    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $_POST['id']) {
            $item['qte'] += 1; // Ou: $item['qte'] += $_POST['qte'];
            $found = true;
            break;
        }
    }
    unset($item); // Pour éviter tout bug de référence

    if (!$found) {
        $_SESSION['cart'][] = [
            'id' => $_POST['id'],
            'qte' => $_POST['qte']
        ];
    }

    echo json_encode([
        'status' => 'success',
        'cart' => $_SESSION['cart']
    ]);
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Missing id or qte'
    ]);
}
?>
