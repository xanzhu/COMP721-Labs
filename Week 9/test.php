<?php
session_start();

$action = $_GET["action"];
$isbn = $_GET["isbn"];

if (array_key_exists("Cart", $_SESSION)) {
    $cart = $_SESSION["Cart"];

    if ($action == "Add") {
        if (isset($cart[$isbn])) {
            $cart[$isbn] += 1;
        } else {
            $cart[$isbn] = 1;
        }
    } else if ($action == "Remove") {
        if (isset($cart[$isbn])) {
            $cart[$isbn] -= 1;
            if ($cart[$isbn] <= 0) {
                unset($cart[$isbn]);
            }
        }
    }
} else {
    $cart = [$isbn => 1];
}

$_SESSION["Cart"] = $cart;

if (empty($cart)) {
    unset($_SESSION["Cart"]);
    echo json_encode(null);
} else {
    echo json_encode($cart, JSON_PRETTY_PRINT);
}
?>
