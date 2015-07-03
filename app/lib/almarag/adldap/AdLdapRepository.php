<?php
namespace almarag\adldap;
use Config;
use Response;
use App;

class AdLdapRepository implements IAdLdapRepository {
    
    public $adLdap;
    
    public function __construct() {
        $this->adLdap = new \adLDAP\adLDAP(Config::get('ad'));
    }
    
    public function changePassword($username = null,$password = null) {
        try
        {
            $this->adLdap->user()->password($username, $password);
            return Response::json(array(
               'code' => 200,
               'message' => 'Password updated'
            ),200);                
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
        try {
            $result = $this->adLdap->user()->info($username);
            
            if (!$result) {
                return Response::json(array(
                           'code' => 404,
                           'message' => 'Username not found'
                       ), 404);
            } else {
                return Response::json(array(
                           'code' => 200,
                           'result' => array(
                               'username' => chop($result[0]['displayname'][0]),
                               'samaccountname' => chop($result[0]['samaccountname'][0]),
                               'mail' => chop($result[0]['mail'][0])
                       )), 200);
            }
        } catch (Exception $ex) {
            return Response::json(array(
                        'code' => 500,
                        'exception' => $ex->getMessage()
                   ), 500);
        }
    }    
        
    public function createUser($userInfo = array())
    {
        App::abort(500,"Not Implemented");
    }
    
    public function deleteUser($userName = null)
    {
        App::abort(500,"Not Implemented");
    }
}