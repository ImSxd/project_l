<?php
session_start();
include_once('./database.php');
$db = new db();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
    <script src="bootstrap/js/bootstrap.esm.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Document</title>
</head>
<style>
    body{
        background-image:linear-gradient(to right,#0721FF,#0770FF,#079DFF);
    }
    .font-logo{
        text-transform: uppercase;
        color:#2C5FFF;
    }
    #login{
        background-color:#0770FF;
        color:white;
        font-weight:bold;
        text-transform: capitalize;
    }
    #login:hover{
        background-color:#6388FB;
        color:black;
        font-weight:bold;
        text-transform: capitalize;
    }
    #sign{
        color:#00FF55;
        font-weight:bold;
        text-decoration:none;
    }
    #sign:hover{
        color:#9EFF00;
        font-weight:bold;
        text-decoration:none;
    }
</style>
<body>
<div class="container text-center">
    <div class="" style = "height:100px;"></div>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <div class="card border border-3" style = "border-radius:10px;">
                <div class="card-body">
                    <img src="img/logo/logo1.png" style = "width:10rem;" alt="" class="img-fluid">
                    <p class="fs-3 fw-bold font-logo">Login</p>
                    <form action="" method="post">
                        <input type="text" name="username" id="" class="form-control border border-1 mb-2" placeholder = "username" required>
                        <input type="password" name="password" id="" class="form-control border border-1 mb-3" placeholder = "password" required>
                        <div class="mb-1" align = "center">
                            <input type="submit" value="Login" name = "login" class = "btn btn" id = "login">
                        </div>
                    </form>
                    <hr>
                    <p align = "left">Create your account <label id = "sign" onclick = "confirmsignup()">Sign Up</label></p>
                </div>
            </div>
        </div>
        <div class="col-4"></div>
    </div>
</div>
</body>
</html>
<script>
    // Function to open SweetAlert2 modal
    function confirmsignup() {
        Swal.fire({
            title: 'Sign Up',
            text: 'You want to create your account?',
            icon: 'question',
            confirmButtonText: "Go",
            showClass: {
                popup: `
                animate__animated
                animate__fadeInUp
                animate__faster
                `
            },
            hideClass: {
                popup: `
                animate__animated
                animate__fadeOutDown
                animate__faster
                `
            },
            showCloseButton: true,
            showCancelButton: true,
            
        }).then((result) => {
            if (result.isConfirmed) {
            window.location.href="register.php";
            }
        })
        ;
        
    }
</script>
<?php
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = $db->select("user","*","WHERE username_user = '$username' AND password_user = '$password'");
    if($result->num_rows > 0){
        $fetch = $result->fetch_object();
        if($fetch->type_user == 1){
            $_SESSION['userid'] = $fetch->id_user;
            $_SESSION['usertype'] = 'admin';
            header('location:./admin/index.php');
        }else{
            $_SESSION['userid'] = $fetch->id_user;
            $_SESSION['usertype'] = 'customer';
            header('location:./customer/index.php');
        }
    }else{
        echo '<script type="text/javascript">sweetAlert("ERROR !","Username OR Password was wrong","error")</script>';
    }
}
if(isset($_GET['logout']) == 'true'){
    echo '<script type="text/javascript">sweetAlert("Logout !","Logout Successfully!","error")</script>';
}else{
    return;
}

?>