<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" ,initial-scale=1">
    <title>News demo Fotoart</title>
    <link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src='tinymce/tinymce.min.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.19.1/ui/trumbowyg.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

</head>

<body>

    <header class="d-flex flex-wrap justify-content-center py-3 border-bottom fs-4 bi me-2">
        <span class="fs-4">News-FA</span>
    </header>

    <div class="nav nav-pills d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <li class="nav-item">
            <a href="index.php" class="nav-link">News list</a>
        </li>
        <li class="nav-item">
            <a href="../home.php" class="nav-link">Back to Celery</a>
        </li>
        <?php
    if (!isset($_SESSION['username'])) {
        echo "<li class='nav-item'> <a href='login.php' class='nav-link' >Login</a></li>";
    } else {
        echo "<li class='nav-item'> <a href='new.php' class='nav-link'>New Post</a></li>";
        echo "<li class='nav-item'> <a href='admin.php' class='nav-link'>Admin Panel</a></li>";
    }
    ?>
    </div>
    <br>