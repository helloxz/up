<?php
	include("menu.php");//���ص�����
	if(is_uploaded_file($_FILES['upfile']['tmp_name']))
	{
		$upfile = $_FILES["upfile"];
		$name = $upfile["name"];
		$type = $upfile["type"];
		$size = $upfile["size"];
		$tmp_name = $upfile["tmp_name"];
		$error = $upfile["error"];

		$max_file_size = 512000;//�����ļ���СΪ300KB��
		if($max_file_size < $size)
		//����ļ���С
		{
			echo "<script language = \"javascript\">alert('ͼƬ�����뱣����500K�ڣ�');history.go(-1)</script>";
			exit;
		}
		switch($type)//�ж��ϴ��ļ����ͣ�ֻ��ΪͼƬ
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
			echo "<script language = \"javascript\">alert('�ϴ��ɹ���');</script>";
			echo "<center>";

			$imgurl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'upload/14-03/'.$upfile["name"];
			echo "<br /><br />".'������ַ��'.'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'upload/14-03/'.$upfile["name"]."<br /><br />";//����������ַ
			/*
			echo '�����ַ���Ƽ�����'.'http://idownload.qiniudn.com/'.$_SERVER['REQUEST_URI'].'upload/14-03/'.$upfile["name"];//������ţ�ƴ洢�����ַ
			
			$qiniu = 'http://idownload.qiniudn.com/'.$_SERVER['REQUEST_URI'].'upload/14-03/'.$upfile["name"];//��ֵ��ţ�����ַ
			*/
			echo "<a href = \"".$imgurl."\" target = \"_blank\">��ͼƬ</a>";//�򿪾����ַͼƬ
			echo "</center>";
			
		}
		else
		{
			echo "<script language = \"javascript\">alert('�ϴ�ʧ�ܣ��ļ���ʽ��֧�֣�');history.go(-1)</script>";
			exit;
		}
	}
?>

<!--����˵��-->
<div id = "gonggao">
<p><center><b>˵��</b></center></p>
<span style = "color:red;">
1����ֹ�ϴ�ɫ�顢�������������ݣ�����ֱ��ɾ��<br />
2��ͼƬ��С����Ϊ500K<br />
3��������ַֻ��������ʱʹ�ã�˵��������͹��ˡ�<br />
4������Դ�룬���ڹ���ҳ������<br />
</span>
</div>

<!--�ϴ���-->
<div id = "up">
<form action = "" enctype = "multipart/form-data" method = "post" name = "upform">
	�ϴ��ļ���
	<input type = "file" name = "upfile">
	<input type = "submit" value = "�ϴ�"><br />
</form>
</div>
<div id = "copy">
<hr />
<center>&copy2013-2014&nbsp;Powered by <a href = "http://www.zouxiuping.com/" target = "_blank" title = "Сz����" >Сz����</a>&nbsp;|&nbsp;Email��service@zouxiuping.com</center>
</div>