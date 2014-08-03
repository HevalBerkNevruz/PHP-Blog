<?php
    echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
    echo !defined("ADMIN") ? die("Bu Sayfaya Erişmeye Yetkiniz Yok") : null;
?>
<article class="module width_3_quarter" style="width:95%">
    <header><h3 class="tabs_involved">Kategori Listesi</h3>

    </header>

    <div class="tab_container">

        <?php
            $query=query("select * from category order by category_id desc");
            if(mysql_affected_rows()){
        ?>


        <div id="tab1" class="tab_content">
            <table class="tablesorter" cellspacing="0">
                <thead>
                <tr>
                    <th style="width:20px"></th>
                    <th>Kategori Adı</th>
                    <th>Ana Kategori</th>
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
                    <td><?php echo stripcslashes($row["category_name"]); ?></td>
                    <td><?php if($row["home_category"]!=0){ ?>
                        <a href="http://localhost/Blog/admin/index.php?do=home_category_update&id=<?php echo $row["home_category"];?>"><?php } echo stripcslashes($row["home_category"]); ?></a>
                    </td>
                    <td><?php echo stripcslashes($row["category_date"]); ?></td>
                    <td>
                        <a href="<?php echo URL; ?>/admin/index.php?do=category_update&id=<?php echo $row["category_id"] ?>" title="Düzenle"><img src="images/icn_edit.png"/></a>
                        <a style="margin-left:10px" onclick="return confirm('Kategoriyi Silmek  İstediğinizden Emin Misiniz ?')" href="<?php echo URL; ?>/admin/index.php?do=category_delete&id=<?php echo $row["category_id"] ?>" title="Sil"><img src="images/icn_trash.png"/></a>
                    </td>
                </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
        <?php }else{ ?>
            <h4 class='alert_warning'>Henüz hiç kategori eklenmemiş</h4>
        <?php } ?>
    </div>
</article>