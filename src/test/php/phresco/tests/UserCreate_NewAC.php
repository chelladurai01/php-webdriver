
<?php
/*
Author by {phresco} QA Automation Team

*/
require_once 'DrupalCommonFun.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';

class UserCreate_NewAC extends DrupalCommonFun
{
	protected function Browser()
	{
		parent::setUp();
	}
	public function testNewAC()
	{
		parent::Title();
			
		try {
			if ($this->isElementPresent(DRU_MENU_SIGNUP_LINK))
			$this->clickAndWait(DRU_MENU_SIGNUP_LINK);
			sleep(WAIT_FOR_NEXT_LINE);
		}
		catch (Exception $e) {}

		$property = new DrupalCommonFun;
		$properties = $property->UserInfo();

		$this->type(DRU_SIGN_UNAME,$properties['server.Username']);
		sleep(WAIT_FOR_NEXT_LINE);
			
		$this->type(DRU_SIGN_EMAIL,$properties['server.EMailAddress']);
		sleep(WAIT_FOR_NEXT_LINE);
			
		$this->type(DRU_SIGN_PASS1,$properties['server.Password']);
		sleep(WAIT_FOR_NEXT_LINE);
			
		$this->type(DRU_SIGN_PASS2,$properties['server.ConfirmPassword']);
		sleep(WAIT_FOR_NEXT_LINE);
			
		if ($this->isElementPresent(DRU_SIGN_CREATE))
		$this->clickAndWait(DRU_SIGN_CREATE);
		try {
			$this->assertTrue($this->isTextPresent(DRU_SIGN_TXT_SUC));
			sleep(WAIT_FOR_NEXT_LINE);
		}
		catch (Exception $e)
		{
			parent::doCreateScreenShot(__FUNCTION__);
			array_push($this->verificationErrors, $e->toString());
		}
	}
}
?>