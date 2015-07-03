<?php
namespace almarag;
use Illuminate\Support\ServiceProvider;

class AdServiceProvider extends ServiceProvider {
    
    public function register() {
        $this->app->bind(
            'almarag\adldap\IAdLdapRepository',
            'almarag\adldap\AdLdapRepositoryMock'
        );       
    }    
}