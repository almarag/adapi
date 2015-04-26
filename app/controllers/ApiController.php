<?php

class ApiController extends \BaseController {

        protected $adLdap;
    
        public function __construct() {
            $this->adLdap = new \adLDAP\adLDAP(Config::get('ad'));        
        }
        
	/**
	 * Get a JSON array with the basic info about a user
	 *
	 * @return Response
	 */
	public function info($id = null)
	{
            try {
                $result = $this->adLdap->user()->info($id);
                
                if (!$result)
                {
                    return Response::json(array(
                        'code' => 404,
                        'message' => 'Username not found'
                    ),404);                    
                }
                else
                {
                    return Response::json(array(
                        'code' => 200,
                        'result' => array(
                            'username' => chop($result[0]['displayname'][0]),
                            'samaccountname' => chop($result[0]['samaccountname'][0]),
                            'mail' => chop($result[0]['mail'][0])
                        )
                    ),200);
                }
            } catch (Exception $ex) {
                return Response::json(array(
                  'code' => 500,
                  'exception' => $ex->getMessage()
                ),500);
            }
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


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Response::json(array(
                    'code' => 200,
                    'message' => 'destroy'
                ),200);//
	}
}
