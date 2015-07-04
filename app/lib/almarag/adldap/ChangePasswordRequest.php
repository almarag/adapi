<?php
namespace almarag\adldap;

class ChangePasswordRequest extends RepositoryRequest {
    public $username;
    public $password;
}