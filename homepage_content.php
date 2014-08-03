<link rel="stylesheet" href="css/style"/>
<div class="content">
    <div class="content-header">
          <h2>
            <a href="<?php echo $link ?>?id=<?php echo $id ?>"><?php echo $header ?></a>
         </h2>
    </div>
        <span class="author">
            <a href="#">
                <strong><?php echo $author ?></strong>
            </a>
        -</span>
        <span class="date">
            <?php echo $date ?>
        </span>
        <span class="comment"><img src="<?php echo URL ?>images/comment_icon.fw.png"><?php echo $comment_count ?></span><br><br>
        <div class="content-image">
            <a href="#">
                <img src="<?php echo URL ?>images/java.jpg"/>
            </a>
        </div>
        <div class="content-full">
            <?php echo $content ?><br>
        </div>
        <span class="read"><br>
            <?php echo $hit ." Görüntülenme" ?>
        </span>
        <span class="continue">
        <a href="<?php echo $link ?>?id=<?php echo $id ?>">
            Devamı »
        </a>
    </span><br>
    <div class="line"></div>
</div>

