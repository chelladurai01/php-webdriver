<?php
/*Author by {phresco} QA Automation Team

*/
require_once 'DrupalCommonFun.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';
class Myaccount extends DrupalCommonFun
{
	protected function Browser()
	{
		parent::setUp();
	}
	public function testMyAccount()
	{
		parent::Title();
		parent::DoLogin();
		sleep(WAIT_FOR_NEXT_LINE);
		
		if ($this->isElementPresent(DRU_MENU_MYACCOUNT_LINK))
		$this->clickAndWait(DRU_MENU_MYACCOUNT_LINK);

		$property = new DrupalCommonFun;
		$properties = $property->UserInfo();

		$this->clickAndWait(DRU_MYAC_EDIT);
		sleep(WAIT_FOR_NEXT_LINE);
			
		$this->type(DRU_MYAC_CURPASS,$properties['server.CurrentPassword']);
		sleep(WAIT_FOR_NEXT_LINE);
			
		$this->type(DRU_MYAC_MAIL,$properties['server.EMailAddress']);
		sleep(WAIT_FOR_NEXT_LINE);
			
		$this->type(DRU_MYAC_NEWPASS,$properties['server.password']);
		sleep(WAIT_FOR_NEXT_LINE);
			
		$this->type(DRU_MYAC_CONFIRMPASS,$properties['server.ConfirmPassword']);
		$this->clickAndWait(DRU_MYAC_SAVE);
		try {
			$this->assertTrue($this->isTextPresent(DRU_MYAC_COFIRM_MSG));
			sleep(WAIT_FOR_NEXT_LINE);
		}
		catch (Exception $e) {
			parent::doCreateScreenShot(__FUNCTION__);
			array_push($this->verificationErrors, $e->toString());
		}

	}
}
?>