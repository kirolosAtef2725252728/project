<?php
include "header.php";
?>

<div class="container">
    <div class="row">
        <div class="smallForm">
            <h3 class="page_title mb-2">عضو جديد</h3>
            <?php
            if (isset($_POST["register"])) {
                $user_name = $_POST["user_name"];
                $user_password = $_POST["user_password"];
                $user_address = $_POST["user_address"];
                $user_phone = $_POST["user_phone"];
            
                $conn = mysqli_connect("localhost", "root", "rootroot", "healthlab");
                $reg_sql = "INSERT INTO `users` (`user_name`, `user_password`, `user_address`, `user_phone`, `user_level`) VALUES ('$user_name', '$user_password', '$user_address', '$user_phone', '2')";
                if (!mysqli_query($conn, $reg_sql)) {
                    echo "لم يتم تسجيل العضوية";
                } else {
                    echo "تم تسجيل العضو بنجاح";
                }
            
            }
            ?>
            <form action="register.php" method="post">
                <input class="form-control mb-2" type="text" name="user_name" placeholder="اسم المستخدم">
                <input class="form-control mb-2" type="password" name="user_password" placeholder="كلمة المرور">
                <input class="form-control mb-2" type="text" name="user_address" placeholder="العنوان">
                <input class="form-control mb-2" type="text" name="user_phone" placeholder="رقم الهاتف">
                <button class="btn btn-primary" name="register" type="submit">حفظ</button>
            </form>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>