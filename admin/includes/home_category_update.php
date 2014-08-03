<?php
    echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
    echo !defined("ADMIN") ? die("Bu Sayfaya Erişmeye Yetkiniz Yok") : null;
    $id=get("id");
    $query=query("select * from home_category where category_id='$id'");
    $row=row($query);
?>
<article class="module width_full">
    <header><h3>Ana Kategorileri Düzenle</h3></header>
    <?php
    if($_POST){
        $category_name=post("category_name");
        $category_link=sef_link($category_name);
        $category_desc=post("category_desc");
        $category_keywords=post("category_keywords");
        $category_homepage_subject=post("category_homepage_subject");
        $category_full_subject=post("category_full_subject");

        if(!$category_name){
            echo "<h4 class='alert_error'>Kategori Adı Girmelisiniz</h4>";
        }else{
            $is_categorylink=query("select * from home_category where category_link='$category_link' && category_id!='$id'");
            if(mysql_affected_rows()){
                echo "<h4 class='alert_error'><strong>'.stripcslashes($category_name).'</strong> Adında Bir Kategori Zaten Mevcut</h4>";
            }else{
                $update=query("update home_category set
                category_name='$category_name',
                category_link='$category_link',
                category_desc='$category_desc',
                category_keywords='$category_keywords',
                category_homepage_subject='$category_homepage_subject',
                category_full_subject='$category_full_subject'
                where category_id='$id'
                ");
            }
            if($update){
                echo "<h4 class='alert_success'>Kategori Başarıyla Güncellendi</h4>";
                go(URL."/admin/index.php?do=/home_categories&id=".$row["category_id"],1);
            }else{
                echo "<h4 class='alert_error'>Kategori Güncellenemedi</h4>";
            }
        }

    }
    ?>
    <form action="" method="post">
        <div class="module_content">
            <fieldset>
                <label>Kategori Adı</label>
                <input type="text" name="category_name" value="<?php echo stripcslashes($row["category_name"]); ?>">
            </fieldset>
            <fieldset>
                <label>Kategori Açıklaması</label>
                <input type="text" name="category_desc" value="<?php echo stripcslashes($row["category_desc"]); ?>">
            </fieldset>
            <fieldset>
                <label>Kategori Keywords</label>
                <textarea rows="5" name="category_keywords"><?php echo stripcslashes($row["category_keywords"]); ?></textarea>
            </fieldset>
            <fieldset>
                <label>Kategori Anasayfa Konu (.php)</label>
                <input type="text" name="category_homepage_subject" value="<?php echo stripcslashes($row["category_homepage_subject"]); ?>">
            </fieldset>
            <fieldset>
                <label>Kategori Full Konu (.php)</label>
                <input type="text" name="category_full_subject" value="<?php echo stripcslashes($row["category_full_subject"]); ?>">
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