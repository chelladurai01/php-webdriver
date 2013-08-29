<?php
/*
Author by {phresco} QA Automation Team

*/
require_once 'PHPUnit/Framework.php';
include 'basescreen.php';

require_once 'PHPUnit/Extensions/SeleniumTestCase.php';
class DrupalCommonFun extends PHPUnit_Extensions_SeleniumTestCase
{
	private $properties;
	private $host;
	private $port;
	private $context;
	private $protocol;
	private $serverUrl;

	protected function setUp()
	{
		$properties = parse_ini_file('config.ini', true);
		$browserName = $properties['browser.name'];
		print_r($properties);
		$this->setBrowser('*' . $browserName);
		$host = $properties['server.host'];
		$port = $properties['server.port'];
		$context = $properties['server.context'];
		$protocol = $properties['server.protocol'];
		$serverUrl = $protocol . ':'.'//' . $host . ':' . $port . $context . '/';
		echo $serverUrl;
		$this->setBrowserUrl($serverUrl);
		$screenShotsPath = getcwd()."//"."target\surefire-reports\screenshots";
		   if (!file_exists($screenShotsPath)) {
	    mkdir($screenShotsPath);
		}
	}
	public function Title()
	{
		$properties = parse_ini_file('config.ini', true);
		print_r($properties);
		$host = $properties['server.host'];
		$port = $properties['server.port'];
		$context = $properties['server.context'];
		$protocol = $properties['server.protocol'];
		$serverUrl = $protocol .':'. '//' . $host . ':' . $port . $context . '/';
		$this->open($serverUrl);
		$this->waitForPageToLoad(WAIT_FOR_NEXT_PAGES);
		$this->windowMaximize();
		$this->windowFocus();
		sleep(WAIT_FOR_NEXT_LINE);

	}
	function DoLogin(){

		$property = new DrupalCommonFun;
		$properties = $property->UserInfo();
		try {
			if (!$this->isTextPresent(DRU_TEXT_LOGOUT))
			sleep(WAIT_FOR_NEXT_LINE);
			$this->assertTrue($this->isElementPresent(DRU_LOGIN));
		}
		catch (PHPUnit_Framework_AssertionFailedError $e) {
			array_push($this->verificationErrors, $e->toString());
		}
		$this->clickAndWait(DRU_LOGIN);
		try {
			if (!$this->isElementPresent(DRU_LOGIN)) break;
		}
		catch (Exception $e) {}
			
		sleep(WAIT_FOR_NEXT_LINE);
		$this->type(DRU_UNAME, $properties['server.Username']);
		sleep(WAIT_FOR_NEXT_LINE);
		$this->type(DRU_PWORD,$properties['server.Password']);
		sleep(WAIT_FOR_NEXT_LINE);

		try {
			if ($this->isElementPresent(DRU_LOGIN_BUTTON))
			$this->clickAndWait(DRU_LOGIN_BUTTON);
			sleep(WAIT_FOR_NEXT_LINE);
		}
		catch (Exception $e) {}

		try {
			$this->assertTrue($this->isTextPresent(DRU_TEXT_LOGOUT));
		}
		catch (PHPUnit_Framework_AssertionFailedError $e) {
			$this->doCreateScreenShot(__FUNCTION__);
			array_push($this->verificationErrors, $e->toString());
		}
	}


	function DoLogout(){
		if ($this->isTextPresent(DRU_TEXT_LOGOUT)) {
			$this->clickAndWait(DRU_LOGOUT);
			sleep(WAIT_FOR_NEXT_LINE);
			try {
				$this->assertFalse($this->isTextPresent(DRU_TEXT_LOGOUT));
			}
			catch (PHPUnit_Framework_AssertionFailedError $e) {
				$this->doCreateScreenShot(__FUNCTION__);
				array_push($this->verificationErrors, $e->toString());
			}
		}
	}
	function UserInfo()
	{
		$property = parse_ini_file('settings.ini', true);
		return $property;
	}
	function doCreateScreenShot($file_name)
	{
		$this->captureEntirePageScreenshot(getcwd()."//"."target\surefire-reports\screenshots"."//".$file_name.'.png');
	}
     function tearDown()
	 {
	 $this->stop();
	 }

}
?>
