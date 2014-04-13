<?php
	include("menu.php");//加载导航栏
	if(is_uploaded_file($_FILES['upfile']['tmp_name']))
	{
		$upfile = $_FILES["upfile"];
		$name = $upfile["name"];
		$type = $upfile["type"];
		$size = $upfile["size"];
		$tmp_name = $upfile["tmp_name"];
		$error = $upfile["error"];

		$max_file_size = 512000;//限制文件大小为300KB内
		if($max_file_size < $size)
		//检查文件大小
		{
			echo "<script language = \"javascript\">alert('图片过大，请保持在500K内！');history.go(-1)</script>";
			exit;
		}
		switch($type)//判断上传文件类型，只能为图片
		{
			case 'image/pjepg' : $ok = 1;
			break;
			case 'image/jpeg' : $ok = 1;
			break;
			case 'image/gif' : $ok = 1;
			break;
			case 'image/png' : $ok = 1;
			break;
		}
		if($ok && $error == '0')
		{
			move_uploaded_file($tmp_name,'upload/14-03/'.$name);
			echo "<script language = \"javascript\">alert('上传成功！');</script>";
			echo "<center>";

			$imgurl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'upload/14-03/'.$upfile["name"];
			echo "<br /><br />".'外链地址：'.'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'upload/14-03/'.$upfile["name"]."<br /><br />";//生成外链地址
			/*
			echo '镜像地址（推荐）：'.'http://idownload.qiniudn.com/'.$_SERVER['REQUEST_URI'].'upload/14-03/'.$upfile["name"];//生成七牛云存储镜像地址
			
			$qiniu = 'http://idownload.qiniudn.com/'.$_SERVER['REQUEST_URI'].'upload/14-03/'.$upfile["name"];//赋值七牛镜像地址
			*/
			echo "<a href = \"".$imgurl."\" target = \"_blank\">打开图片</a>";//打开镜像地址图片
			echo "</center>";
			
		}
		else
		{
			echo "<script language = \"javascript\">alert('上传失败，文件格式不支持！');history.go(-1)</script>";
			exit;
		}
	}
?>

<!--公告说明-->
<div id = "gonggao">
<p><center><b>说明</b></center></p>
<span style = "color:red;">
1、禁止上传色情、暴力、反动内容，否则将直接删除<br />
2、图片大小限制为500K<br />
3、外链地址只能用来临时使用，说不定哪天就挂了。<br />
4、关于源码，请在关于页面下载<br />
</span>
</div>

<!--上传表单-->
<div id = "up">
<form action = "" enctype = "multipart/form-data" method = "post" name = "upform">
	上传文件：
	<input type = "file" name = "upfile">
	<input type = "submit" value = "上传"><br />
</form>
</div>
<div id = "copy">
<hr />
<center>&copy2013-2014&nbsp;Powered by <a href = "http://www.zouxiuping.com/" target = "_blank" title = "小z博客" >小z博客</a>&nbsp;|&nbsp;Email：service@zouxiuping.com</center>
</div>