<?php

use almarag\adldap\IAdLdapRepository as Ldap;
use almarag\Exception as Exception;

class ApiController extends \BaseController {

    protected $adLdap;

    public function __construct(Ldap $adLdap) {
        $this->adLdap = $adLdap;       
    }
        
	/**
	 * Get a JSON array with the basic info about a user
	 *
	 * @return Response
	 */
	public function info($id = null)
	{
        return $this->adLdap->info($id);
	}   
        
    /**
     * Changes password for given user
     * 
     * @return Response
     */
	public function changePassword()
	{
        $data = Input::all();        
        $username = $data['username'];
        $password = $data['password'];
        
        return $this->adLdap->changePassword($username, $password);
	}
                
    public function createUser()
    {
        $userInfo = array();
        return $this->adLdap->createUser($userInfo);        
    }
        
    public function deleteUser()
    {
        $username = Request::get('username');
        return $this->adLdap->deleteUser($username);        
    }


    public function updateUser()
    {
        return $this->adLdap->updateUser(array());
    }

    public function authorize()
    {
        $token = null;
        return $this->adLdap->authorize($token);
    }

    public function authenticate()
    {
        return $this->adLdap->authenticate(array());
    }
}