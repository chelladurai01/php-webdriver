
<?php
/*Author by {phresco} QA Automation Team

*/
require_once 'DrupalCommonFun.php';

class Login_NewUser extends DrupalCommonFun
{
    protected function Browser()
    { 
    	parent::setUp();
    }
     public function testLogin()
	{
	   	parent::Title();
        sleep(WAIT_FOR_NEXT_LINE);
    	parent::DoLogin();
        sleep(WAIT_FOR_NEXT_LINE);
     }
	  
		
}
?>