<?php


class cwbot
{
	static
		$ROOM_ID;
	
	const TOKEN = ''; // to use set chwork token

public
 function __construct($room_id)
{
	self::$ROOM_ID = $room_id;
}

	function post_message($message)
	{
		header('Content-type: application/json; charset=utf-8');

		$option = array('body' => $message);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://api.chatwork.com/v1/rooms/' . self::$ROOM_ID. '/messages');
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-ChatWorkToken: '. self::TOKEN));
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($option, '', '&'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$response = curl_exec($ch);
		curl_close($ch);
		echo $response . "\n";
	}

}

