<?php

use almarag\adldap\IAdLdapRepository as Ldap;

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
            $username = Request::get('username');
            $password = Request::get('password');
            return $this->adLdap->changePassword($username, $password);
	}
}
