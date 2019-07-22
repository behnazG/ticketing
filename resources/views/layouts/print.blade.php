<html>
<head>
    <link href="{{asset("print/main.css")}}" type="text/css" rel="stylesheet"/>
    <link media="print" href="{{asset("print/print.css")}}"/>
</head>
<body>
<div class="book">
    <div class="page">
        <div class="subpage">
            <div class="header">
                <img src="{{asset("app-assets/images/logo/logo_asa_footer.svg")}}" width="200">
            </div>
            @yield('content')
            <div class="footers">
                <p>واحدبازرگانی و فروش: مشهد، خیابان امام‌خمینی، امام‌خمینی ۲۸، برج تجاری و اداری مرمر، طبقه ۱۱ واحد ۵
                    <span class="float-left">۰۵۱ ۳۸۰۹۲</span>
                </p>
                <p>واحدفنی و پشتیبانی: مشهد، بلوارمعلم، نبش معلم ۵۴، پلاک ۲ ساختمان نیایش، طبقه ۳ واحد ۵
                    <span class="float-left">۰۵۱ ۳۸۹۴۱۱۰۳ - ۵</span>
                </p>
            </div>
        </div>

    </div>
</div>
</body>
<script type="text/javascript">
    window.print();
</script>
</html>