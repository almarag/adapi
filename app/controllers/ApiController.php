<?php
use almarag\adldap\ChangePasswordRequest as ChangePasswordRequest;
use almarag\adldap\UserRequest as UserRequest;
use almarag\adldap\AuthenticateRequest as AuthenticateRequest;
use almarag\adldap\AuthorizeRequest as AuthorizeRequest;
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
        try
        {
            $request = new ChangePasswordRequest();
            $request->username = Request::input('username');
            $request->password = Request::input('password');
            return $this->adLdap->changePassword($request);
        }
        catch (Exception $ex)
        {
            return Response::json(array(
                'code' => 500,
                'message' => 'Invalid data: '. $ex->Message
            ), 500);
        }
	}
                
    public function createUser()
    {
        try
        {
            $request = new UserRequest();
            $request->username = Request::input('username');
            $request->password = Request::input('password');
            $request->displayName = Request::input('displayName');
            $request->sn = Request::input('sn');
            $request->mail = Request::input('mail');

            return $this->adLdap->createUser($request);
        }
        catch (Exception $ex)
        {
            return Response::json(array(
                'code' => 500,
                'message' => 'Invalid data: '. $ex->Message
            ), 500);
        }
    }
        
    public function deleteUser()
    {
        try
        {
            $request = new UserRequest();
            $request->username = Request::input('username');

            return $this->adLdap->deleteUser($request);
        }
        catch (Exception $ex)
        {
            return Response::json(array(
                'code' => 500,
                'message' => 'Invalid data: '. $ex->Message
            ), 500);
        }
    }


    public function updateUser()
    {
        try
        {
            $request = new UserRequest();
            $request->username = Request::input('username');
            $request->password = Request::input('password');
            $request->displayName = Request::input('displayName');
            $request->sn = Request::input('sn');
            $request->mail = Request::input('mail');

            return $this->adLdap->updateUser($request);
        }
        catch (Exception $ex)
        {
            return Response::json(array(
            'code' => 500,
            'message' => 'Invalid data: '. $ex->Message
            ), 500);
        }
    }

    public function authorize()
    {
        try
        {
            $request = new AuthorizeRequest();
            $request->token = Request::input('token');
            $request->username = Request::input('username');
            $request->applicationId = Request::input('applicationId');

            return $this->adLdap->authorize($request);
        }
        catch (Exception $ex)
        {
            return Response::json(array(
                'code' => 500,
                'message' => 'Invalid data: '. $ex->Message
            ), 500);
        }
    }

    public function authenticate()
    {
        try
        {
            $data = Input::all();
            $request = new AuthenticateRequest();
            $request->username = $data['username'];
            $request->pasword = $data['password'];

            return $this->adLdap->authenticate(array());
        }
        catch (Exception $ex)
        {
            return Response::json(array(
                'code' => 500,
                'message' => 'Invalid data: '. $ex->Message
            ), 500);
        }
    }
}