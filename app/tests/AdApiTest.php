<?php
	
class AdApiTest extends TestCase {
	
	public function testIsUserInformationRetrieved()
	{
        $username = 'testuser';		
        $this->call('GET','api/v1/info/'.$username);
		$this->assertResponseOk();
	}
	
	public function testIsChangePasswordSuccess()
	{
        $username = 'testuser';
        $newPassword = '123456$%6';

        $this->call('PUT', '/api/v1/changePassword', array( 'username' => $username, 'password' => $newPassword));
        $this->assertResponseOk();
	}
}