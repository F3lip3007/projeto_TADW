<?php
    session_start();

    if (!isset($_SESSION['logado'])){
        header("Location: index.php");
    }
    // echo$_SESSION['logado'];
    // die;













?>