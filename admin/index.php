<?php
    include("../includes/connection.php");
    include("../includes/function.php");
    include("../includes/adjustment.php");
    define("ADMIN",true);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>Admin Panel</title>

    <link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
    <!--[if lt IE 9]>
    <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
    <script src="js/hideshow.js" type="text/javascript"></script>
    <script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery.equalHeight.js"></script>
    <script type="text/javascript">
        $(document).ready(function()
            {
                $(".tablesorter").tablesorter();
            }
        );
        $(document).ready(function() {

            //When page loads...
            $(".tab_content").hide(); //Hide all content
            $("ul.tabs li:first").addClass("active").show(); //Activate first tab
            $(".tab_content:first").show(); //Show first tab content

            //On Click Event
            $("ul.tabs li").click(function() {

                $("ul.tabs li").removeClass("active"); //Remove any "active" class
                $(this).addClass("active"); //Add "active" class to selected tab
                $(".tab_content").hide(); //Hide all tab content

                var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
                $(activeTab).fadeIn(); //Fade in the active ID content
                return false;
            });

        });
    </script>
    <script type="text/javascript">
        $(function(){
            $('.column').equalHeight();
        });
    </script>

</head>


<body>
<?php
if($_SESSION["login"]){
    include("../admin/includes/admin.php");
}else{
    if($_POST){
        $name=post("name");
        $pass=md5(post("pass"));
        if(!$name || !pass){
            echo "<script>alert('Kullanıcı Adı veya Şifre Boş Bırakılamaz')</script>";
        }else{
            $query=query("select * from admin where admin_name='$name' and admin_pass='$pass'");
            if(mysql_affected_rows()){
                $row=row($query);
                $session=array(
                  "login"=>true,
                  "admin_name"=>$row["admin_name"],
                  "admin_pass"=>$row["admin_pass"]
                );
                create_session($session);
                go(URL."/admin");
            }else{
                echo "<script>alert('Kullanıcı Adı veya Şifre Yanlış')</script>";
            }
        }
    }
?>
<div id="all">
    <div class="logo">

    </div>
    <div class="login">
        <form action="" method="post">
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <td>Kullanıcı Adı : </td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td>Şifre : </td>
                    <td><input type="password" name="pass"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit">Giriş</button></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php
    }
?>


</body>

</html>