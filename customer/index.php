<?php
session_start();
include('./../database.php');
$db = new db();
$db->checklogin();
$userid = $_SESSION['userid'];
$user = new db();
$resultuser = $user->select("user","*","WHERE id_user = $userid");
$fetuser = $resultuser->fetch_object();
if(isset($_GET['menu'])){
    $menu = $_GET['menu'];
}else{
    $menu = '0';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <script src="../bootstrap/js/bootstrap.js"></script>
    <script src="../bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../bootstrap/js/bootstrap.esm.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Document</title>
</head>
<style>
    #logout{
        background-color:salmon;
        border-radius:10px;
        font-weight:bold;
        color:white;
    }
    #logout:hover{
        background-color:tomato;
        border-radius:10px;
        font-weight:bold;
        color:black;
    }
</style>
<body>
    <div class="container-fluid" >
        <div class="row flex-nowrap" style = "height:100vh;">
            <div class="d-none d-md-block bg-light text-dark col-1 col-md-3 col-lg-2 d-flex d-column justify-content-between" >
                <?php include_once('./layout/navbar.php') ?>
            </div>
            <div class="col-11 col-md-9 col-lg-10" style = " background-color:#f0f0f0">
                <?php include_once('./layout/menu.php') ?>
            </div>
        </div>
    </div>
</body>
</html>