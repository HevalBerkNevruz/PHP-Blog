<link rel="stylesheet" href="../css/comment"/>
<div id="all">
<div id="all_comments">
    <div class="comments">
        <div class="avatar">
            <img src="<?php echo $comment_avatar ?>"/>
        </div>
        <div class="author">
            <strong><?php echo $comment_author ?></strong> -
            <?php echo $comment_date ?>
        </div><br>
        <div class="comment_content">
            <?php echo $comment_content ?>
        </div>
    </div>
</div>
</div>