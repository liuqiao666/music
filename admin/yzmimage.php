<?
session_start();								//����session
header('Content-type: image/gif');						//���ͷ��Ϣ
$image_w=100;									//��֤��ͼ�εĿ�				
$image_h=35;									//��֤��ͼ�εĸ�
$number=range(0,9);								//����һ����ԱΪ���ֵ�����
$character=range("Z","A");							//����һ����ԱΪ��д��ĸ������
$result=array_merge($number,$character);				//�ϲ���������
$string="";										//��ʼ��
$len=count($result);								//������ĳ�
for($i=0;$i<4;$i++)
{
	$new_number[$i]=$result[rand(0,$len-1)];			//��$result���������ȡ��4���ַ�
	$string=$string.$new_number[$i];					//�����֤���ַ�
}
$_SESSION['yzm']=$string;						//ʹ��$_SESSION������ֵ
$check_image=imagecreatetruecolor($image_w,$image_h);	//����ͼƬ����
$white=imagecolorallocate($check_image, 255, 255, 255);	
$black=imagecolorallocate($check_image, 0, 0, 0);	
imagefill($check_image,0,0,$white);					//���ñ�����ɫΪ��ɫ
for($i=0;$i<100;$i++) 							//����100�����ŵĺڵ�
{
	imagesetpixel($check_image, rand(0,$image_w), rand(0,$image_h),$black);
}
for($i=0;$i<count($new_number);$i++)					//�ڱ���ͼƬ��ѭ�����4λ��֤��
{
	$x=mt_rand(1,8)+$image_w*$i/4;					//�趨�ַ�����λ��X���
	$y=mt_rand(8,$image_h/4);						//�趨�ַ�����λ��Y���
	//����趨�ַ���ɫ
	$color=imagecolorallocate($check_image,mt_rand(0,200),mt_rand(0,200),mt_rand(0,200));		
	//�����ַ�ͼƬ��
	imagestring($check_image,5,$x,$y,$new_number[$i],$color);	
}
	imagepng($check_image);
	imagedestroy($check_image);
?>
