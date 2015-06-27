<?php

include_once './lib/simple_html_dom.php';

class scraping
{

	public
		function get_html_contents()
	{
		date_default_timezone_set('Asia/Tokyo');
		$now = time();
		$m_d = date('n_j', $now);
		$month_str = date('F', $now);
		$month_str = strtolower($month_str);

		$html = file_get_html("http://schara.sunrockgo.com/day/$month_str/$m_d.html");

		$ret = $html->find('ul[class=daychara]');

		// ランダムに1個
		$rand_max = count($ret);
		$rand = mt_rand(0, $rand_max - 1);

		// 対象のキャラの説明部分
		$particle = $ret[$rand];
		$content = str_get_html($particle->outertext);

		$name = $content->find('li[class=center] p');

		$from = $content->find('li[class=lower] cite');


		$res = array(
			$name[0]->plaintext,
			$from[0]->plaintext,
		);
		
		return $res;
	}
}
