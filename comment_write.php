<link rel="stylesheet" href="../css/comment"/>
<div id="all">
<div id="all_comments_content">
    <ul>
        <li>
            <span>Ad Soyad : </span>
            <input style="margin-left:5px" name="name_surname" type="text"/>
        </li>
        <li>
            <span>E-Mail : </span>
            <input name="mail" type="text"/>
        </li>
        <li>
            <span>Yorumunuz : </span>
            <br>
            <textarea name="comment" cols="50" rows="5"></textarea>
        </li>
    </ul>
    <button onclick="$.Blog.commentAdd('<?php echo $id ?>')">Yorum Yap</button>
</div>
</div>