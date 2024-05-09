<?php
include "header.php";
?>

<div class="container">
    <h1 class="text-center py-3">نتائج الاختبارات</h1>
    <div class="user_ditails pb-4">
        <div class="info_group">
            <b>الاسم:</b> <span><?php echo $_SESSION["username"]; ?></span>
        </div>
        <div class="info_group">
            <b>رقم الهاتف:</b> <span><?php echo $_SESSION["userphone"]; ?></span>
        </div>
        <div class="info_group">
            <b>العنوان:</b> <span><?php echo $_SESSION["useraddress"]; ?></span>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">كود الأختبار</th>
                <th scope="col">اسم الأختبار</th>
                <th scope="col">النتيجة</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $conn = mysqli_connect('localhost', 'root', 'rootroot', 'healthlab');
            $user_id = $_SESSION["userid"];
            $sql = "SELECT au.`analysis_users_id`, au.`analysis_id`,  a.`analysis_name`, u.`user_name`, au.`analysis_result` FROM `analysis_users` au INNER JOIN `users` u ON au.`user_id` = u.`user_id` INNER JOIN `analysis_typs` a ON a.`analysis_id` = au.`analysis_id` WHERE u.`user_id` = $user_id";
            $query = mysqli_query($conn, $sql);
            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
            if (!$result) {
                ?>
                <tr>
                    <td class="text-center" colspan="3">لا يوجد تحاليل</td>
                </tr>
                <?php
            } else {
            foreach ($result as $users) {
            ?>
                <tr>
                    <td><?php echo $users["analysis_id"] ?></td>
                    <td><?php echo $users["analysis_name"] ?></td>
                    <td><?php echo $users["analysis_result"] ?></td>
                </tr>
            <?php
            }
        }
            ?>

        </tbody>
    </table>
</div>

<?php
include "footer.php";
?>