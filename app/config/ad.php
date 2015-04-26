<?php

// adLdap specific configuration

return array(
    'base_dn' => 'DC=domain,DC=tld',
    'account_suffix' => '@domain.tld',
    'domain_controllers' => array('server.domain.tld'),
    'use_ssl' => true,
    'admin_username' => 'username',
    'admin_password' => 'password'
);
