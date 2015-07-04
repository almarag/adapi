<?php
use almarag\adldap;
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
        $request = new ChangePasswordRequest();
        $request->username = $data['username'];
        $request->password = $data['password'];
        
        return $this->adLdap->changePassword($request);
	}
                
    public function createUser()
    {
        $data = Input::all();
        $request = new UserRequest();
        $request->username = $data['username'];
        $request->password = $data['password'];
        $request->displayName = $data['displayName'];
        $request->sn = $data['sn'];
        $request->mail = $data['mail'];

        return $this->adLdap->createUser($request);
    }
        
    public function deleteUser()
    {
        $data = Input::all();
        $request = new UserRequest();
        $request->username = $data['username'];

        return $this->adLdap->deleteUser($request);
    }


    public function updateUser()
    {
        $data = Input::all();
        $request = new UserRequest();
        $request->username = $data['username'];
        $request->password = $data['password'];
        $request->displayName = $data['displayName'];
        $request->sn = $data['sn'];
        $request->mail = $data['mail'];

        return $this->adLdap->updateUser($request);
    }

    public function authorize()
    {
        $data = Input::all();
        $request = new AuthorizeRequest();
        $request->token = $data['token'];
        $request->username = $data['username'];
        $request->applicationId = $data['applicationId'];

        return $this->adLdap->authorize($request);
    }

    public function authenticate()
    {
        $data = Input::all();
        $request = new AuthenticateRequest();
        $request->username = $data['username'];
        $request->pasword = $data['password'];

        return $this->adLdap->authenticate(array());
    }
}