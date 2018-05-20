<?php 
	header("Content-Type: text/html; charset=utf-8");
	error_reporting(0);
	session_start();
	$hostname="SMTP.163.com";  
	$port=25;  
	$username1="morly7@163.com";  
	$password1="LQ18282713971";  
	$mailto=$email;
	//echo $_SESSION['username'];
	//$mailto="1255394075@qq.com";  
	$mailbody="Hi ".$mailto." ".$connet."";
	$info=("Can't connect to SMTP Server"); 
	 
	$CRLF="\r\n";  
	$fp=fsockopen($hostname,$port) or die($info);  
	if(strncmp(fgets($fp,512),'220',3)!=0)   
	{  
	    die($info);  
	}  
	fwrite($fp,"helo $hostname".$CRLF); 
	$temp=fgets($fp,512);    
	fwrite($fp,"auth login".$CRLF); 
	$temp=fgets($fp,512);   
	fwrite($fp,base64_encode($username1).$CRLF);
	$u=fgets($fp,512);
	//echo $u;  
	if(strncmp($u,'334',3)!=0)  
	{  
	    die("用户名有误");  
	}  
	fwrite($fp,base64_encode($password1).$CRLF); 
	 $p=fgets($fp,512);
	 //echo $p;
	if(strncmp($p,'235',3)!=0)  
	{  
	    die("用户密码有误");  
	}  
	fwrite($fp,"MAIL FROM:<$username1>".$CRLF); 
	$temp=fgets($fp,512); 	 
	fwrite($fp,"RCPT TO:<$mailto>".$CRLF);  
    $temp= fgets($fp,512); 
	fwrite($fp,"DATA".$CRLF); 
	$temp= fgets($fp,512);  
	$subject="Subject:来自音悦sharing的通知邮件，请及时查收，谢谢！".$CRLF;  
	$from="From:<$email>".$CRLF;  
	$to="To:<$mailto>".$CRLF;  
	fwrite($fp,$subject.$from.$to.$CRLF.$mailbody.$CRLF.".".$CRLF); 
	$temp=fgets($fp,512);  
	fwrite($fp,"quit".$CRLF); 
	$temp=fgets($fp,512);
	echo "<script>alert('消息已发送成功!');location.href='exchange.php';</script>;";
	fclose($fp);
	
?>  