<?php

if (empty($_SESSION['FCN'])) {
    echo "<script>window.location='../index.php';</script>";
    exit;
}

if (isset($_SESSION['FCN'])) {
    if ($_SESSION['FCN']["TIME"] < time()) {
        unset($_SESSION['FCN']);
        echo "<script>window.location='../index.php';</script>";
        exit;
    } else {
        $_SESSION['FCN']["TIME"] = time() + 900;
    }
} else {
    unset($_SESSION['FCN']);
    echo "<script>window.location='../index.php';</script>";
    exit;
}

if (filter_input(INPUT_GET, 'display')) {
    $display = filter_input(INPUT_GET, 'display') . '.php';
} else {
    $display = 'default.php';
}

if (file_exists($display)) {
    require $display;
} else {
    require 'default.php';
}