<?php
    function post($parameter){
        return trim($_POST[$parameter]);
    }
    function get($parameter){
        ##Araştır##
        return strip_tags(trim(addslashes($_GET[$parameter])));
    }
    function abbreviation($parameter,$uzunluk=50){
        if(strlen($parameter)>$uzunluk){
            $parameter=mb_substr($parameter,0,$uzunluk,"UTF-8","..");
        }
        return $parameter;
    }
    function go($parameter,$time=0){
        if($time == 0){
            header("Location:${parameter}");
        }else{
            header("Refresh:$time; url={$parameter}");
        }
    }
    function create_session($parameter){
        ##Araştır##
        foreach($parameter as $key => $value){
            $_SESSION["$key"]=$value;
        }
    }
    function sef_link($header){
        $search = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '-');
        $do = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', ' ');
        $perma = strtolower(str_replace($search, $do, $header));
        $perma = preg_replace("@[^A-Za-z0-9\-_]@i", ' ', $perma);
        $perma = trim(preg_replace('/\s+/',' ', $perma));
        $perma = str_replace(' ', '-', $perma);
        return $perma;
    }
    function query($query){
        return mysql_query($query);
    }
    function row($query){
        return mysql_fetch_array($query);
    }
    function rows($query){
        return mysql_num_rows($query);
    }
    function get_home_categories(){
        $query=query("select * from home_category order by category_id asc");
        while($row=row($query)){
            echo '<li><a href="'.URL.'/home_category/'.$row[category_link].'">'.stripcslashes($row["category_name"]).'</a></li>';
        }
    }
    function get_categories(){
        $query=query("select * from category where home_category=0 order by category_id asc");
        while($row=row($query)){
            echo '<li><a href="'.URL.'/category/'.$row[category_link].'">'.stripcslashes($row["category_name"]).'</a></li>';
        }
    }
    function homepage_content(){
        $content_count=rows(query("select content_id from content where content_approve=1 && content_homepage=1"));
        $limit=1;
        if(mysql_affected_rows()){
            $query=query("select * from content where content_approve=1 && content_homepage=1");
            while($row=row($query)){
                if($limit<=2){
                    $id=$row["content_id"];
                    $content=explode("----------------------------",$row["content_statement"]);
                    $content=$content[1];
                    if(strlen($content)>200){
                        $content=substr($content,0,200);
                        $content.="..";
                    }
                    $link=URL."content/".$row["content_link"].".php";
                    $date_explode=explode(" ",$row["content_date"]);
                    $date=$date_explode[0]."-".$date_explode[1];
                    $hit=number_format($row["content_hit"]);
                    $comment_count=rows(query("select comment_id from comment where comment_content_id='$id' && comment_approve=1"));
                    $author=$row["content_author"];
                    $header=stripcslashes($row["content_header"]);
                    include(URL."homepage_content.php");
                    $limit++;
                }else{
                    break;
                }
            }
        }
    }
    function content() {
        $id=get("id");
        $query=query("select * from content where content_approve=1 && content_id='$id'");
        while($row=row($query)){
            $content_id=$row["content_id"];
            $content=explode("----------------------------",$row["content_statement"]);
            $content=$content[1];
            $date_explode=explode(" ",$row["content_date"]);
            $date=$date_explode[0]."-".$date_explode[1];
            $hit=number_format($row["content_hit"]);
            $author=$row["content_author"];
            $header=stripcslashes($row["content_header"]);
            $comment_count=rows(query("select comment_id from comment where comment_content_id='$content_id' && comment_approve=1"));
            include("../content/content.php");
        }
    }
    function content_comments(){
        $id=get("id");
        $query=query("select * from comment where comment_approve=1 && comment_content_id='$id'");
        if(mysql_affected_rows()){
            while($row=row($query)){
                $comment_author=$row["comment_author"];
                $comment_content=$row["comment_content"];
                $comment_date=$row["comment_date"];
                $comment_avatar=$row["comment_avatar"];
                include("../comment.php");
            }
            include_once("../comment_write.php");
        }else{
            $error="Henüz yorum eklenmemiş";
            echo '<div class="error">'.$error.'</div>';
            include_once("../comment_write.php");
        }
    }
?>