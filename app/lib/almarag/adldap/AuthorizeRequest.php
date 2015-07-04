<?php

namespace almarag\adldap;

class AuthorizeRequest extends RepositoryRequest {
    public $token;
    public $applicationId;
    public $username;
}