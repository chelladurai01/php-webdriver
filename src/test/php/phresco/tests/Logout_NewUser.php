
<?php
/*Need to provide locations for each test case:

Author by {phresco} QA Automation Team

*/
require_once 'DrupalCommonFun.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';

class Logout_NewUser extends DrupalCommonFun
{
    protected function Browser()
    { 
    	parent::setUp();
    }
     public function testLogout()
    { 
    	parent::Title();
    	parent::DoLogin();
        parent::DoLogout();
    	
	}
    
}
?>