<?php

namespace OAuth2\Provider;

use OAuth2\Provider;
use OAuth2\Token_Access;

class Vkontakte extends Provider
{
	public $name = 'vkontakte';

	public $uid_key = 'uid';

	public $scope = array('wall','photos','offline','friends','messages');

	public function url_authorize()
	{
		return 'https://oauth.vk.com/authorize';
	}

	public function url_access_token()
	{
		return 'https://oauth.vk.com/access_token';
	}

	public function get_user_info(Token_Access $token)
	{
		$url = 'https://api.vk.com/method/users.get?'.http_build_query(array(
			'access_token' => $token->access_token,
		));

		$user = json_decode(file_get_contents($url));

		// Create a response from the request
		return array(
			'uid' => $user->id,
			'nickname' => $user->username,
			'name' => $user->name,
			'email' => $user->email,
			'location' => $user->hometown->name,
			// 'description' => $user->bio,
			'image' => 'https://graph.facebook.com/me/picture?type=normal&access_token='.$token->access_token,
			'urls' => array(
			  'Facebook' => $user->link,
			),
		);
	}
}
