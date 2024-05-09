<?php
include "header.php";
?>

<section class="intro" id="intro">
    <div class="container">
        <div class="row text-center py-5">
            <div class="col-md-4 intro_logo">
                <img class="gif" src="img/experiment.gif">
            </div>
            <div class="col-md-8 text-end">
                <h1 class="mb-4 text-center">معمل Health Lab</h1>
                <p>
                    يعتبر موقع (Health Lap ) يوفر خدمات معملية موثوق بها و مناسبة في الوقت و التكاليف للمريض و يساعد الموقع في تقديم خدمات طبية فائقة الجودة للمشاركة في تحسين الصحه العامه في المجتمع من خلال توفير الخدمات الطبية المعمليه المتطورة و استخدام التقنيات الحديثه للمساعدة في الكشف المبكر عن الامراض لمنع حدوثها و للتعامل مع الامراض المزمنة مع الوضع في الاعتبار سرعة تقديم الخدمات في الوقت المطلوب و أهمهم الحالات الحرجه بتكاليف مناسبة
                </p>
                    <?php
                    if ($_SESSION["username"] != null || $_SESSION["username"] != '' || $_SESSION["username"]) { ?>
                        <a class="btn btn-warning" href="booking.php">سحب العينة من المنزل</a>
                    <?php } else { ?>
                        <div class="alert alert-success" role="alert">
                        الان يمكنك سحب العينه من المنزل عند التسجيل في الموقع ! <a href="register.php"> سجل الان</a>
                        </div>
                        <?php } ?>
            </div>
        </div>
    </div>
</section>

<section class="whyUs" id="whyUs">
    <div class="container">
        <div class="row text-center py-5">
            <div class="col-md-8 text-end">
                <h1 class="mb-4 text-center">لماذا نحن</h1>
                <div class="row">
                    <div class="col-md-6 services"><ul><li>معامل معتمدة</li></ul></div>
                    <div class="col-md-6 services"><ul><li>أسعار تنافسية</li></ul></div>
                    <div class="col-md-6 services"><ul><li>دقة نتائج محكمة</li></ul></div>
                    <div class="col-md-6 services"><ul><li>خصوصية الخدمة</li></ul></div>
                    <div class="col-md-6 services"><ul><li>اخصائين ذوى خبره متميزين</li></ul></div>
                    <div class="col-md-6 services"><ul><li>تعدد الخدمات والتحاليل الطبية</li></ul></div>
                    <div class="col-md-6 services"><ul><li>الحرص والعناية مع كل عينة</li></ul></div>
                    <div class="col-md-6 services"><ul><li>نتبع نظام ادارة تنظيمي كامل</li></ul></div>
                </div>
            </div>
            <div class="col-md-4 whyUs_logo">
                <img class="gif" src="img/question-mark.png">
            </div>
        </div>
    </div>
</section>


<section class="services" id="services">
    <div class="container">
        <div class="row py-5">
            <h1 class="mb-4 text-center">قائمة الأختبارات</h1>
            <?php
                $conn = mysqli_connect('localhost', 'root', 'rootroot', 'healthlab');
                $sql = "SELECT * FROM `analysis_typs`";
                $query = mysqli_query($conn, $sql);
                $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
                foreach ($result as $analysis_typs) {
            ?>
                    <div class="col-md-6 services"><ul><li><?php echo $analysis_typs["analysis_name"] ;?></li></ul></div>
            <?php
                }
            ?>
        </div>
    </div>
</section>


<?php
include "footer.php";
?>