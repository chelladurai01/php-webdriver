<?php
/*
Author by {phresco} QA Automation Team

*/
require_once 'DrupalCommonFun.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';

class UserReq_NewPassword extends DrupalCommonFun
{
	protected function Browser()
	{
		parent::setUp();
	}
	public function testReqPassword()
	{
		parent::Title();
		$property = new DrupalCommonFun;
		$properties = $property->UserInfo();
		try {
			if ($this->isElementPresent(DRU_MENU_SIGNUP_LINK))
			$this->clickAndWait(DRU_MENU_SIGNUP_LINK);
		}
		catch (Exception $e) {}
		$this->clickAndWait(DRU_SIGN_REQ_PASS);
		sleep(WAIT_FOR_NEXT_LINE);
			
		$this->type(DRU_SIGN_MAIL,$properties['server.UsernameOrEMailAddress']);
		$this->clickAndWait(DRU_SIGN_SUBMIT);
		try {
			$this->assertTrue($this->isTextPresent(DRU_TXT_PRE_INVALID_MAILID));
			sleep(WAIT_FOR_NEXT_LINE);
		}
		catch (Exception $e) {
			parent::doCreateScreenShot(__FUNCTION__);
			array_push($this->verificationErrors, $e->toString());
		}
			


	}

}
?>