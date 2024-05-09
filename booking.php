<?php
include "header.php";
?>
<div class="container">
    <div class="addSection">
        <h3 class="my-3 text-center">طلب سحب عينة</h3>
            <?php
            if (isset($_POST["add"])) {
                $analysis_id = $_POST["analysis_id"];
                $user_id = $_SESSION["userid"];

                $conn = mysqli_connect('localhost', 'root', 'rootroot', 'healthlab');
                $sql = "INSERT INTO `analysis_users`(`analysis_id`, `user_id`, `analysis_result`) VALUES ('$analysis_id', '$user_id', '$analysis_result')";
                if (!mysqli_query($conn, $sql)) {
                    echo "لم تتم عملية الحجز";
                } else {
                    echo "<script>window.location.href='booking.php';</script>";
                    exit;
                }
            }
            ?>
        <form autocomplete="off" action="booking.php" class="smallForm" method="post">
            <input class="form-control mb-2" list="analysis_typs" name="analysis_id" placeholder="ادخل كود الاختبار">
                    <datalist id="analysis_typs">
                        <?php
                            $conn = mysqli_connect('localhost', 'root', 'rootroot', 'healthlab');
                            $sql = "SELECT * FROM `analysis_typs`";
                            $query = mysqli_query($conn, $sql);
                            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
                        foreach ($result as $types) {
                        ?>
                            <option value="<?php echo $types["analysis_id"] ?>"><?php echo $types["analysis_name"] ?></option>
                        <?php
                        }
                        ?>
                    </datalist>
            <button name="add" class="btn btn-primary">حفظ</button>
        </form>
    </div>
</div>

<?php
include "footer.php";
?>
