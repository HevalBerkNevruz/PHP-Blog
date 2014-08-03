<?php
    echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
    echo !defined("ADMIN") ? die("Bu Sayfaya Erişmeye Yetkiniz Yok") : null;
?>
<?php
    $id=get("id");
    $query=query("select * from content where content_id='$id'");
    if(mysql_affected_rows() < 1){
        go(URL."/admin");
        exit;
    }
    $row=row($query);
    $content=explode("----------------------------",$row["content_statement"]);
?>
<article class="module width_full">
    <header><h3>İçerik Düzenle</h3></header>
    <?php
    if($_POST){
        $content_header=post("content_header");
        $content_link=sef_link($content_header);
        $content_category=post("content_category");
        $content_homepage_statement=post("content_homepage_statement");
        $content_full_statement=post("content_full_statement");
        $content_statement=$content_homepage_statement."----------------------------".$content_full_statement;
        $content_label=post("content_label");
        $content_approve=post("content_approve");
        $content_homepage=post("content_homepage");
        $content_author="heval";
        if(!$content_header || !$content_full_statement || !$content_homepage_statement){
            echo "<h4 class='alert_error'>Gerekli Alanları Doldurmanız Gerekiyor</h4>";
        }else{
            $is_content=query("select * from content where content_link='$content_link' && content_id!='$id'");
            if(mysql_affected_rows()){
                echo "<h4 class='alert_error'><strong>$content_header</strong> adlı konu zaten bulunuyor</h4>";
            }else{
                $update=query("update content set
                content_header='$content_header',
                content_link='$content_header',
                content_category='$content_category',
                content_statement='$content_statement',
                content_label='$content_label',
                content_approve='$content_approve',
                content_author='$content_author',
                content_homepage='$content_homepage' where content_id='$row[content_id]' ");
                if($update){
                    echo "<h4 class='alert_success'>İçerik Başarıyla Güncellendi</h4>";
                    go(URL."/admin/index.php?do=contents",1);
                }else{
                    echo "<h4 class='alert_error'>İçerik Güncellenemedi</h4>";
                }
            }
        }
    }
    ?>
    <form action="" method="post">
        <div class="module_content">
            <fieldset>
                <label>İçerik Başlığı</label>
                <input type="text" name="content_header" value="<?php echo stripcslashes($row["content_header"]); ?>">
            </fieldset>
            <fieldset>
                <label>İçerik Kategorisi</label>
                <select name="content_category">
                    <option value="0">Anasayfa</option>
                    <?php
                        $category_query=query("select * from category order by category_name asc");
                        while($category_row=row($category_query)){
                            echo '<option';
                            echo $category_row["category_id"] == $category_row["content_category"] ? ' selected ' : null;
                            echo ' value="'.$category_row["category_id"].'">'.stripcslashes($category_row["category_name"]).'</option>';
                        }
                    ?>
                </select>
            </fieldset>
            <fieldset>
                <label>İçerik Anasayfa Açıklaması</label>
                <textarea rows="5" name="content_homepage_statement"><?php echo stripcslashes($content[0]); ?></textarea>
            </fieldset>
            <fieldset>
                <label>İçerik Full Açıklaması</label>
                <textarea rows="10" name="content_full_statement"><?php echo stripcslashes($content[1]); ?></textarea>
            </fieldset>
            <fieldset>
                <label>Konu Etiketleri</label>
                <input type="text" name="content_label" value="<?php echo stripcslashes($row["content_label"]); ?>">
            </fieldset>
            <fieldset>
                <label>Konu Onayı</label>
                <select name="content_approve">
                <option value="1" <?php echo $row["content_approve"] == 1 ? 'selected ' : null ?>>Onaylı</option>
                <option value="0" <?php echo $row["content_approve"] == 0 ? 'selected ' : null ?>>Onaylı Değil</option>
            </select>
            </fieldset>
            <fieldset>
                <label>Anasayfada Gözüksün Mü</label>
                <select name="content_homepage">
                <option value="1" <?php echo $row["content_homepage"] == 1 ? 'selected ' : null ?>>Evet</option>
                <option value="0" <?php echo $row["content_homepage"] == 0 ? 'selected ' : null ?>>Hayır</option>
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