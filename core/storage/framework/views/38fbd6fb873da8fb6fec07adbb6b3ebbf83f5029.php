<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    <style type="text/css">
        @media  screen {
            @font-face {
                font-family: 'Lato';
                font-style: normal;
                font-weight: 400;
                src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format('woff');
            }

            @font-face {
                font-family: 'Lato';
                font-style: normal;
                font-weight: 700;
                src: local('Lato Bold'), local('Lato-Bold'), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format('woff');
            }

            @font-face {
                font-family: 'Lato';
                font-style: italic;
                font-weight: 400;
                src: local('Lato Italic'), local('Lato-Italic'), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format('woff');
            }

            @font-face {
                font-family: 'Lato';
                font-style: italic;
                font-weight: 700;
                src: local('Lato Bold Italic'), local('Lato-BoldItalic'), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format('woff');
            }
        }

        /* CLIENT-SPECIFIC STYLES */
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        /* RESET STYLES */
        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        /* iOS BLUE LINKS */
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* MOBILE STYLES */
        @media  screen and (max-width:600px) {
            h1 {
                font-size: 32px !important;
                line-height: 32px !important;
            }
        }

        /* ANDROID CENTER FIX */
        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }
        .fa {
  padding: 20px;
  /* font-size: 30px; */
  width: 50px;
  text-align: center;
  text-decoration: none;
  margin: 5px 5px;
}
.fa-facebook {
  background: #3B5998;
  color: white;
  width: 14px;
    height: 9px;
}
.fa-twitter {
  background: #55ACEE;
  color: white;
  width: 14px;
    height: 9px;
}
.fa-linkedin {
  background: #007bb5;
  color: white;
  width: 14px;
    height: 9px;
}
.fa-youtube {
  background: #bb0000;
  color: white;
  width: 14px;
    height: 9px;
}

    </style>
</head>

<?php
$setting =    App\Models\Setting::first();
$logo = '';
if($setting->logo){
    $logo = $setting->logo;
}

?>
<body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
    <!-- HIDDEN PREHEADER TEXT -->
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <!-- LOGO -->
        <tr>
            <td bgcolor="#FFA73B" align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td align="center" valign="top" style="padding: 0px 12px 17px 0px;"> </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#FFA73B" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ffffff" align="center" valign="top" style= border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                            <h6 style="font-size: 30px; margin: 2;">Welcome to vrindavantulsimala.com</h6> <img src="<?php echo e(asset('assets/images/'.$logo.'')); ?>?<?php echo e(strtotime(now())); ?>" width="150" height="135" style="display: block; border: 0px;" />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 20px; font-weight: 400; line-height: 25px;">
                            
                            <p>User Name: <?php echo e($user_info['email']); ?></p>
                            
                            <p>Password: <?php echo e($user_info['password']); ?></p>
                            
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#FFECD1" align="center" style=" border-radius: 4px 4px 4px 4px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">
                              <section class="selected-product-section theme2" style="margin-bottom:30px;">
                                <div class="container">
                                    <div class="WorldwideCon">
                                        <div class="single-service single-service2 homeAboutWrapper">
                                            <section class="widget">

                                              <ul class="list-icon margin-bottom-1x" style="list-style-type:none;">
                                                <h3 style="color: #111111;">For any type of support please contact us!</h3>
                                                    <li> <i class="icon-phone text-muted"></i><?php echo e($setting->footer_phone); ?></li>
                                                    <li> <i class=""></i><?php echo e($setting->footer_whatsapp); ?></li>
                                                    <li> <i class=""></i><?php echo e($setting->footer_email); ?>

                                                    </li>
                                                    <li> <i
                                                            class=""></i><?php echo e($setting->store_email_2); ?>

                                                    </li>
                                                    <li> <a
                                                            href="<?php echo e(env('APP_URL')); ?>"><?php echo e(env('APP_URL')); ?>/</a>
                                                    </li>
                                                    <?php
                                                        $links = json_decode($setting->social_link, true)['links'];
                                                        $icons = json_decode($setting->social_link, true)['icons'];
                                                        $youtub = 'https://www.youtube.com/';
                                                        $facebook = 'https://www.facebook.com';
                                                        $twitter = 'https://twitter.com/';
                                                        $linkedin = 'https://www.linkedin.com/';
                                                        foreach ($links as $link_key => $link){
                                                            if(str_contains($link,'youtube.com')){
                                                                $youtub = $link;
                                                            }elseif (str_contains($link,'facebook.com')) {
                                                                $facebook = $link;
                                                            }elseif (str_contains($link,'twitter.com')) {
                                                                $twitter = $link;
                                                            }elseif (str_contains($link,'linkedin.com')) {
                                                                $linkedin = $link;
                                                            }
                                                        }
                                                    ?>
                                                    <ul>
                                                        
                                                        <a href="<?php echo e($facebook); ?>" target="blank"><img class="fb_img" style="width: 27px; height: 22px;" src="<?php echo e(asset('assets/images/fb_img_logo.png')); ?>?<?php echo e(strtotime(now())); ?>" alt="" width="20px"></a> &nbsp;&nbsp;
                                                        <a href="<?php echo e($twitter); ?>" target="blank"> <img style="width: 27px;" class="tw_img" src="<?php echo e(asset('assets/images/twiter_icon.png')); ?>?<?php echo e(strtotime(now())); ?>" alt="" width="20px"></a>&nbsp;&nbsp;
                                                        <a href="<?php echo e($youtub); ?>" target="blank"> <img class="yout_img" style="width: 30px;" src="<?php echo e(asset('assets/images/yutb_img.jpg')); ?>?<?php echo e(strtotime(now())); ?>" alt="" width="20px"></a>&nbsp;&nbsp;
                                                        <a href="<?php echo e($linkedin); ?>" target="blank"> <img style="width: 21px;" class="link_img" src="<?php echo e(asset('assets/images/linkedin_icon.png')); ?>?<?php echo e(strtotime(now())); ?>" alt="" width="20px"></a>&nbsp;&nbsp;
                                                    </ul>

                                                </ul>

                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </section>
                           </p>
                           <div class="details-links" style="    background: #75bc0b;
                           width: 610px;
                           height: 77px;">

                               <hr>

                               <ul> <a href="https://vrindavantulsimala.com/terms-conditions-policy" target="blank">Terms & Conditions</a> &nbsp; &nbsp;<a href="https://vrindavantulsimala.com/privacy-policy" target="blank">Privacy Policy </a> </ul>
                           </div>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>


        </tr>
    </table>

</body>

</html><?php /**PATH /home/r4cwncamkd2i/public_html/vrindavantulsimala.com/core/resources/views/front/welcome_email_tem.blade.php ENDPATH**/ ?>