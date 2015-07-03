<?php
namespace almarag\adldap;

interface IAdLdapRepository {
    function changePassword($username = null, $password = null);
    function info($username = null);
    function createUser($userInfo = array());
    function deleteUser($username = null);
}