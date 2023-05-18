<?php

require 'vendor/autoload.php';
use GuzzleHttp\Client as Client;

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{

		$users=array(
			// username => password
			//$data[0]['email'] => $data[0]['password'],
			'demo'=>'demo',
			'admin'=>'admin',
		);

		$client = new Client();
		$response = $client->request('GET', 'https://my-json-server.typicode.com/proberto/demo/users');
		$res = $response->getBody()->getContents();
		$data = json_decode($res, true);
		
		foreach ($data as $dat){
			$user=array(
				$dat['email'] => $dat['password'],
			);
			
			$users = array_merge($users, $user);
		}

		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
	}
}