<?php

if(isset($_GET['liked'])){

    $_GET['liked']=$_GET['liked'];

}
else{

    $_GET['liked']=false;


}

?>

<!DOCTYPE html>
<html>
<head>
    <title><?=$hotel_name?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Sign up with WiFi4Free" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

    <link href="/css/fb/style.css" rel="stylesheet" type="text/css" media="all" />

    <link href="//fonts.googleapis.com/css?family=Old+Standard+TT:400,400i,700" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>


    <style>
        body {
            background: url("images/<?php echo $GLOBALS['hotel_bg_image']; ?>") no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;


            background-color: <?php echo $GLOBALS['bg_color']; ?>;
        }

        .fancy {
            line-height: 0.5;
            text-align: center;
            color: <?php echo $GLOBALS['font_color_3'];?>;;
        }
        .fancy span {
            display: inline-block;
            position: relative;
            margin-bottom: 5%;
        }
        .fancy span:before,
        .fancy span:after {
            content: "";
            position: absolute;
            height: 5px;

            border-top: 1px solid <?php echo $GLOBALS['font_color_3'];?>;
            top: 5px;
            width: 50%;
        }
        .fancy span:before {
            right: 100%;
            margin-right: 15px;
        }
        .fancy span:after {
            left: 100%;
            margin-left: 15px;
        }

    </style>

    <?php

    $data=['url'=>$url, 'email'=> $user_fb_email, 'mac'=>$macaddress,	 'hotelid'=>$hotel_id,  'fb-id'=>$fb_page_id, 'ip'=>$nasip];

    $data=json_encode($data);

    ?>


    <script src="../js/jquery.min.js" type="application/javascript"></script>
    <script src="../js/script.js" type="application/javascript"></script>

    <script type="application/javascript">
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = '//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=1519471891398547';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        $(document).ready(function() {

            $.ajaxSetup({ cache: true });
            $.getScript('//connect.facebook.net/en_US/sdk.js', function(){
                FB.init({
                    appId: '1519471891398547',
                    status: true, // check login status
                    oauth: true,
                    version: 'v2.8' // or v2.1, v2.2, v2.3, ...
                });
                $('#loginbutton,#feedbutton').removeAttr('disabled');

                FB.Event.subscribe('edge.create', function(response) {


                    window.location = 'https://fbdev.guestcompass.nl/like.php?data=<?=urlencode($data); ?>';

                });
            });
        });
    </script>




</head>
<body>

<!--FB SDK-->
<div id="fb-root"></div>
<!-- main -->
<div class="main main-agileits">

    <div class="main-agilerow" style="background:<?php echo hex2rgba($GLOBALS['hotel_centr_color'], 0.90, 0);?>;">

        <div class="contact-wthree">

            <h2 style="text-align: center" class="terms-text"><?php echo $GLOBALS['term_title']; ?></h2>
            <h3 class="terms-text"><?php echo $GLOBALS['term_text']; ?></h3>
            <div class="close-button terms-text" alt="close">  </div>
            <div class="fokus">
                <a href="#"><p class="terms"><?php echo $GLOBALS['term_title']; ?></p></a>
                <form action="http://login.com/emailSave.php" method="post">
                    <h1 class="heading"
                        style='color: <?php echo $GLOBALS['font_color_1'];?>;
                                font-size: calc(<?php echo $GLOBALS['font_size_1']; ?>px * 2.0833333) !important;' > <?php if(!$_GET['liked']){ echo $GLOBALS['title'];} else { echo $GLOBALS['fb_title'];  } ?></h1>
                    </h1>
                    <?php
                    if ($_GET['liked'] == 'false'):
                        ?>
                        <div class="form-w3step1">
                            <div id='like_wrapper' style='margin-left: 42%;
								transform: scale(2.5, 1.7);
								-ms-transform: scale(2.5, 1.7);
								-webkit-transform: scale(2.5, 1.7);
								-o-transform: scale(2.5, 1.7);
								-moz-transform: scale(2.5, 1.7);
								'
                                 class="fb-like facebook" data-href="<?php echo $fb_url; ?>"
                                 data-width="400"
                                 data-layout="button"
                                 data-action="like"
                                 data-size="large"
                                 data-show-faces="false"
                                 data-share="false">
                            </div>
                        </div>
                        <?php
                    else:
                        ?>
                        <div class="form-w3step1">
                            <div class="social-wrap c">
                                <button type='button' class="facebook">
                                    <a style='color: <?php echo $GLOBALS['font_color_2'];?>;'
                                       href="https://fbdev.guestcompass.nl/index.php?macaddress=<?php echo $macaddress; ?>&nasip=<?php echo $nasip; ?>&hotel_id=<?php echo $hotel_id; ?>&url=<?php echo $url; ?>">
                                        Connect using Facebook
                                    </a>
                                </button>
                            </div>
                        </div>
                        <?php
                    endif;
                    ?>

                    <?php if (!$_GET['liked']):
                        ?>
                        <input type="hidden" id="user_email" value="<?php

                        if (isset($_GET['email'])){ echo urldecode($_GET['email']);}

                        ?>">

                        <input type="hidden" name="hotel_id" value="<?php echo $hotel_id; ?>">
                        <input type="hidden" name="template_id" value="<?php echo $template_id; ?>">
                        <input type="hidden" name="nasip" value="<?php echo $nasip; ?>">
                        <input type="hidden" name="macaddress" value="<?php echo $macaddress; ?>">
                        <input type="hidden" name="url" value="<?php echo $url; ?>">

                        <p class="subtitle fancy"><span><?php echo $GLOBALS['middle_title']; ?></span></p>
                        <div class="form-w3step1">
                            <input type="email" class="email agileits-btm" name="Email" placeholder="<?php echo $GLOBALS['email_title']; ?>">
                            <button type="submit" class="email agileits-btm butt"> > </button>
                        </div>
                    <?php endif; ?>
                    <div class="form-w3step1 logo-image">
                        <img src="images/<?php echo $GLOBALS['image']; ?>">
                    </div>

                    <!--<input type="submit" value="SUBMIT">-->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- //main -->

</body>

<script type="application/javascript">

    $(".terms").on("click", function(){
        $(".fokus").hide();
        $(".terms-text").show();
        return false;
    });

    $(".close-button").on("click", function(){
        $(".fokus").show();
        $(".terms-text").hide();
        return false;
    });


</script>

</html>