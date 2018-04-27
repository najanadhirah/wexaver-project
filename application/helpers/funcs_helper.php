<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	function createEncPass($password) {

		// from https://alias.io/2010/01/store-passwords-safely-with-php-and-mysql/
		// using random generated salt
		// A higher "cost" is more secure but consumes more processing power
		$cost = 10;
		$string = 'DH#$S.D3JLKM12N@%1';
		// Create a random salt
		$salt = strtr(base64_encode($string), '+', '.');

		// Prefix information about the hash so PHP knows how to verify it later.
		// "$2a$" Means we're using the Blowfish algorithm. The following two digits are the cost parameter.
		$salt = sprintf("$2a$%02d$", $cost) . $salt;

		// Value:
		// $2a$10$eImiTXuWVxfM37uY4JANjQ==

		// Hash the password with the salt
		$hash = crypt($password, $salt);

		return $hash;
	}

	/**
	 * simple method to encrypt or decrypt a plain text string
	 * initialization vector(IV) has to be the same when encrypting and decrypting
	 * PHP 5.4.9
	 *
	 * this is a beginners template for simple encryption decryption
	 * before using this in production environments, please read about encryption
	 *
	 * @param string $action: can be 'encrypt' or 'decrypt'
	 * @param string $string: string to encrypt or decrypt
	 *
	 * @return string
	 *
	 * https://naveensnayak.wordpress.com/2013/03/12/simple-php-encrypt-and-decrypt/
	 */
	function encrypt_decrypts($action, $string) {
		$output = false;

		$encrypt_method = "AES-256-CBC";
		$secret_key = '@ A203940@#$ b! $@#! -23kl;sj';
		$secret_iv = '@ A20c940@#$ a! $@#! -23kl1sj';

		// hash
		$key = hash('sha256', $secret_key);

		// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
		$iv = substr(hash('sha256', $secret_iv), 0, 16);

		if( $action == 'encrypt' ) {
			$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
			$output = base64_encode($output);
		}
		else if( $action == 'decrypt' ){
			$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
		}

		return $output;
	}
?>
