<?php
/*Author by {phresco} QA Automation Team

*/
require_once 'DrupalCommonFun.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';
class Search_Products extends DrupalCommonFun
{
	protected function Browser()
	{
		parent::setUp();
	}
	public function testSearch()
	{
		parent::Title();
		sleep(WAIT_FOR_NEXT_LINE);
		$this->click(DRU_SEARCH);
		
		sleep(WAIT_FOR_NEXT_LINE);
		$this->type(DRU_SEARCH,DRU_SEARCH_DESK);
		$this->clickAndWait(DRU_SEARCH_BUT);
			
		try {
			$this->assertTrue($this->isTextPresent(DRU_SEARCH_RESULT));
		}
		catch (Exception $e) {}
		$this->clickAndWait(DRU_SEARCH_DESK_VAL);
		$this->clickAndWait(DRU_MENU_HOME_LINK);
		
		sleep(WAIT_FOR_NEXT_LINE);
		$this->click(DRU_SEARCH);
		sleep(WAIT_FOR_NEXT_LINE);
			
		$this->type(DRU_SEARCH,DRU_SEARCH_LAP);
		$this->clickAndWait(DRU_SEARCH_BUT);
		sleep(WAIT_FOR_NEXT_LINE);
		try {
			$this->assertTrue($this->isTextPresent(DRU_SEARCH_RESULT));
		}
		catch (Exception $e) {
			parent::doCreateScreenShot(__FUNCTION__);
			array_push($this->verificationErrors, $e->toString());
		}

		$this->clickAndWait(DRU_SEARCH_LAP_VAL);
		sleep(WAIT_FOR_NEXT_LINE);
	}

}
?>