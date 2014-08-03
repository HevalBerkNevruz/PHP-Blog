<?php
    echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
    echo !defined("ADMIN") ? die("Bu Sayfaya Erişmeye Yetkiniz Yok") : null;
    session_destroy();
    go(URL."/admin",1);
    echo "<h4 class='alert_success'>Başarıyla Çıkış Yaptınız . Yönlendiriliyorsunuz ..</h4>";
?>