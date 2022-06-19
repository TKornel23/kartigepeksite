<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if(!isset($_SESSION["admin"]))
    {
        header('Location: login.php');
    }

    
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Library: DataTable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    
    <!-- Library: font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Library: toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css">
    
    <title>Admin | Dashboard</title>
    <style>
        html {
            position: relative;
            min-height: 100%;
        }
        body {
            margin: 0 0 100px; /* bottom = footer height */
        }
        footer {
            position: absolute;
            left: 0;
            bottom: 0;
            height: 50px;
            width: 100%;
        }
    </style>
</head>

<body>  
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="assets/images/admin_img/pic-4.png" width="30" height="30" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?=($_PAGE == 'Home' ? 'active' : "")?>">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item <?=($_PAGE == 'Account' ? 'active' : "")?>">
                    <a class="nav-link" href="account.php">Change Password</a>
                </li>
            </ul>
            <a href="logout.php" class="btn btn-sm btn-danger">Logout</a>
            
        </div>
    </nav>