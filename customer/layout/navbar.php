<div class=" text-dark p-2" id = "nav">
    <div class="text-center text-dark mt-4">
        <h4 style  = "font-weight:bold; color:gold;" ><del style = "color:blue; ">Face</del>FootBook</h4>
    </div>
    <div class="text-center mb-2 mt-2">
        <img src="./../img/<?= $fetuser->img_user ?>" alt="" style = "height:80px; width:80px; object-fit:cover;" class="img-fluid rounded-circle">
    </div>
    <ul class="nav nav-pills flex-column mt-4 mt-sm-0">
        <li class="nav-item py-2 py-sm-0"><a href="index.php?menu=0" class="nav-link <?= $menu == '0' ? 'active' : '' ?>">หน้าแรก</a></li>
        <li class="nav-item py-2 py-sm-0"><a href="index.php?menu=1" class="nav-link <?= $menu == '1' ? 'active' : '' ?>">การตั้งค่า</a></li>
        <li class="nav-item py-2 py-sm-0"><a class="btn btn mt-4" id = "logout" onclick = "return logout()">ออกจากระบบ</a></li>
    </ul>
</div>
<script>
  function logout() {
        Swal.fire({
            title: 'Logout',
            text: 'You wanna logout?',
            icon: 'error',
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
            window.location.href="./../logout.php";
            }
        })
        ;
    }
</script>