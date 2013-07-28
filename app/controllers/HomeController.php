<?php

class HomeController extends BaseController {

	/*
	* get landing page
	*/

	public function getIndex()
	{
		//make an educated guess about the countrycode based on IP address
		$ip = Request::getClientIp();
		//skip sending a request to geoplugin when on dev
		$countryName = (App::environment() == 'dev') ? 'HK' : self::getCountryFromIp($ip);;
		$countryCode = self::getCountryCodeFromCountryName($countryName);
		//return the view
		return View::make('landing')
			->with('countryCode', $countryCode);
	}

	public function getGetmore()
	{
		$userEmail = Input::get('email');
		return View::make('getmore')
			->with('userEmail', $userEmail);
	}

	public function getPaymentsuccess()
	{
		return View::make('paymentsuccess');
	}

	public function getPaymentcancel()
	{
		return View::make('paymentcancel');
	}

	public function getTos()
	{
		return View::make('tos');
	}

	public function getPhonenumberguide()
	{
		return View::make('phonenumberguide');
	}

	/*
	* get guess country name from user ip
	*/

	protected static function getCountryFromIp($ip)
	{
		//make it easier for testing - ignore local ips
		if(!$ip || substr($ip, 0, 7) == '192.168' || substr($ip, 0, 7) == '127.0.0' ) {
			$ip = '';
		}
		//send request to geoplugin
		$xml = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=".$ip);
		return (string) $xml->geoplugin_countryCode;
	}

	/*
	* get country code (phone) from a name
	*/

	protected static function getCountryCodeFromCountryName($countryName)
	{
		if(!$countryName) return '';
		$xml = simplexml_load_file(app_path().'/lib/icc.xml');
		$code = (string) $xml->$countryName;
		return ($code) ? $code : '';
	}

}