<?php

namespace OAuth2\Provider;

use OAuth2\Provider;
use OAuth2\Token_Access;

class Linkedin extends Provider {

  public $name = 'linkedin';

	public $human = 'LinkedIn';

	public $uid_key = 'uid';

	public $method = 'POST';

	public $scope_seperator = ' ';

	public $logo_url = 'http://developer.linkedin.com/sites/default/files/LinkedIn_Logo16px.png';

	public function url_authorize()
	{
		return 'https://www.linkedin.com/uas/oauth2/authorization';
	}

	public function url_access_token()
	{
		return 'https://www.linkedin.com/uas/oauth2/accessToken';
	}

	public function __construct(array $options = array())
	{
		// Now make sure we have the default scope to get user data
		empty($options['scope']) and $options['scope'] = array(
			'r_basicprofile',
			'r_emailaddress'
		);

		// Array it if its string
		$options['scope'] = (array) $options['scope'];

		parent::__construct($options);
	}

	/*
	* Get access to the API
	*
	* @param	string  The access code
	* @return       object  Success or failure along with the response details
	*/
	public function access($code, $options = array())
	{
		if ($code === null)
		{
			throw new Exception(array('message' => 'Expected Authorization Code from '.ucfirst($this->name).' is missing'));
		}

		return parent::access($code, $options);
	}

	public function get_user_info(Token_Access $token)
	{
		$fields = array(
			'id',
			'first-name',
			'last-name',
			'formatted-name',
			'location:(name)',
			'picture-url',
			'public-profile-url',
			'email-address',
		);

		$url = 'https://api.linkedin.com/v1/people/~:(' . implode(',', $fields) . ')?' . http_build_query(array(
			'oauth2_access_token' => $token->access_token,
			'format' => 'json',
		));

		$user = json_decode(file_get_contents($url), true);

		return array(
			'uid' => $user['id'],
			'name' => $user['formattedName'],
			'first_name' => $user['firstName'],
			'last_name' => $user['lastName'],
			'email' => $user['emailAddress'],
			'image' => $user['pictureUrl'],
			'urls' => array(
				$this->name => $user['publicProfileUrl'],
			),
		);
	}
}
