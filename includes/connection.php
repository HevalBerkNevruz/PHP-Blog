<?php
    $connection=mysql_connect("localhost","heval","120014250") or die(mysql_error());

    $mysqlSelectDb=mysql_select_db("blog",$connection) or die(mysql_error());
?>