<?php

return [
    /*
     | --------------------------------------------
     | Route prefix url for admin panel
     | --------------------------------------------
     */
    'admin_path' => 'management',

    /*
     | --------------------------------------------
     | Your application icon
     | --------------------------------------------
     */
    'app_icon' => 'admin/img/logo-white.png',

    /*
     | --------------------------------------------
     | Your application favicon
     | --------------------------------------------
     */
    'app_favicon' => 'adminportal/img/favicon.svg',

    /*
     | --------------------------------------------
     | Your application default avatar image
     | --------------------------------------------
     */
    'default_avatar' => 'adminportal/img/avatar.jpg',

    /*
     | --------------------------------------------
     | Configuration for login view
     | --------------------------------------------
     | view_path => the base resource path of login view
     | banner => image banner for login if you use default view
     | banner_title => banner title for login if you use default view
     | banner_description => banner description for login if you use default view
     */
    'login' => [
        'view_path' => 'admin.auth.login',
        'banner' => 'adminportal/img/login-banner.svg',
        'banner_title' => 'Welcome Back !',
        'banner_description' => "Use your access in the ".config('app.name')." application and login to your dashboard account.",
        
        'limiter' => ['throttle:60perMinute'],
        'url' => 'management/auth/login',
        'forgot_password_url' => 'management/auth/forgot-password',
        'register_url' => 'management/auth/register',
    ],

    /*
     | --------------------------------------------
     | For the sidebar admin color
     | --------------------------------------------
     */
    'theme_color' => '#0D5CAB',

    /*
     | --------------------------------------------
     | For auth session management
     | --------------------------------------------
     */
    'auth' => [
        'session_name_prefix' => 'admin.auth',
        'logout_url' => 'management/logout'
    ],

    /*
     | --------------------------------------------
     | For profile url location
     | --------------------------------------------
     */
    'profile_url' => 'management/profile',


    /*
     | --------------------------------------------
     | For display dropdown notification on header
     | --------------------------------------------
     */
    'notification' => [
        'display' => true,
        'interval' => null,
        'path' => 'admin.notification.index',
        'ajax_path' => 'notification-admin/list'
    ],

    /*
     | --------------------------------------------
     | For display alert after action
     | popup | alert
     | --------------------------------------------
     */
    'alert_message_type' => 'popup',
    


    /*
     | --------------------------------------------
     | For API Configuration
     | --------------------------------------------
     */

    'api' => [
        'secret_key' => env('API_SECRET_KEY'),
        'jwt_secret_key' => env('JWT_SECRET_KEY'),
        'expired_duration_get_token' => "+1 hours",
        'validate_blacklist' => false
    ]
    
];