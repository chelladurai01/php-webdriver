<?php
/*Author by {phresco} QA Automation Team

*/
require_once 'DrupalCommonFun.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';

class Manufacturers extends DrupalCommonFun
{
	protected function Browser()
	{
		parent::setUp();
	}
	public function testManufacturers()
	{
		parent::Title();
			
		try {
			if ($this->isElementPresent(DRU_MANUFACT_ACER))
			$this->clickAndWait(DRU_MANUFACT_ACER);

			if ($this->isElementPresent(DRU_MANUFACT_AMD))
			$this->clickAndWait(DRU_MANUFACT_AMD);

			if ($this->isElementPresent(DRU_MANUFACT_DELL))
			$this->clickAndWait(DRU_MANUFACT_DELL);

			if ($this->isElementPresent(DRU_MANUFACT_INTEL))
			$this->clickAndWait(DRU_MANUFACT_INTEL);

			if ($this->isElementPresent(DRU_MANUFACT_LENOVA))
			$this->clickAndWait(DRU_MANUFACT_LENOVA);

			if ($this->isElementPresent(DRU_MANUFACT_SAMSUNG))
			$this->clickAndWait(DRU_MANUFACT_SAMSUNG);

			if ($this->isElementPresent(DRU_MANUFACT_SONY))
			$this->clickAndWait(DRU_MANUFACT_SONY);

			if ($this->isElementPresent(DRU_MANUFACT_TOSHIBA))
			$this->clickAndWait(DRU_MANUFACT_TOSHIBA);
		}
		catch (Exception $e) {}
			
	}

}
?>