<?php
/*Author by {phresco} QA Automation Team

*/
require_once 'DrupalCommonFun.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';
class AboutUs_Product extends DrupalCommonFun
{
	protected function Browser()
	{
		parent::setUp();
	}
	public function testAbout()
	{
		parent::Title();
			
		if ($this->isElementPresent(DRU_MENU_ABOUTUS_LINK))
		$this->clickAndWait(DRU_MENU_ABOUTUS_LINK);
		sleep(WAIT_FOR_NEXT_LINE);
	 try {
	 	$this->assertTextPresent(DRU_TEXT_PRESENT);
	 	sleep(WAIT_FOR_NEXT_LINE);
	 }
	 catch (Exception $e) {
	 	parent::doCreateScreenShot(__FUNCTION__);
	 	array_push($this->verificationErrors, $e->toString());
	 }
	}
}
?>