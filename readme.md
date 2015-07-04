# Active Directory web API 

This projects aims to create a generic LDAP/Active Directory webAPI for the following activities:

- Create accounts
- Modify accounts
- Change password
- Delete accounts

API uses Laravel and ADLDAP php projects for it's foundations. you can learn more about Laravel and ADLDAP on the following links:

[http://laravel.com/docs](http://laravel.com/docs)

[http://adldap.sourceforge.net/](http://adldap.sourceforge.net/)

## Installation and Setup

1. Copy all the content into your web server site folder
2. Modify apache/IIS to make app/public folder the root folder for site
3. If you are using apache, the .htaccess file should be enough for get it working. If you are using IIS, you'll need to generate a web.config based on the .htaccess file. a web.config sample will be included on next releases.
4. Fire up your browser and navigate to site. If you get the Laravel logo on home page you are on the road and can continue with the rest of setup.
5. Go to app/config/ad.php and modify the AD connection parameters according to your server configuration. (IMPORTANT: in order to use change password functionality you MUST require SSL configuration. Change password is not allowed to work on non-SSL connections)

## Usage 

### Get user Information:

```javascript
http://your.tld/api/v1/info/:id
```

Parameters:

```javascript
:id - The username that you want to retrieve information
```

### Change Password
```javascript
http://your.tld/api/v1/changePassword
```

Parameters (uses POST)
```javascript
:username - Username to change the password
:password - New password for the user
```


This project is licensed under the [MIT license](http://opensource.org/licenses/MIT)

Project maintained by Alejandro Martinez (almarag at gmail dot com)