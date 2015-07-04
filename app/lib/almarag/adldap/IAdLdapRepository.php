<?php
namespace almarag\adldap;

interface IAdLdapRepository {
    function changePassword($username = null, $password = null);
    function info($username = null);
    function createUser($userInfo = array());
    function deleteUser($username = null);
    function updateUser($userInfo = array());
    function authenticate($username = null, $password = null);
    function authorize($applicationId = null, $token = null);
}