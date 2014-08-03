<?php
    echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
    echo !defined("ADMIN") ? die("Bu Sayfaya Erişmeye Yetkiniz Yok") : null;
?>
<article class="module width_3_quarter" style="width:95%">
    <header><h3 class="tabs_involved">Onay Bekleyen İçerikler</h3>

    </header>

    <div class="tab_container">

        <?php
            $query=query("select * from content where content_approve=0 order by content_id desc");
            if(mysql_affected_rows()){
        ?>


        <div id="tab1" class="tab_content">
            <table class="tablesorter" cellspacing="0">
                <thead>
                <tr>
                    <th></th>
                    <th>Başlık</th>
                    <th>Ekleyen</th>
                    <th>Kategori</th>
                    <th>Tarih</th>
                    <th>İşlemler</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    while($row=row($query)){
                ?>
                <tr>
                    <td><input type="checkbox"></td>
                    <td><?php echo stripcslashes($row["content_header"]); ?></td>
                    <td><?php echo stripcslashes($row["content_author"]); ?></td>
                    <td><a href="http://localhost/Blog/admin/index.php?do=category_update&id=<?php echo $row["content_category"] ?>"><?php echo stripcslashes($row["content_category"]); ?></a></td>
                    <td><?php echo stripcslashes($row["content_date"]); ?></td>
                    <td>
                        <a href="<?php echo URL; ?>/admin/index.php?do=content_update&id=<?php echo $row["content_id"] ?>" title="Düzenle"><img src="images/icn_edit.png"/></a>
                        <a style="margin-left:10px" onclick="return confirm('İçeriği Silmek  İstediğinizden Emin Misiniz ?')" href="<?php echo URL; ?>/admin/index.php?do=content_delete&id=<?php echo $row["content_id"] ?>" title="Sil"><img src="images/icn_trash.png"/></a>
                    </td>
                </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
        <?php }else{ ?>
            <h4 class='alert_warning'>Onaylanmayı Bekleyen İçerik Yok</h4>
        <?php } ?>
    </div>
</article>