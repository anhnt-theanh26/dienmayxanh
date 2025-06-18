<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <title>{{ $info['subject'] . ' | ' . config('setting.site_name') }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
        }
    </style>
</head>

<body>
    <h1>{{ $info['subject'] }}</h1>
    <p>
        {!! $info['content'] !!}
    </p>
    <p>{{ $info['time'] }}</p>
</body>

</html>
