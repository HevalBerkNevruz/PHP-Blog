<?php
    include("../includes/adjustment.php");
    include("../includes/connection.php");
    include("../includes/function.php");
    if($_POST){
        $type=post("type");
        $result=array();
        switch($type){
            case "comment_add":
                $name_surname=trim(post("name_surname"));
                $mail=trim(post("mail"));
                $comment=trim(post("comment"));
                $content_id=post("content_id");
                if(is_numeric($name_surname) || is_numeric($mail)){
                    $result["comment_error"]="Lütfen Alanları Doğru Şekilde Doldurun";
                }
            if(!$comment){
                $result["comment_error"]="Lütfen Yorum Alanını Giriniz";
            }else{
                $query=query("select content_id from content where content_id='$content_id'");
                if(mysql_affected_rows()){
                    $insert=query("insert into comment set
                    comment_content_id='$content_id',
                    comment_author='$name_surname',
                    comment_mail='$mail',
                    comment_content='$comment',
                    comment_approve=0");
                    if($insert){
                        $content_id=mysql_insert_id();
                        $result["success"]="Yorumunuz Onaylandıktan Sonra Eklenecektir..";
                        $result["text"]='
                            <div class="comments">
                                <div class="avatar">
                                    <img src="'.URL.'/Blog/images/java.jpg"/>
                                </div>
                                <div class="author">
                                    <strong>@'.stripcslashes($name_surname).'</strong>
                                </div><br>
                                <div class="comment_content">
                                    '.stripcslashes($comment).'
                                </div>
                            </div>';
                    }else{
                        $result["comment_error"]="Yorum Eklenemedi";
                    }
                }else{
                    $result["comment_error"]="Gecersiz Konu ID";
                }
            }
            break;
        }
        echo json_encode($result);
    }
?>