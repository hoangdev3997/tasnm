<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Admin</title>
    <link rel="stylesheet" href="{{ URL::asset('css/admin/admin.css') }}">
</head>

<body>
    <div class="header">
        <h2>Login Admin</h2>
    </div>
    <form method="post" action="{{ url('/dangnhap') }}">
        @csrf
        <div class="input-group">
            <label>Tài Khoản : <sup style="color:red;">{{ $error ?? '' }}</sup></label>
            <input type="text" name="username" required="">
        </div>
        <div class="input-group">
            <label>Mật Khẩu : <sup style="color:red;">{{ $error ?? '' }}</sup></label>
            <input type="password" name="password" required="">
        </div>
        <div class="input-group">
            <input type="submit" class="btn" name="Login" value="Đăng Nhập">
        </div>
    </form>
</body>
</html>
