<?php
    echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
    echo !defined("ADMIN") ? die("Bu Sayfaya Erişmeye Yetkiniz Yok") : null;
?>
<?php
    $id=get("id");
    $query=query("select * from comment where comment_id='$id'");
    if(mysql_affected_rows() < 1){
        go(URL."/admin");
        exit;
    }
    $row=row($query);
    $content=$row["comment_content"];
?>
<article class="module width_full">
    <header><h3>Yorum Düzenle</h3></header>
    <?php
    if($_POST){
        $comment_author=post("comment_author");
        $comment_content=post("comment_content");
        $comment_mail=post("comment_mail");
        $comment_approve=post("comment_approve");
        $comment_avatar=post("comment_avatar");
        if(!$comment_author || !$comment_content){
            echo "<h4 class='alert_error'>Gerekli Alanları Doldurmanız Gerekiyor</h4>";
        }else{
            $update=query("update comment set
            comment_author='$comment_author',
            comment_content='$comment_content',
            comment_mail='$comment_mail',
            comment_approve='$comment_approve',
            comment_avatar='$comment_avatar' where comment_id='$row[comment_id]'");
            if($update){
                 echo "<h4 class='alert_success'>Yorum Başarıyla Güncellendi</h4>";
                 go(URL."/admin/index.php?do=comments",1);
             }else{
                 echo "<h4 class='alert_error'>Yorum Güncellenemedi</h4>";
             }
         }
    }
    ?>
    <form action="" method="post">
        <div class="module_content">
            <fieldset>
                <label>Yorum Yazar</label>
                <input type="text" name="comment_author" value="<?php echo stripcslashes($row["comment_author"]); ?>">
            </fieldset>
            <fieldset>
                <label>Yorum İçeriği</label>
                <textarea rows="5" name="comment_content"><?php echo stripcslashes($row["comment_content"]); ?></textarea>
            </fieldset>
            <fieldset>
                <label>Yazar Mail Adres</label>
                <input type="text" name="comment_mail" value="<?php echo stripcslashes($row["comment_mail"]); ?>">
            </fieldset>
            <fieldset>
                <label>Avatar</label>
                <input type="text" name="comment_avatar" value="<?php echo stripcslashes($row["comment_avatar"]); ?>">
            </fieldset>
            <fieldset>
                <label>Konu Onayı</label>
                <select name="comment_approve">
                <option value="1" <?php echo $row["comment_approve"] == 1 ? 'selected ' : null ?>>Onaylı</option>
                <option value="0" <?php echo $row["comment_approve"] == 0 ? 'selected ' : null ?>>Onaylı Değil</option>
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