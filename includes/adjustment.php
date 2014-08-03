<?php
    session_start();
    ob_start();
    ##Character Error##
    mysql_query("set character set 'utf8'");
    mysql_query("set names 'utf8'");

    $query=mysql_query("select * from adjustment");
    $adjustment=mysql_fetch_array($query);

    define("URL",$adjustment["url"]);
?>