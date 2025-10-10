<?php
session_start();

if (!isset($_SESSION['usuario']) && !isset($_SESSION['senha'])) {
    $_SESSION['usuario'] = $_POST['usuario'];
    $_SESSION['senha'] = $_POST['senha'];
} else {
    echo "Sessão já iniciada";
    echo '<a href="login.html">Login</a>';
}