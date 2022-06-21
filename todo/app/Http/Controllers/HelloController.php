<?php

namespace App\Http\Controllers;  //namespaceの指定

use Illuminate\Http\Request;  //クラスのインポート

class HelloController extends Controller //クラスの指定
{
    public function display_hello(){
        return <<<EOF
<html>
<head>
<title>Hello/Index</title>
<style>
body {font-size:16pt; color:#999; }
h1 { font-size:100pt; text-align:right; color:#eee;
    margin:-40px 0px -50px 0px; }
</style>
</head>
<body>
    <h1>Index</h1>
    <p>これはHelloコントローラのindexアクションです</p>
</body>
</html>
EOF;

    }
}
