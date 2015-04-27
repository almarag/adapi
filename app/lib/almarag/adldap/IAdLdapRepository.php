<?php
namespace almarag\adldap;

interface IAdLdapRepository {
    function changePassword($username, $password);
    function info();
}
