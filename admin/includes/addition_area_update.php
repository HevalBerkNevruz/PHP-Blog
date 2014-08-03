<?php
    echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
    echo !defined("ADMIN") ? die("Bu Sayfaya Erişmeye Yetkiniz Yok") : null;
    $id=get("id");
    $query=query("select * from addition_area where area_id='$id'");
    if(mysql_affected_rows() < 1){
        go(URl."admin");
        exit;
    }
    $row=row($query);
?>
<article class="module width_full">
    <header><h3>İlave Alan Düzenle</h3></header>
    <?php
    if($_POST){
        $area_header=post("area_header");
        $area_type=post("area_type");
        if(!$area_header){
            echo "<h4 class='alert_error'>Gerekli Alanları Doldurmanız Gerekiyor</h4>";
        }else{
            $query=query("select area_id from addition_area where area_header='$area_header' && area_id!='$id'");
            if(mysql_affected_rows()){
                echo "<h4 class='alert_error'>Böyle Bir İlave Alan Var Gözüküyor</h4>";
            }else{
                $update=query("update addition_area set
                area_header='$area_header',
                area_type='$area_type'
                where area_id='$id'
                ");
                if($update){
                    echo "<h4 class='alert_success'>İlave Alan Başarıyla Güncellendi</h4>";
                    go(URL."/admin/index.php?do=additions",1);
                }else{
                    echo "<h4 class='alert_error'>İlave Alan Güncellenemedi</h4>";
                }
            }
        }
    }
    ?>
    <form action="" method="post">
        <div class="module_content">
            <fieldset>
                <label>Alan Başlığı</label>
                <input type="text" name="area_header" value="<?php echo stripcslashes($row["area_header"]); ?>">
            </fieldset>
            <fieldset>
                <label>Alan Tipi</label>
                <select name="area_type">
                <option value="1" <?php echo $row["area_type"] == 1 ? 'selected' : null ?>>Input</option>
                <option value="2" <?php echo $row["area_type"] == 2 ? 'selected' : null ?>>Textarea</option>
            </select>
            </fieldset>
        </div>
        <footer>
            <div class="submit_link">
                <input type="submit" value="Düzenlemeyi Bitir" class="alt_btn">
            </div>
        </footer>
        </form>
    </article>
<div class="spacer"></div>