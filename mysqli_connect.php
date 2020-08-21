<?php
header('Content-Type:text/html;charset=utf-8');  // 向客户端发送原始的HTTP 报头
$link = @mysqli_connect('localhost', 'root', 'Hkb871226', 'message_board') or die('connect error!');  // 连接mysql