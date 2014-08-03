<?php
    echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
    echo !defined("ADMIN") ? die("Bu Sayfaya Erişmeye Yetkiniz Yok") : null;
?>
<article class="module width_3_quarter" style="width:95%">
    <header><h3 class="tabs_involved">İlave Alanlar</h3>

    </header>

    <div class="tab_container">

        <?php
            $query=query("select * from addition_area order by area_id desc");
            if(mysql_affected_rows()){
        ?>


        <div id="tab1" class="tab_content">
            <table class="tablesorter" cellspacing="0">
                <thead>
                <tr>
                    <th></th>
                    <th>Alan Başlığı</th>
                    <th>Alan Tipi</th>
                    <th>İşlemler</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    while($row=row($query)){
                        if($row["area_type"]==1){
                            $type="Input";
                        }else{
                            $type="Textarea";
                        }
                ?>
                <tr>
                    <td><input type="checkbox"></td>
                    <td><?php echo stripcslashes($row["area_header"]); ?></td>
                    <td><?php echo $type; ?></td>
                    <td>
                        <a href="<?php echo URL; ?>/admin/index.php?do=addition_area_update&id=<?php echo $row["area_id"] ?>" title="Düzenle"><img src="images/icn_edit.png"/></a>
                        <a style="margin-left:10px" onclick="return confirm('İlave Alanı Silmek  İstediğinizden Emin Misiniz ?')" href="<?php echo URL; ?>/admin/index.php?do=addition_area_delete&id=<?php echo $row["area_id"] ?>" title="Sil"><img src="images/icn_trash.png"/></a>
                    </td>
                </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
        <?php }else{ ?>
            <h4 class='alert_warning'>Heniz Hiç İlave Alan Eklenmemiş</h4>
        <?php } ?>
    </div>
</article>