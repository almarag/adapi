<?php
namespace almarag\adldap;
use Config;
use Response;
use App;

class AdLdapRepositoryMock implements IAdLdapRepository {
    
    public function changePassword(ChangePasswordRequest $request) {
        try
        {
            if ($request->username == "testuser" && $request->password != "")
            {
                return Response::json(array(
                   'code' => 200,
                   'message' => 'Password updated'
                ),200);                                
            }
            else
            {
                return Response::json(array(
                    'code' => 500,
                    'message' => 'Invalid username or password' 
                ),500);
            }
        }
        catch (Exception $ex)
        {
            return Response::json(array(
               'code' => 500,
               'exception' => $ex->getMessage()
            ),500);
        }	

    }

    public function info(UserRequest $request) {
        try
        {
            if ($request->username == "testuser")
            {
                return Response::json(array(
                            'code' => 200,
                            'result' => array(
                                        'username' => "Test User",
                                        'samaccountname' => "testuser",
                                        'mail' => "test@testdomain.com"
                            )
                       ), 200);
            }   
            else
            {
                return Response::json(array(
                           'code' => 404,
                           'message' => 'Username not found'
                       ), 404);                
            }
        }
        catch(Exception $ex)
        {
            return Response::json(array(
                        'code' => 500,
                        'exception' => $ex->getMessage()
                   ), 500);
        }        
    }
    
    public function createUser(UserRequest $request)
    {
        return Response::json(array(
                    'code' => 200,
                    'message' => 'User successfully created'
               ), 200);        
    }
    
    public function deleteUser(UserRequest $request)
    {
        return Response::json(array(
                    'code' => 200,
                    'message' => 'User successfully deleted'
               ), 200);   
    }

    public function updateUser(UserRequest $request)
    {
        App::abort(500,"Not Implemented");
    }

    public function authenticate(AuthenticateRequest $request)
    {
        App::abort(500,"Not Implemented");
    }

    public function authorize(AuthorizeRequest $request)
    {
        App::abort(500,"Not Implemented");
    }
}
