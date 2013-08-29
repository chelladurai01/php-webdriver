<?php
/*
Author by {phresco} QA Automation Team

*/
require_once 'DrupalCommonFun.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';
class CartContent_Delete extends DrupalCommonFun
{
	protected function Browser()
	{
		parent::setUp();
	}
	public function testRemove()
	{
		parent::Title();
		parent::DoLogin();
		try {
			if ($this->isElementPresent(DRU_DESK_LINK))
			$this->clickAndWait(DRU_DESK_LINK);
		}
		catch (Exception $e) {}
		$this->clickAndWait(DRU_PRODUCT_ID1);

		try {
			if ($this->isElementPresent(DRU_LAP_LINK))
			$this->clickAndWait(DRU_LAP_LINK);
		}
		catch (Exception $e) {}
		$this->clickAndWait(DRU_PRODUCT_ID2);
			
		$this->clickAndWait(DRU_REMOVE);

	 try {
	 	$this->assertTrue($this->isTextPresent(DRU_CONFORM_REMOVE));
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