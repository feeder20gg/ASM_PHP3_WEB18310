<html>
<head>
    <title>Xác nhận email</title>
</head>
<body>
    <p>Xin chào {{ $user->name }},</p>
    <p>Vui lòng xác nhận email của bạn bằng cách nhấp vào liên kết dưới đây:</p>
    <a href="{{ url('verify/' . $user->id) }}">Xác nhận email</a>
</body>
</html>
