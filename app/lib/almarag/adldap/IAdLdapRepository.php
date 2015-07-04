<?php
namespace almarag\adldap;

interface IAdLdapRepository {
    function changePassword(ChangePasswordRequest $request);
    function info(UserRequest $request);
    function createUser(UserRequest $request);
    function deleteUser(UserRequest $request);
    function updateUser(UserRequest $request);
    function authenticate(AuthenticateRequest $request);
    function authorize(AuthorizeRequest $request);
}