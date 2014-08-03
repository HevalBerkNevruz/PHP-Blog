<?php
    echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
    echo !defined("ADMIN") ? die("Bu Sayfaya Erişmeye Yetkiniz Yok") : null;
?>
<article class="module width_full">
    <header><h3>Kategori Sil</h3></header>
    <?php
            $id=get("id");
            $delete=query("delete from category where category_id='$id'");
            if($delete){
                echo "<h4 class='alert_success'>Kategori Başarıyla Silindi</h4>";
                go(URL."/admin/index.php?do=categories",1);
            }else{
                echo "<h4 class='alert_error'>Kategori Silinemedi</h4>";
            }
    ?>
    </article>
<div class="spacer"></div>