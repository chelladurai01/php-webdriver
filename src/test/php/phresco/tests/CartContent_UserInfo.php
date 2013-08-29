<?php
/*
Author by {phresco} QA Automation Team

*/
require_once 'DrupalCommonFun.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';
class CartContent_UserInfo extends DrupalCommonFun
{
	protected function cartContent()
	{
		parent::setUp();
	}
	public function testCartContentUser()
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
		$this->clickAndWait(DRU_CHECKOUT);
			
		$property = new DrupalCommonFun;
		$properties = $property->UserInfo();
			
		$this->type(DRU_DELI_CFNAME,$properties['server.FirstName']);
		sleep(WAIT_FOR_NEXT_LINE);
			
		$this->type(DRU_DELI_CLNAME,$properties['server.LastName']);
		sleep(WAIT_FOR_NEXT_LINE);
			
		$this->type(DRU_DELI_COMPANY,$properties['server.Company']);
		sleep(WAIT_FOR_NEXT_LINE);
			
		$this->type(DRU_DELI_STREET1,$properties['server.StreetAddress1']);
		sleep(WAIT_FOR_NEXT_LINE);
			
		$this->type(DRU_DELI_STREET2,$properties['server.StreetAddress2']);
		sleep(WAIT_FOR_NEXT_LINE);
			
		$this->type(DRU_DELI_CITY2,$properties['server.City']);
		sleep(WAIT_FOR_NEXT_LINE);
			
		$this->select(DRU_DELI_ZONE,$properties['server.StateProvince']);
		sleep(WAIT_FOR_NEXT_LINE);

		$this->type(DRU_DELI_PCODE,$properties['server.PostalCode']);
		sleep(WAIT_FOR_NEXT_LINE);
			
		$this->type(DRU_DELI_PH_NUM,$properties['server.PhoneNumber']);
		sleep(WAIT_FOR_NEXT_LINE);
        
		$this->click(DRU_BILL_INFO);
        sleep(WAIT_FOR_NEXT_LINE);
		$this->click(DRU_BILL_CASH);
			
		$this->type(DRU_COMMENTS,$properties['server.OrderComments']);
         sleep(WAIT_FOR_NEXT_LINE);
		$this->clickAndWait(DRU_REVIEW_ORDER);
		try {
			if ($this->isElementPresent(DRU_SUBMIT_ORDER))
			$this->clickAndWait(DRU_SUBMIT_ORDER);
		}
		catch (Exception $e) {}
			
		try {
			if (!$this->isElementPresent(DRU_CURRENT_STATUS)) break;
			$this->clickAndWait(DRU_CURRENT_STATUS);
			
			$this->assertFalse($this->isTextPresent(DRU_PRINT));
			sleep(WAIT_FOR_NEXT_LINE);
		}
		catch (Exception $e) {
			parent::doCreateScreenShot(__FUNCTION__);
			array_push($this->verificationErrors, $e->toString());
		}
	}
}
?>