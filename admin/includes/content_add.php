<?php
    echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
    echo !defined("ADMIN") ? die("Bu Sayfaya Erişmeye Yetkiniz Yok") : null;
?>
<article class="module width_full">
    <header><h3>İçerik Ekle</h3></header>
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
            $is_content=query("select * from content where content_link='$content_link'");
            if(mysql_affected_rows()){
                echo "<h4 class='alert_error'><strong>$content_header</strong> adlı konu zaten bulunuyor</h4>";
            }else{
                $insert=query("insert into content set
                content_header='$content_header',
                content_link='$content_header',
                content_category='$content_category',
                content_statement='$content_statement',
                content_label='$content_label',
                content_approve='$content_approve',
                content_author='$content_author',
                content_homepage='$content_homepage'");
                if($insert){
                    echo "<h4 class='alert_success'>İçerik Başarıyla Eklendi</h4>";
                    go(URL."/admin/index.php?do=contents",1);
                }else{
                    echo "<h4 class='alert_error'>İçerik Eklenemedi</h4>";
                }
            }
        }
    }
    ?>
    <form action="" method="post">
        <div class="module_content">
            <fieldset>
                <label>İçerik Başlığı</label>
                <input type="text" name="content_header">
            </fieldset>
            <fieldset>
                <label>İçerik Kategorisi</label>
                <select name="content_category">
                    <?php
                        $category_query=query("select * from category order by category_name asc");
                        while($category_row=row($category_query)){
                            echo '<option value="'.$category_row["category_id"].'">'.stripcslashes($category_row["category_name"]).'</option>';
                        }
                    ?>
                </select>
            </fieldset>
            <fieldset>
                <label>İçerik Anasayfa Açıklaması</label>
                <textarea rows="5" name="content_homepage_statement"></textarea>
            </fieldset>
            <fieldset>
                <label>İçerik Full Açıklaması</label>
                <textarea rows="10" name="content_full_statement"></textarea>
            </fieldset>
            <fieldset>
                <label>Konu Etiketleri</label>
                <input type="text" name="content_label">
            </fieldset>
            <fieldset>
                <label>Konu Onayı</label>
                <select name="content_approve">
                <option value="1" selected>Onaylı</option>
                <option value="0">Onaylı Değil</option>
            </select>
            </fieldset>
            <fieldset>
                <label>Anasayfada Gözüksün Mü</label>
                <select name="content_homepage">
                <option value="1" selected>Evet</option>
                <option value="0">Hayır</option>
                </select>
            </fieldset>
        </div>
        <footer>
            <div class="submit_link">
                <input type="submit" value="İçerik Ekle" class="alt_btn">
            </div>
        </footer>
        </form>
    </article>
<div class="spacer"></div>