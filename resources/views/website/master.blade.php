<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tasnm</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="../upload/favicon.ico">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700" rel="stylesheet" type="text/css">
    <!-- all css here -->
    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="../css/animate.css">
    <!-- pe-icon-7-stroke -->
    <link rel="stylesheet" href="../css/pe-icon-7-stroke.min.css">
    <!-- jquery-ui.min css -->
    <link rel="stylesheet" href="../css/jquery-ui.min.css">
    <!-- Image Zoom CSS
            ============================================ -->
    <link rel="stylesheet" href="../css/img-zoom/jquery.simpleLens.css">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="../css/meanmenu.min.css">
    <!-- nivo slider CSS
            ============================================ -->
    <link rel="stylesheet" href="../system/lib/css/nivo-slider.css" type="text/css">
    <link rel="stylesheet" href="../system/lib/css/preview.css" type="text/css" media="screen">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <!-- font-awesome css -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- modernizr css -->
    <script src="../js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    @include('website.header')
    @yield('website.content')
    @include('website.footer')
@php
    function to_slug($str) {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }
@endphp
</body>

</html>
