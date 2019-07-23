<html>
<head>
    <link media="print" href="<?php echo e(asset("print/print.css")); ?>"/>
    <style>

        /*CSS*/
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            background-color: #FAFAFA;
            font: 12pt "Tahoma";
            text-align: justify;
            direction: rtl;
        }

        table.report-container {
            page-break-after: always;

        }

        thead.report-header {
            display: table-header-group;
        }

        tfoot.report-footer {
            display: table-footer-group;
            bottom: 5px;
            position: fixed;
        }

        .footers {
            border-left: 3px solid #00a873;
            border-right: 3px solid #00a873;
            padding: 0 15px 0 15px;
            margin: 0px auto;
        }

        .footers p {
            font-size: 7pt;
        }

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .header {
            text-align: left;
            direction: ltr;
            padding-top:10mm;
        }

        .header p {
            height: 10px;
            width: 100%;
        }

        .page {
            width: 210mm;
            min-height: 297mm;
            padding: 20mm;
            margin: 0px auto;
            border-radius: 5px;
            background: white;
            direction: rtl;
            text-align: justify;
        }

        .subpage {
            padding: 1cm;
            height: 257mm;
        }

        @page  {
            size: A4;
            margin: 0px;
        }

        @media  print {
            html, body {
                width: 210mm;
                height: 297mm;
            }

            .page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }

            /* visible when printed */
            .print-only {
                display: block;
            }

            .page-break {
                height: 0;
                page-break-before: always;
                margin: 0;
                border-top: none;
            }

        }


    </style>

</head>
<body>
<div class="page">
    <div class="subpage">
        <table class="report-container">
            <thead class="report-header">
            <tr>
                <th class="report-header-cell">
                    <div class="header">
                        <img src="<?php echo e(asset("app-assets/images/logo/logo_print.png")); ?>" width="150">
                        <p></p>
                    </div>
                </th>
            </tr>
            </thead>
            <tfoot class="report-footer">
            <tr>
                <td class="report-footer-cell">
                    <div class="footer-info">
                        <div class="footers">
                            <p>واحدبازرگانی و فروش: مشهد، خیابان امام‌خمینی، امام‌خمینی ۲۸، برج تجاری و اداری مرمر، طبقه
                                ۱۱ واحد
                                ۵
                                <span class="float-right">۰۵۱ ۳۸۰۹۲</span>
                            </p>
                            <p>واحدفنی و پشتیبانی: مشهد، بلوارمعلم، نبش معلم ۵۴، پلاک ۲ ساختمان نیایش، طبقه ۳ واحد ۵
                                <span class="float-left">۰۵۱ ۳۸۹۴۱۱۰۳ - ۵</span>
                            </p>
                        </div>
                    </div>
                </td>
            </tr>
            </tfoot>
            <tbody class="report-content">
            <tr>
                <td class="report-content-cell">
                    <div class="main">
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>

    </div>
</div>
<script>
    window.print();
</script>
</body>
</html><?php /**PATH D:\xampp\htdocs\asa\resources\views/layouts/print1.blade.php ENDPATH**/ ?>