<?php
    echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
    echo !defined("ADMIN") ? die("Bu Sayfaya Erişmeye Yetkiniz Yok") : null;
    $query=query("select * from adjustment");
    $row=row($query);
?>
<article class="module width_full">
    <header><h3>Genel Ayarlar</h3></header>
    <?php
    if($_POST){
        $url=post("url");
        $header=post("header");
        $desc=post("desc");
        $keywords=post("keywords");
        $state=post("state");

        if(!$url || !$header){
            echo "<h4 class='alert_error'>Gerekli Alanları Doldurmanız Gerekiyor</h4>";
        }else{
            $update=query("update adjustment set
            url='$url',
            header='$header',
            descr='$desc',
            keywords='$keywords',
            state='$state'");

            if($update){
                echo "<h4 class='alert_success'>Ayarlar Başarıyla Güncellendi</h4>";
                go(URL."/admin/index.php?do=".get("do"),1);
            }else{
                echo "<h4 class='alert_error'>Ayarlar Güncellenirken Bir Sorun Oluştu</h4>";
            }
        }
    }
    ?>
    <form action="" method="post">
        <div class="module_content">
            <fieldset>
                <label>URL</label>
                <input type="text" name="url" value="<?php echo $row["url"]; ?>">
            </fieldset>
            <fieldset>
                <label>HEADER</label>
                <input type="text" name="header" value="<?php echo stripcslashes($row["header"]); ?>">
            </fieldset>
            <fieldset>
                <label>SİTE AÇIKLAMASI</label>
                <textarea rows="5" name="desc"><?php echo stripcslashes($row["descr"]); ?></textarea>
            </fieldset>
            <fieldset>
                <label>SİTE KEYWORDS</label>
                <textarea rows="5" name="keywords"><?php echo stripcslashes($row["keywords"]); ?></textarea>
            </fieldset>
            <fieldset> <!-- to make two field float next to one another, adjust values accordingly -->
                <label>SİTE DURUMU</label>
                <select name="state">
                    <option value="1" <?php echo $row['state'] ? 'selected' : null  ?>>Online</option>
                    <option value="0" <?php echo !$row['state'] ? 'selected' : null  ?>>Offline</option>
                </select>
            </fieldset>
        </div>
        <footer>
            <div class="submit_link">
                <input type="submit" value="Ayarları Güncelle" class="alt_btn">
            </div>
        </footer>
    </form>
</article><!-- end of post new article -->
<div class="spacer"></div>