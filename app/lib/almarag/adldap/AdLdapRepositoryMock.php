<?php
namespace almarag\adldap;
use Config;
use Response;
use App;

class AdLdapRepositoryMock implements IAdLdapRepository {
    
    public function changePassword($username=null, $password=null) {
        try
        {
            if ($username == "testuser" && $password != "")
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

    public function info($username = null) {
        try
        {
            if ($username == "testuser")
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
    
    public function createUser($userInfo = null)
    {
        return Response::json(array(
                    'code' => 200,
                    'message' => 'User successfully created'
               ), 200);        
    }
    
    public function deleteUser($username = null)
    {
        return Response::json(array(
                    'code' => 200,
                    'message' => 'User successfully deleted'
               ), 200);   
    }
}