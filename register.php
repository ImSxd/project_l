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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Document</title>
</head>
<style>
body {
    background-image: linear-gradient(to right, #0721FF, #0770FF, #079DFF);
}

.font-logo {
    text-transform: uppercase;
    color: #2C5FFF;
}

#login {
    background-color: #00FF55;
    color: white;
    font-weight: bold;
    text-transform: capitalize;
}

#login:hover {
    background-color: #9EFF00;
    color: black;
    font-weight: bold;
    text-transform: capitalize;
}

#sign {
    color: #0770FF;
    font-weight: bold;
    text-decoration: none;
}

#sign:hover {
    color: #6388FB;
    font-weight: bold;
    text-decoration: none;
}
</style>

<body>
    <div class="container text-center">
        <div class="" style="height:50px;"></div>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="card border border-3" style="border-radius:10px;">
                    <div class="card-body">
                        <p class="fs-3 fw-bold font-logo">Sign Up</p>
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="text" name="username" id="" class="form-control border border-1 mb-2"
                                placeholder="Username" required>
                            <input type="password" name="password1" id="" class="form-control border border-1 mb-2"
                                placeholder="Password" required>
                            <input type="password" name="password2" id="" class="form-control border border-1 mb-2"
                                placeholder="Confrim password" required>
                            <input type="text" name="fname" id="" class="form-control border border-1 mb-2"
                                placeholder="First Name" required>
                            <input type="text" name="lname" id="" class="form-control border border-1 mb-2"
                                placeholder="Last Name" required>
                            <input type="email" name="email" id="" class="form-control border border-1 mb-2"
                                placeholder="Email@Email.com" required>
                            <input type="file" name="img" id="" class="form-control border border-1 mb-3">
                            <div class="mb-1" align="center">
                                <input type="submit" value="Sign Up" name="login" class="btn btn" id="login">
                            </div>
                        </form>
                        <hr>
                        <p align="left">If You has account <label id="sign" onclick="confirmsignup()">Login</label></p>
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
        title: 'Login',
        text: 'You have your own account?',
        icon: 'question',
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
        confirmButtonText: "Go",
        showCloseButton: true,
        showCancelButton: true,

    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "index.php";
        }
    });
}

function wrongpassword() {
    Swal.fire({
        title: 'Password',
        text: 'Pless Confirm your password Again !',
        icon: 'error',
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
        confirmButtonText: "Go",
        showCloseButton: true,
        showCancelButton: true,

    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "index.php";
        }
    });
}
</script>
<?php 
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $file = $_FILES['img'];
    if($file['name'] != ''){
        $fileN = $db->uploadfile($file);
    }else{
        $fileN = "default.png";
    }
    if($password1 != $password2){ 
        echo '<script type="text/javascript">sweetAlert("Warning !","Please Confirm Your Password again","warning")</script>';
    }else{
        $list = [
            'username_user' => $username,
            'password_user' => $password1,
            'fname_user' => $fname,
            'lname_user' => $lname,
            'email_user' => $email,
            'img_user' => $fileN,
            'type_user' => 2
        ];
        $rowinsert = $db->insertwhere("user",$list,"(SELECT * FROM user WHERE username_user = '$username')");
        if($rowinsert > 0){
            echo '<script type="text/javascript">sweetAlert("Successfully !","Sign Up successfully","success")</script>';
        }else{
            echo '<script type="text/javascript">sweetAlert("ERROR !","This username already used Please try again","error")</script>';
        }
    }
}
?>