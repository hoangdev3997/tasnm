<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0054)http://localhost/www/Tasnm/controller/admincuaKhoa.php -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


    <title>Tasnm Admin</title>

    <meta name="robots" content="noindex, nofollow">

    <link rel="shortcut icon" href="{{ URL::asset('upload/fa-icon2.png') }}" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/admin/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/admin/css.css') }}" media="screen" />


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <!--
	<script type="text/javascript">
		var admin_url = '';
		var base_url = '';
		var public_url = '';
	</script>

	<script type="text/javascript" src="../js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="../js/jquery/jquery-ui.min.js"></script>

	<script type="text/javascript" src="crown/js/plugins/spinner/jquery.mousewheel.js"></script>

	<script type="text/javascript" src="crown/js/plugins/forms/uniform.js"></script>
	<script type="text/javascript" src="crown/js/plugins/forms/jquery.tagsinput.min.js"></script>
	<script type="text/javascript" src="crown/js/plugins/forms/autogrowtextarea.js"></script>
	<script type="text/javascript" src="crown/js/plugins/forms/jquery.maskedinput.min.js"></script>
	<script type="text/javascript" src="crown/js/plugins/forms/jquery.inputlimiter.min.js"></script>

	<script type="text/javascript" src="crown/js/plugins/tables/datatable.js"></script>
	<script type="text/javascript" src="crown/js/plugins/tables/tablesort.min.js"></script>
	<script type="text/javascript" src="crown/js/plugins/tables/resizable.min.js"></script>

	<script type="text/javascript" src="crown/js/plugins/ui/jquery.tipsy.js"></script>
	<script type="text/javascript" src="crown/js/plugins/ui/jquery.collapsible.min.js"></script>
	<script type="text/javascript" src="crown/js/plugins/ui/jquery.progress.js"></script>
	<script type="text/javascript" src="crown/js/plugins/ui/jquery.timeentry.min.js"></script>
	<script type="text/javascript" src="crown/js/plugins/ui/jquery.colorpicker.js"></script>
	<script type="text/javascript" src="crown/js/plugins/ui/jquery.jgrowl.js"></script>
	<script type="text/javascript" src="crown/js/plugins/ui/jquery.breadcrumbs.js"></script>
	<script type="text/javascript" src="crown/js/plugins/ui/jquery.sourcerer.js"></script>

	<script type="text/javascript" src="crown/js/custom.js"></script>


	<script type="text/javascript" src="../js/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="../js/jquery/chosen/chosen.jquery.min.js"></script>
	<script type="text/javascript" src="../js/jquery/scrollTo/jquery.scrollTo.js"></script>
	<script type="text/javascript" src="../js/jquery/number/jquery.number.min.js"></script>
	<script type="text/javascript" src="../js/jquery/formatCurrency/jquery.formatCurrency-1.4.0.min.js"></script>
	<script type="text/javascript" src="../js/jquery/zclip/jquery.zclip.js"></script>

	<script type="text/javascript" src="../js/jquery/colorbox/jquery.colorbox.js"></script>
	<link rel="stylesheet" type="text/css" href="../js/jquery/colorbox/colorbox.css" media="screen" />

	<script type="text/javascript" src="../js/custom_admin.js" type="text/javascript"></script>
-->
    <style>
        .cke {
            visibility: hidden;
        }
    </style>
</head>
    <body>
        @include('admin.header')
        @yield('admin.content')
        @include('admin.footer')
    </body>
</html>
