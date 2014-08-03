<?php
    echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
    echo !defined("ADMIN") ? die("Bu Sayfaya Erişmeye Yetkiniz Yok") : null;
?>
<article class="module width_full">
    <header><h3>İlave Alan Sil</h3></header>
    <?php
            $id=get("id");
            $delete=query("delete from addition_area where area_id='$id'");
            if($delete){
                echo "<h4 class='alert_success'>İlave Başarıyla Silindi</h4>";
                go(URL."/admin/index.php?do=additions",1);
            }else{
                echo "<h4 class='alert_error'>İlave Alan Silinemedi</h4>";
            }
    ?>
    </article>
<div class="spacer"></div>