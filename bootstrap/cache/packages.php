<?php return array (
  'beyondcode/laravel-mailbox' => 
  array (
    'providers' => 
    array (
      0 => 'BeyondCode\\Mailbox\\MailboxServiceProvider',
    ),
    'aliases' => 
    array (
      'Mailbox' => 'BeyondCode\\Mailbox\\Facades\\Mailbox',
    ),
  ),
  'dacastro4/laravel-gmail' => 
  array (
    'providers' => 
    array (
      0 => 'Dacastro4\\LaravelGmail\\LaravelGmailServiceProvider',
    ),
    'aliases' => 
    array (
      'LaravelGmail' => 'Dacastro4\\LaravelGmail\\Facade\\LaravelGmail',
    ),
  ),
  'fideloper/proxy' => 
  array (
    'providers' => 
    array (
      0 => 'Fideloper\\Proxy\\TrustedProxyServiceProvider',
    ),
  ),
  'laravel/nexmo-notification-channel' => 
  array (
    'providers' => 
    array (
      0 => 'Illuminate\\Notifications\\NexmoChannelServiceProvider',
    ),
  ),
  'laravel/slack-notification-channel' => 
  array (
    'providers' => 
    array (
      0 => 'Illuminate\\Notifications\\SlackChannelServiceProvider',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'nesbot/carbon' => 
  array (
    'providers' => 
    array (
      0 => 'Carbon\\Laravel\\ServiceProvider',
    ),
  ),
  'nunomaduro/collision' => 
  array (
    'providers' => 
    array (
      0 => 'NunoMaduro\\Collision\\Adapters\\Laravel\\CollisionServiceProvider',
    ),
  ),
  'yajra/laravel-datatables-oracle' => 
  array (
    'providers' => 
    array (
      0 => 'Yajra\\DataTables\\DataTablesServiceProvider',
    ),
    'aliases' => 
    array (
      'DataTables' => 'Yajra\\DataTables\\Facades\\DataTables',
    ),
  ),
);