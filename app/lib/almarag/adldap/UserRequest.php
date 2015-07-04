<?php
/**
 * Created by IntelliJ IDEA.
 * User: Alex
 * Date: 04/07/2015
 * Time: 03:30 PM
 */

namespace almarag\adldap;

class UserRequest extends RepositoryRequest {
    public $username;
    public $password;
    public $displayName;
    public $sn;
    public $mail;
}