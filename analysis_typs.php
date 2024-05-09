<?php
include "header.php";
?>

<?php
$uid = $_GET["uid"];
$did = $_GET["did"];

if ($uid) {
    $conn = mysqli_connect('localhost', 'root', 'rootroot', 'healthlab');
    $sql = "SELECT * FROM `analysis_typs` WHERE `analysis_id` = $uid";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);
}

if ($did) {
    $conn = mysqli_connect('localhost', 'root', 'rootroot', 'healthlab');
    $sql = "DELETE FROM `analysis_typs` WHERE `analysis_id` = $did";
    mysqli_query($conn, $sql);
}
?>
<div class="container">
    <div class="addSection">
        <h3 class="my-3 text-center">الاختبارات</h3>

        <form autocomplete="off" action="analysis_typs.php" class="smallForm" method="post">
            <input type="hidden" name="analysis_id" value="<?php echo $result["analysis_id"] ?>">
            <input value="<?php echo $result["analysis_name"] ?>" class="form-control mb-2" type="text" name="analysis_name" placeholder="ادخل اسم الاختبار">
            <input value="<?php echo $result["analysis_price"] ?>" class="form-control mb-2" type="text" name="analysis_price" placeholder="ادخل سعر الاختبار">
            <button name="<?php if ($uid) { echo 'update'; } else {  echo 'add'; } ?>" class="btn btn-primary"><?php if ($uid) { echo 'تحديث'; } else { echo 'حفظ'; } ?></button>
        </form>
    </div>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">اسم الاختبار</th>
                <th scope="col">سعر الاختبار</th>
                <th scope="col">خيارات</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $conn = mysqli_connect('localhost', 'root', 'rootroot', 'healthlab');
            $sql = "SELECT * FROM `analysis_typs`";
            $query = mysqli_query($conn, $sql);
            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
            foreach ($result as $users) {
            ?>
                <tr>
                    <td><?php echo $users["analysis_name"] ?></td>
                    <td><?php echo $users["analysis_price"] ?></td>
                    <td>
                        <a class="badge bg-success" style="text-decoration: none;" href="analysis_typs.php?uid=<?php echo $users["analysis_id"] ?>">تعديل</a>
                        <a class="badge bg-danger" style="text-decoration: none;" href="analysis_typs.php?did=<?php echo $users["analysis_id"] ?>">حذف</a>
                    </td>
                </tr>
            <?php
            }
            ?>

        </tbody>
    </table>
</div>

<?php
include "footer.php";
?>
<?php
if (isset($_POST["add"])) {
    $analysis_name = $_POST["analysis_name"];
    $analysis_price = $_POST["analysis_price"];

    $conn = mysqli_connect('localhost', 'root', 'rootroot', 'healthlab');
    $sql = "INSERT INTO `analysis_typs`(`analysis_name`, `analysis_price`) VALUES ('$analysis_name', '$analysis_price')";
    mysqli_query($conn, $sql);
    echo "<script>window.location.href='analysis_typs.php';</script>";
    exit;
}

if (isset($_POST["update"])) {
    $analysis_id = $_POST["analysis_id"];
    $analysis_name = $_POST["analysis_name"];
    $analysis_price = $_POST["analysis_price"];

    $conn = mysqli_connect('localhost', 'root', 'rootroot', 'healthlab');
    $sql = "UPDATE `analysis_typs` SET `analysis_name`= '$analysis_name' ,`analysis_price`= '$analysis_price' WHERE `analysis_id` = $analysis_id";
    mysqli_query($conn, $sql);
    echo "<script>window.location.href='analysis_typs.php';</script>";
    exit;
}
