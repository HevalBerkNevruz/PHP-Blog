<?php include("includes/function.php"); ?>
<?php include("includes/adjustment.php"); ?>

<div class="navbar">
    <ul>
        <li><a href="http://localhost/Blog">Anasayfa</a></li>
        <?php
            get_home_categories();
        ?>
    </ul>
    <input type="text" value="Search">
</div>
<div class="logo">
    <a href="http://localhost/Blog">
        <img src="http://localhost/Blog/images/logo.fw.png" alt="logo"/>
    </a>
</div>
<div class="advertising-top">
    <p>Adversiting Area</p><p>728x90</p>
</div>
<div class="navbar-bottom">
    <ul>
        <li><a href="http://localhost/Blog">Anasayfa</a></li>
        <?php
        get_categories();
        ?>
    </ul>
</div>
<div id="right">
    <div class="adversiting-right">
        <p>Adversiting Area</p><p>350x260</p>
    </div>
    <div class="post">
        <div>
            <p>En Çok Okunanlar</p>
        </div>
    </div>
    <div style="border-bottom:1px solid #D5D5D5" class="post">
        <div>
            <p>Son Eklenenler</p>
        </div>
    </div>
</div>
<div id="left">
    <div class="social-media">
        <div>
            <p>SOCIAL</p>
        </div>
        <ul>
            <a target="_blank" href="https://tr-tr.facebook.com/hevall.44">Facebook</a>
            <a target="_blank" href="https://twitter.com/Hevall44">Twitter</a>
            <a target="_blank" href="http://www.linkedin.com/pub/heval-berk-nevruz/86/742/b82">Linked In</a>
            <a target="_blank" href="https://github.com/HevalBerkNevruz/">Github</a>
        </ul>
    </div>
</div>