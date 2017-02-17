<?php

//20141015版



// 可以解决magic_quotes_gpc的限制
function stripslashes_array(&$array) {
	while(list($key,$var) = each($array)) {
		if ($key != 'argc' && $key != 'argv' && (strtoupper($key) != $key || ''.intval($key) == "$key")) {
			if (is_string($var)) {
				$array[$key] = stripslashes($var);
			}
			if (is_array($var))  {
				$array[$key] = stripslashes_array($var);
			}
		}
	}
	return $array;
}

// 判断 magic_quotes_gpc 状态
if (get_magic_quotes_gpc()) {
    $_GET = stripslashes_array($_GET);
}
?>
<html>
<head>
<title>逆流的鱼 php文件管理</title>

<!-- 背景颜色 -->
<body bgcolor="#999999">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8";>
<STYLE type="text/css">
body {font-family: "Courier New", "Verdana", "Tahoma"; font-size: 12px;}
td {font-family: "Courier New", "Verdana", "Tahoma"; font-size: 12px;}
input {font-family: "Courier New", "Verdana", "Tahoma";font-size: 12px;}
.title {font-family: "Verdana", "Tahoma";font-size: 22px;font-weight: bold;}
</STYLE>
</head>
<body>
<table width="100%" border="0" cellspacing="1" cellpadding="3">
  <tr>
    <td class="title">PHP管理
    <?php
   echo @PHP_OS."服务器";
   ?>
    </td>    
  </tr>
</table>


<!-- 音频_begin -->
<audio id="id_audio"
autoplay="autoplay"
controls="controls"
loop="loop">
 <source id="id_mp3_src" src="" type="audio/mp3">
亲! 您的浏览器不支持音频标签！！！
</audio>
<!-- 音频_END -->

<hr>
<table width="100%" border="0" cellspacing="1" cellpadding="3">
  <tr>
   <td>主机域名:<?php echo "<font color=\"#33CCFF\">".$_SERVER['HTTP_HOST']."</font>";
?>
  <tr>
    <td>系统根目录:<?php echo $_SERVER['DOCUMENT_ROOT']
?>
  <tr>
    <td>当前目录：<?php
if (!isset($dir) or empty($dir)) {
	$dir=str_replace('\\','/',dirname(__FILE__));
	echo $dir;
} else {
	$dir=$_GET['dir'];
	echo $dir;
}
?>
</table>
<hr>
<table width="100%" border="0" cellpadding="3" cellspacing="1">
          <tr> 
            <td><b>文件/文件夹</b></td>
            <td><b>日期</b></td>
            <td><b>大小</b></td>
          </tr>
<?php
$dirs=@opendir($dir);
while ($file=@readdir($dirs)) {
	$b="$dir/$file";
	$a=@is_dir($b);
	$size=@filesize("$dir/$file");
	$size=$size/1024 ;
    $size= @number_format($size, 3);    
	$lastsave=@date("Y-n-d H:i:s",filectime("$dir/$file"));
	
    echo "<tr>\n";

    if($a=="0"){
 $dj131452dj = $dj131452dj+1;
          echo "  <td><a href=\"".urlencode($file)."\">$dj131452dj  $file</td>\n";
 
        }
    else{
          echo "  <td><a href=\"".urlencode($file)."\">㊣ $file</td>\n";}
    
	echo "  <td>$lastsave</td>\n";
    echo "  <td>$size KB</td>\n";
	echo "</tr>\n";
}
@closedir($dirs);
  
   echo "→文件数量:"."<font color=\"#006600\">".$dj131452dj."</font>";

?>

</table>
<hr>
 <div style="background-color:#009999">
Copyright © 2014 逆流的鱼
 </div>

<i>2014/6/2优化…
<br><i>2014/6/6优化……
<br><i>2014/10/15优化——播放与暂停功能  未玩再待续…



<!-- 文本框_begin -->
 <form
  <tr>
    <td>
      <input id="id_text"  value="" type="text" name="dir" size="35">
      <button onclick="dj_text()" type="button">清空</button>
    </td>
  </tr>
  </form>
<!-- 文本框_end -->



<!-- 按钮1_begin -->
<button onclick="dj_video()" type="button">看Video</button>

<!-- 按钮2_begin -->
<button onclick="dj_music()" type="button">听Music ♪</button>

<!-- 按钮3_begin -->
<button onclick="dj_code_beta()" type="button">CodeBeta ™</button>



<a href="http://127.0.0.1:8080/">刷新</a>



<br>
<br>



<!-- 自定义代码区 ------------------------------------->
<script> 
function dj_video() {  
//--视频区_按钮1执行这里---
   document.getElementById("id_mp4_src").src=document.getElementById("id_text").value
   document.getElementById("id_video").load();
   id_audio.pause();
 } 


function dj_music() {  
//--音乐区_按钮2执行这里--
   document.getElementById("id_mp3_src").src=document.getElementById("id_text").value
   document.getElementById("id_audio").load();
   id_video.pause();
 } 
 
 
function dj_text() {  
//--清空文本区--
   document.getElementById("id_text").value=""
 } 


function dj_code_beta() {
//--代码测试区--
   document.getElementById("id_text").value="CodeBeta.mp4"
      document.getElementById("id_mp3
