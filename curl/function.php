<?php

function base64_url_encode($input) {
 	return strtr(base64_encode($input), '+/=', '._-');
}

function base64_url_decode($input) {
 	return base64_decode(strtr($input, '._-', '+/='));
}

function cari($cari='')
{
	$url = "http://www.chordfrenzy.com/c_search.php?skey=".$cari;
	//echo $url;
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	curl_setopt($ch, CURLOPT_PROXY, null);

	$data = curl_exec($ch);
	$info = curl_getinfo($ch);
	$error = curl_error($ch);

	/*echo "<pre>";
	echo $data;
	print_r($info);
	echo $error;
	echo "</pre>";*/
	curl_close($ch);
	$dom = new simple_html_dom(null, true, true, DEFAULT_TARGET_CHARSET, true, DEFAULT_BR_TEXT, DEFAULT_SPAN_TEXT);

	//$content = 
	//$html = $dom->load($content, true, true);
	//$html = $dom->load_file($url);//$dom->load($content, true, true);
	$html = file_get_html($url);
	
	$list_band = array();
	$jd = "";
	foreach($html->find('.search') as $ell){
		$i=1;
		$tmp = [];
		
		foreach ($ell->find('.listitem') as $td) {
			/*$a = $td->find("a");
			echo $td->find("a")->plaintext;*/
			foreach ($td->find('a') as $a) {
				$tmp['href'] = $a->href;
				foreach ($a->find('.subtitle') as $sb) {
					$tmp['subtitle'] = $sb->plaintext;
				}
				foreach ($a->find('.title') as $sb) {
					$tmp['title'] = $sb->plaintext;
				}
			}
			array_push($list_band, $tmp);
		}
		/*foreach ($ell->find('td') as $td) {
			if($i==2){
				$sp = explode(" ", $td->plaintext);
				$txt = $sp[5];
				$nt = $txt+1;
				$a = "http://www.mangacanblog.com/baca-komik-one_piece-$txt-$nt-bahasa-indonesia-one_piece-$txt-terbaru.html";
				$tmp["link"] = $a;
				$tmp["judul"] = $td->plaintext;
			}
			if($i==3){
				$tmp['date'] = $td->plaintext;
			}
			$i++;
		}*/
	}
	return $list_band;
	/*echo "<pre>";
	print_r($list_band);
	echo "</pre>";*/
}

//$list_manga = ini("http://www.mangacanblog.com/baca-komik-one_piece-bahasa-indonesia-online-terbaru.html");


function chord($url='')
{
	//echo $url;
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	curl_setopt($ch, CURLOPT_PROXY, null);

	$data = curl_exec($ch);
	$info = curl_getinfo($ch);
	$error = curl_error($ch);

	/*echo "<pre>";
	echo $data;
	print_r($info);
	echo $error;
	echo "</pre>";*/
	curl_close($ch);
	$dom = new simple_html_dom(null, true, true, DEFAULT_TARGET_CHARSET, true, DEFAULT_BR_TEXT, DEFAULT_SPAN_TEXT);

	$html = file_get_html($url);
	/*boxmain*/
	$ret = [];
	foreach($html->find('.boxmain') as $ell){
		$jdl = $html->find('.boxtitle', 0);
		//echo $jdl->plaintext."<br>";
		$ret['judul'] = $jdl->plaintext;
		$cot = $html->find('#content', 0);
		//echo $cot->plaintext."<br>";
		$ret['content'] = $cot;
		
	}
	return $ret;
}



function tag($cari='')
{
	$url = "http://www.chordfrenzy.com/tag/".strtolower($cari);
	//echo $url;
	
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	curl_setopt($ch, CURLOPT_PROXY, null);

	$data = curl_exec($ch);
	$info = curl_getinfo($ch);
	$error = curl_error($ch);

	/*echo "<pre>";
	echo $data;
	print_r($info);
	echo $error;
	echo "</pre>";*/
	curl_close($ch);
	$dom = new simple_html_dom(null, true, true, DEFAULT_TARGET_CHARSET, true, DEFAULT_BR_TEXT, DEFAULT_SPAN_TEXT);

	$html = file_get_html($url);
	/*boxmain*/

	$list_band = array();
	foreach($html->find('.search') as $ell){
		$tmp = [];
		foreach($ell->find('.listitem') as $ls){
			foreach($ls->find('a') as $a){
				$tmp['href'] = $a->href;
				$subtitle = $a->find(".subtitle", 0);
				$tmp['subtitle'] = $subtitle->plaintext;
			}

			array_push($list_band, $tmp);
		}
	}
	return $list_band;
}


function band($url='')
{
	//$url = "http://www.chordfrenzy.com/c_search.php?skey=".$cari;
	//echo $url;
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	curl_setopt($ch, CURLOPT_PROXY, null);

	$data = curl_exec($ch);
	$info = curl_getinfo($ch);
	$error = curl_error($ch);

	/*echo "<pre>";
	echo $data;
	print_r($info);
	echo $error;
	echo "</pre>";*/
	curl_close($ch);
	$dom = new simple_html_dom(null, true, true, DEFAULT_TARGET_CHARSET, true, DEFAULT_BR_TEXT, DEFAULT_SPAN_TEXT);

	$html = file_get_html($url);
	
	$list_band = array();
	$jd = "";
	foreach($html->find('.search') as $ell){
		$i=1;
		$tmp = [];
		
		foreach ($ell->find('.listitem') as $td) {
			foreach ($td->find('a') as $a) {
				$tmp['href'] = $a->href;
				foreach ($a->find('.subtitle') as $sb) {
					$tmp['subtitle'] = $sb->plaintext;
				}
				foreach ($a->find('.title') as $sb) {
					$tmp['title'] = $sb->plaintext;
				}
			}
			array_push($list_band, $tmp);
		}
	}
	return $list_band;
	/*echo "<pre>";
	print_r($list_band);
	echo "</pre>";*/
}





?>
