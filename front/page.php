<?php
function page($total_page,$page,$url="")
{

	$up=$page-1;
	$dn=$page+1;
	if($page>1){
		$outstr .= "<a href='{$url}1'>首页</a>\r\n";
		$outstr .= "<a href='{$url}{$up}'>上一页</a>\r\n";
	}
	if($total_page>1 and $total_page<10 and $total_page!=0)
	{
		if($page==1)
		{
			$outstr .=  '<span class="cur">1</span>';
			for($i=2;$i<=$total_page;$i++)
			{
				$outstr .= "<a href='{$url}{$i}'>{$i}</a> \r\n";
			}
		}else {
			for($i=1;$i<=$total_page;$i++)
			{
				if($i==$page)
				{
					$outstr .=  '<span class="cur">'.$i.'</span>';
				}else
				{
					$outstr .= " <a href='{$url}{$i}'>{$i}</a> \r\n";
				}
			}
		}
	}else
	{
		if($page==1 and $total_page!=0 and $total_page!=1)
		{
			$outstr .=  '<span class="cur">1</span>';
			for($i=2;$i<=10;$i++)
			{
				$outstr .= "<a href='{$url}{$i}'>{$i}</a> \r\n";
			}
		}elseif($page<7 and $total_page!=0 and $total_page!=1)
		{
			for($i=1;$i<=10;$i++)
			{
				if($i==$page)
				{
					$outstr .=  '<span class="cur">'.$i.'</span>';
				}else
				{
					$outstr .= " <a href='{$url}{$i}'>{$i}</a> \r\n";
				}
			}
		}elseif($page<$total_page-3 and $total_page!=0 and $total_page!=1)
		{
			for($i=$page-5;$i<=$page+4;$i++)
			{
				if($i==$page)
				{
					$outstr .=  '<span class="cur">'.$i.'</span>';
				}else
				{
					$outstr .= " <a href='{$url}{$i}'>{$i}</a> \r\n";
				}
			}
		}elseif($page>=$total_page-3 and $total_page!=0 and $total_page!=1)
		{
			for($i=$total_page-10;$i<=$total_page;$i++)
			{
				if($i==$page)
				{
					$outstr .=  '<span class="cur">'.$i.'</span>';
				}else
				{
					$outstr .= " <a href='{$url}{$i}'>{$i}</a> \r\n";
				}
			}
		}
	}
	if($page<$total_page and $total_page!=1)
	{
		$outstr .= "<a href='{$url}{$dn}'>下一页</a> \r\n";
		$outstr .= "<a href='{$url}{$total_page}'>尾页</a>";
	}
	$outstr .= "<span class=\"tip\">页数：".$page."/".$total_page."</span>";
	return "<div class='page'>".$outstr."</div>";
}


function tohtml($file_name,$file_content){
	if (is_file ($file_name)){
		@unlink ($file_name);
	}
	$handle = fopen ($file_name,"w+");
	if (!is_writable ($file_name)){
		return false;
	}
	if (!fwrite ($handle,$file_content)){
		return false;
	}
	fclose ($handle); 
	return $file_name;
}
?>