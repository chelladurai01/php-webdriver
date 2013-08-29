<?php
/*Author by {phresco} QA Automation Team

*/
require_once 'UserCreate_NewAC.php';
require_once 'Login_NewUsers.php';
require_once 'UserReq_NewPassword.php';
require_once 'Myaccount.php';

class UserAll extends PHPUnit_Framework_TestSuite
{
 
 protected function setUp()
    {
		parent::setUp();
    }
 public static function suite()
    {
	$testSuite= new UserAll('UserTestSuite');
	$testSuite->addTest(new UserCreate_NewAC("testNewAC"));
	$testSuite->addTest(new Login_NewUsers("testLogin"));
	$testSuite->addTest(new Myaccount("testMyAccount"));
	$testSuite->addTest(new UserReq_NewPassword("testReqPassword"));
	return $testSuite;
	}
	}
?>