<?php
/**
 * Created by IntelliJ IDEA.
 * User: Alex
 * Date: 04/07/2015
 * Time: 03:30 PM
 */

namespace almarag\adldap;

class UserRequest extends RepositoryRequest {
    private $username;
    private $password;
    private $displayName;
    private $sn;
    private $mail;
}