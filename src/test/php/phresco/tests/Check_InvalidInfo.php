<?php
/*
Author by {phresco} QA Automation Team

*/
require_once 'DrupalCommonFun.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';
class Check_InvalidInfo extends DrupalCommonFun
{
	protected function Browser()
	{
		parent::setUp();
	}
	public function testInvalid()
	{
		parent::Title();
		 
		try {
			if ($this->isElementPresent(DRU_LOGIN))
			$this->clickAndWait(DRU_LOGIN);
			sleep(WAIT_FOR_NEXT_LINE);
		}
		catch (Exception $e) {}
		$this->type(DRU_UNAME, DRU_USER_INVALID_NAME);
		sleep(WAIT_FOR_NEXT_LINE);

		$this->type(DRU_PWORD,DRU_PASS_WORD);
		sleep(WAIT_FOR_NEXT_LINE);

		try {
			if ($this->isElementPresent(DRU_LOGIN_BUTTON))
			$this->clickAndWait(DRU_LOGIN_BUTTON);
		}
		catch (Exception $e) {}
		$this->clickAndWait(DRU_USER_INVALID_FORGET_PASS);
		sleep(WAIT_FOR_NEXT_LINE);

		$property = new DrupalCommonFun;
		$properties = $property->UserInfo();

		$this->type(DRU_PASS_INVALID_MAIL,$properties['server.UsernameOrEMailAddress']);
		$this->clickAndWait(DRU_PASS_INVALID_MAIL_BCLICK);
		sleep(WAIT_FOR_NEXT_LINE);

		try{
			$this->assertTrue($this->isTextPresent(DRU_TXT_PRE_INVALID_MAILID));
		}
		catch (Exception $e) {
			parent::doCreateScreenShot(__FUNCTION__);
			array_push($this->verificationErrors, $e->toString());
		}
		 
	}

}
?>