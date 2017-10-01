<html>
  <head>
  	<meta name="keywords" content="your keywords">
    <meta name="description" content="your description">
    <meta name="author" content="author,email address">
    <meta name="robots" content="index,follow">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="windows-Target" contect="_top">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="renderer" content="webkit">
  </head>
  <body>
    <p>{{ $name }}<br>
       你好，点击下面的连接调转到密码重置的页面，进行密码重置<br>
       <a target="_blank" href="{{ url('user/chongzhipassword') }}?name={{ urlencode($name) }}">点击重置密码</a>
    </p>
  </body>
</html>
