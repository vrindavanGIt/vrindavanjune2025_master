<!DOCTYPE html>
<html lang="en">

<head>
    <title>Original Tulsimala</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style media="screen"></style>
    <style>
        .section_temp {
            width: 65%;
            margin: auto;
        }
        .section__table {
            border: 2px solid #5c4033;
        }
        .tulislogo img {
            height: 115px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-top: 17px;
            margin-bottom: 25px;
        }

        .modal-header-info {
            color: #fff;
            padding: 10px 15px;
            border-bottom: 1px solid #eee;
            background-color: #5C4033;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-topright: 5px;
            text-align: center;
        }
        .modal-header-info h4 {
            color: #fff;
            font-size: 16px;
            margin: 0;
        }
        .modal-header-info h4 a {
            color: #fff;
            margin: 0 10px 0 0;
        }
        .modal-header-info h4 .link {
            margin: 0px;
            text-decoration: underline;
        }
        .success-inner {
            padding: 15px 0;
            background-color: white;
            text-align: center;
        }
        .success-inner h3 {
            margin: 0px;
        }

        .success-inner h2 li {
            color: #FC4E03;
            list-style: none;
            text-decoration: none;
        }

        .success-inner h2 li a {
            color: #FC4E03;
        }
        .top-container table th {
            width: 70px;
        }
        table th {
            border: 1px solid #e6e6e6;
            width: 100px;
            background-color: #eeeeee;
            padding: 12px 15px;
        }
        table td {
            border: 1px solid #e6e6e6;
            width: 330px;
            background-color: #eeeeee38;
            padding: 12px 15px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        .WorldwideCon .single-service.homeAboutWrapper {
            /* display: flex; */
            /* flex-wrap: wrap; */
            padding-bottom: 0px;
        }

        .WorldwideCon {
            display: inline-block;
            width: 100%;
            vertical-align: top;
        }

        tr.info-container {
            /* font-size: 16px; */
            /* color: rgb(68, 48, 40) !important; */
            /* background: #F8FFEE !important; */
            /* padding: 20px 39px; */
            word-break: break-word;
            /* border: 1px solid #256125; */
            /* text-align: justify; */
        }

        .WorldwideCon .single-service ul {
            list-style: none;
            margin: 0px;
            padding: 0px;
        }
        .WorldwideCon .single-service ul li {
                margin: 0 0 5px;
        }
            .WorldwideCon .single-service ul p {
            margin: 0 0 0;
        }

        .WorldwideCon .single-service .email-head-num li {
            color: #fc4e03;
            text-decoration: underline;
        }

        .WorldwideCon .single-service .email-heading li {
            color: #3d34eb;
        }

        .billing-add {
            float: left;
            width: 50%;
        }

        .bottom-container {
            margin: 0x 0px 0px 0px;
        }
        a:link {
            color:#eee;
            background-color: transparent;
            text-decoration: none;
        }

        @media  screen and (max-width: 576px) {
            .section_temp {
                width: 90%;
            }
        }
    </style>
</head>

<body>
    <div class="section_temp">
    <div class="container">
        <div class="tulislogo">
            <img height="115px" style="display: block;  margin-left: auto; margin-right: auto;"   src="<?php echo e(asset('assets/images/' .   @$data['logo'])); ?>" alt="logo"></a>

        </div>

        <div class="section__table" >
        <div class="modal show" id="modalCompose">
            <div class="modal-dialog">
                <div class="modal-header modal-header-info">
                        <a class="link" style="color: wheat;" href="https://vrindavantulsimala.com/">www.vrindavantulsimala.com</a>

                    </h4>
                </div>
            </div>
        </div>

        <div class="top-container">
            <div class="success-inner">
                <h3><span> <?php echo e(@$data['name']); ?> has contact you!</span></h3>

            </div>
            <table>
                <tr>
                    <td style="padding: 15px 6px;">
                        <table class="table"
                            style="border: 0; border-collapse: collapse; width: 100%; margin: 0 0 10px;font-size:14px; color: #000;">
                            <tbody style="border: 0 solid #fff;">
                                <tr>
                                    <th style="padding: 15px 15px;border: 1px solid #e3e3e3; text-align:left">
                                        Name
                                    </th>
                                    <td style="padding: 15px 15px;border: 1px solid #e3e3e3;text-align:center">
                                       <?php echo e(@$data['name']); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 15px 15px;border: 1px solid #e3e3e3; text-align:left">
                                        Email
                                    </th>
                                    <td style="padding: 15px 15px;border: 1px solid #e3e3e3;text-align:center">
                                        <?php echo e(@$data['from']); ?>


                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 15px 15px;border: 1px solid #e3e3e3; text-align:left">
                                        Phone Number
                                    </th>
                                    <td style="padding: 15px 15px;border: 1px solid #e3e3e3;text-align:center">
                                        <?php echo e(@$data['phone']); ?>


                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 15px 15px;border: 1px solid #e3e3e3; text-align:left">
                                        whatsaap Number
                                    </th>
                                    <td style="padding: 15px 15px;border: 1px solid #e3e3e3;text-align:center">
                                        <?php echo e(@$data['whatsapp_no']); ?>


                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 15px 15px;border: 1px solid #e3e3e3; text-align:left">
                                        Country/City
                                    </th>
                                    <td style="padding: 15px 15px;border: 1px solid #e3e3e3;text-align:center">
                                        <?php echo e(@$data['country_city']); ?>


                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 15px 15px;border: 1px solid #e3e3e3; text-align:left">
                                        Message
                                    </th>
                                    <td style="padding: 15px 15px;border: 1px solid #e3e3e3;text-align:center">
                                        <?php echo e(@$data['message']); ?>


                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

            </table>
        </div>
        </div>
    </div>
    </div>
</body>

</html>


<?php /**PATH /home/r4cwncamkd2i/public_html/vrindavantulsimala.com/core/resources/views/front/contact_us_mail_admin.blade.php ENDPATH**/ ?>