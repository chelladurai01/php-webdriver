<?php
/*
Author by {phresco} QA Automation Team

*/
require_once 'DrupalCommonFun.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';
class CartContent_Add extends DrupalCommonFun
{
	protected function cartContent()
	{
		parent::setUp();
	}
	public function testCartContent()
	{
		parent::Title();
		sleep(WAIT_FOR_NEXT_LINE);
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
		try {
			if ($this->isElementPresent(DRU_MON_LINK))
			$this->clickAndWait(DRU_MON_LINK);
		}
		catch (Exception $e) {}
		$this->clickAndWait(DRU_PRODUCT_ID7);
			
		try {
			if ($this->isElementPresent(DRU_MOBO_LINK))
			$this->clickAndWait(DRU_MOBO_LINK);
		}
		catch (Exception $e) {}
		$this->clickAndWait(DRU_PRODUCT_ID8);
			
		try {
			if ($this->isElementPresent(DRU_NBOOK_LINK))
			$this->clickAndWait(DRU_NBOOK_LINK);
		}
		catch (Exception $e) {}
		$this->clickAndWait(DRU_PRODUCT_ID5);
			
		try {
			if ($this->isElementPresent(DRU_PROCE_LINK))
			$this->clickAndWait(DRU_PROCE_LINK);
		}
		catch (Exception $e) {}
		$this->clickAndWait(DRU_PRODUCT_ID9);
			
		//$this->clickAndWait(DRU_USER_CART);
		sleep(WAIT_FOR_NEXT_LINE);

		 
		try {
			if ($this->isElementPresent(DRU_CHECKOUT))
			sleep(WAIT_FOR_NEXT_LINE);
			$this->assertTrue($this->isElementPresent(DRU_CHECKOUT));
			sleep(WAIT_FOR_NEXT_LINE);
		}
		catch (Exception $e) {
			parent::doCreateScreenShot(__FUNCTION__);
			array_push($this->verificationErrors, $e->toString());
		}
	}
}
?>