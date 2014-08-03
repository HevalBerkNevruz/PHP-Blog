<?php
    echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
    echo !defined("ADMIN") ? die("Bu Sayfaya Erişmeye Yetkiniz Yok") : null;
?>
<article class="module width_full">
    <header><h3>İlave Alan Ekle</h3></header>
    <?php
    if($_POST){
        $area_header=post("area_header");
        $area_type=post("area_type");
        if(!$area_header){
            echo "<h4 class='alert_error'>Gerekli Alanları Doldurmanız Gerekiyor</h4>";
        }else{
            $query=query("select area_id from addition_area where area_header='$area_header'");
            if(mysql_affected_rows()){
                echo "<h4 class='alert_error'>Böyle Bir İlave Alan Var Gözüküyor</h4>";
            }else{
                $insert=query("insert into addition_area set
                area_header='$area_header',
                area_type='$area_type'
                ");
                if($insert){
                    echo "<h4 class='alert_success'>İlave Alan Başarıyla Eklendi</h4>";
                    go(URL."/admin/index.php?do=additions",1);
                }else{
                    echo "<h4 class='alert_error'>İlave Alan Eklenemedi</h4>";
                }
            }
        }
    }
    ?>
    <form action="" method="post">
        <div class="module_content">
            <fieldset>
                <label>Alan Başlığı</label>
                <input type="text" name="area_header">
            </fieldset>
            <fieldset>
                <label>Alan Tipi</label>
                <select name="area_type">
                <option value="1" selected>Input</option>
                <option value="2">Textarea</option>
            </select>
            </fieldset>
        </div>
        <footer>
            <div class="submit_link">
                <input type="submit" value="İlave Alan Ekle" class="alt_btn">
            </div>
        </footer>
        </form>
    </article>
<div class="spacer"></div>