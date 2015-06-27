<?php

include_once './cwbot.php';
include_once './scraping.php';

// スクレイピング結果
$scraper = new scraping();
list($name, $from) = $scraper->get_html_contents();

$template = "%s に出てくるキャラクター:%s";

$body = "[info][title]ｶｰﾁｬﾝからのお知らせ[/title]J( 'ｰ`)し 「おはよう たけし、今日はあなたの好きな " . sprintf($template, $from, $name) . " の誕生日よ」[/info]";

$bot = new cwbot(31481999);

$bot->post_message($body);
