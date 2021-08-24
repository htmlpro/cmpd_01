<?php return array (
  'New folder' => 
  array (
    'app' => 
    array (
      'name' => 'ThousandOaks',
      'env' => 'production',
      'debug' => false,
      'url' => 'https://cmpd.riteawayportal.com',
      'timezone' => 'UTC',
      'locale' => 'en',
      'fallback_locale' => 'en',
      'key' => 'base64:DXE3dksEZJSLypQPdpDCe3UXGXb7cAguY5hWR3GPjbU=',
      'cipher' => 'AES-256-CBC',
      'providers' => 
      array (
        0 => 'Illuminate\\Auth\\AuthServiceProvider',
        1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
        2 => 'Illuminate\\Bus\\BusServiceProvider',
        3 => 'Illuminate\\Cache\\CacheServiceProvider',
        4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
        5 => 'Illuminate\\Cookie\\CookieServiceProvider',
        6 => 'Illuminate\\Database\\DatabaseServiceProvider',
        7 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
        8 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
        9 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
        10 => 'Illuminate\\Hashing\\HashServiceProvider',
        11 => 'Illuminate\\Mail\\MailServiceProvider',
        12 => 'Illuminate\\Notifications\\NotificationServiceProvider',
        13 => 'Illuminate\\Pagination\\PaginationServiceProvider',
        14 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
        15 => 'Illuminate\\Queue\\QueueServiceProvider',
        16 => 'Illuminate\\Redis\\RedisServiceProvider',
        17 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
        18 => 'Illuminate\\Session\\SessionServiceProvider',
        19 => 'Illuminate\\Translation\\TranslationServiceProvider',
        20 => 'Illuminate\\Validation\\ValidationServiceProvider',
        21 => 'Illuminate\\View\\ViewServiceProvider',
        22 => 'Yajra\\Datatables\\DatatablesServiceProvider',
        23 => 'App\\Providers\\AppServiceProvider',
        24 => 'App\\Providers\\AuthServiceProvider',
        25 => 'App\\Providers\\EventServiceProvider',
        26 => 'App\\Providers\\RouteServiceProvider',
        27 => 'Anouar\\Fpdf\\FpdfServiceProvider',
      ),
      'aliases' => 
      array (
        'App' => 'Illuminate\\Support\\Facades\\App',
        'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
        'Auth' => 'Illuminate\\Support\\Facades\\Auth',
        'Blade' => 'Illuminate\\Support\\Facades\\Blade',
        'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
        'Bus' => 'Illuminate\\Support\\Facades\\Bus',
        'Cache' => 'Illuminate\\Support\\Facades\\Cache',
        'Config' => 'Illuminate\\Support\\Facades\\Config',
        'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
        'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
        'DB' => 'Illuminate\\Support\\Facades\\DB',
        'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
        'Event' => 'Illuminate\\Support\\Facades\\Event',
        'File' => 'Illuminate\\Support\\Facades\\File',
        'Gate' => 'Illuminate\\Support\\Facades\\Gate',
        'Hash' => 'Illuminate\\Support\\Facades\\Hash',
        'Lang' => 'Illuminate\\Support\\Facades\\Lang',
        'Log' => 'Illuminate\\Support\\Facades\\Log',
        'Mail' => 'Illuminate\\Support\\Facades\\Mail',
        'Notification' => 'Illuminate\\Support\\Facades\\Notification',
        'Password' => 'Illuminate\\Support\\Facades\\Password',
        'Queue' => 'Illuminate\\Support\\Facades\\Queue',
        'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
        'Redis' => 'Illuminate\\Support\\Facades\\Redis',
        'Request' => 'Illuminate\\Support\\Facades\\Request',
        'Response' => 'Illuminate\\Support\\Facades\\Response',
        'Route' => 'Illuminate\\Support\\Facades\\Route',
        'Schema' => 'Illuminate\\Support\\Facades\\Schema',
        'Session' => 'Illuminate\\Support\\Facades\\Session',
        'Storage' => 'Illuminate\\Support\\Facades\\Storage',
        'URL' => 'Illuminate\\Support\\Facades\\URL',
        'Validator' => 'Illuminate\\Support\\Facades\\Validator',
        'View' => 'Illuminate\\Support\\Facades\\View',
        'Helpers' => 'App\\Helpers\\Helpers',
        'Imap' => 'App\\Helpers\\Imap',
        'Datatables' => 'Yajra\\Datatables\\Facades\\Datatables',
        'Fpdf' => 'Anouar\\Fpdf\\Facades\\Fpdf',
      ),
    ),
    'database' => 
    array (
      'default' => 'mysql',
      'connections' => 
      array (
        'sqlite' => 
        array (
          'driver' => 'sqlite',
          'database' => 'cmpd_prod',
          'prefix' => '',
        ),
        'mysql' => 
        array (
          'driver' => 'mysql',
          'host' => 'prod-compound-portal.caxkgqnjbthp.us-east-2.rds.amazonaws.com',
          'port' => '3306',
          'database' => 'cmpd_prod',
          'username' => 'admin',
          'password' => 'Compounding_prod',
          'unix_socket' => '',
          'charset' => 'utf8mb4',
          'collation' => 'utf8mb4_unicode_ci',
          'prefix' => '',
          'strict' => false,
          'engine' => 'InnoDB ROW_FORMAT=DYNAMIC',
        ),
        'myFirebird' => 
        array (
          'driver' => 'firebird',
          'host' => 'localhost',
          'port' => '3050',
          'database' => '67.48.54.35:C:\\PKS4\\DATA\\CMPDWIN.pkf',
          'username' => 'READONLYUSER',
          'password' => 'ReadOnly1234$',
          'unix_socket' => '',
          'charset' => 'UTF-8',
          'collation' => 'utf8_nicode_ci',
          'prefix' => '',
          'prefix_indexes' => true,
          'strict' => true,
          'engine' => NULL,
        ),
        'pgsql' => 
        array (
          'driver' => 'pgsql',
          'host' => 'prod-compound-portal.caxkgqnjbthp.us-east-2.rds.amazonaws.com',
          'port' => '3306',
          'database' => 'cmpd_prod',
          'username' => 'admin',
          'password' => 'Compounding_prod',
          'charset' => 'utf8',
          'prefix' => '',
          'schema' => 'public',
          'sslmode' => 'prefer',
        ),
        'sqlsrv' => 
        array (
          'driver' => 'sqlsrv',
          'host' => 'prod-compound-portal.caxkgqnjbthp.us-east-2.rds.amazonaws.com',
          'port' => '3306',
          'database' => 'cmpd_prod',
          'username' => 'admin',
          'password' => 'Compounding_prod',
          'charset' => 'utf8',
          'prefix' => '',
        ),
      ),
      'migrations' => 'migrations',
      'redis' => 
      array (
        'client' => 'predis',
        'default' => 
        array (
          'host' => '127.0.0.1:8012',
          'password' => NULL,
          'port' => '6379',
          'database' => 0,
        ),
      ),
    ),
  ),
  'app' => 
  array (
    'name' => 'ThousandOaks',
    'env' => 'production',
    'debug' => false,
    'url' => 'https://cmpd.riteawayportal.com',
    'timezone' => 'UTC',
    'locale' => 'en',
    'fallback_locale' => 'en',
    'key' => 'base64:DXE3dksEZJSLypQPdpDCe3UXGXb7cAguY5hWR3GPjbU=',
    'cipher' => 'AES-256-CBC',
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Cookie\\CookieServiceProvider',
      6 => 'Illuminate\\Database\\DatabaseServiceProvider',
      7 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      8 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      9 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      10 => 'Illuminate\\Hashing\\HashServiceProvider',
      11 => 'Illuminate\\Mail\\MailServiceProvider',
      12 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      13 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      14 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      15 => 'Illuminate\\Queue\\QueueServiceProvider',
      16 => 'Illuminate\\Redis\\RedisServiceProvider',
      17 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      18 => 'Illuminate\\Session\\SessionServiceProvider',
      19 => 'Illuminate\\Translation\\TranslationServiceProvider',
      20 => 'Illuminate\\Validation\\ValidationServiceProvider',
      21 => 'Illuminate\\View\\ViewServiceProvider',
      22 => 'Yajra\\Datatables\\DatatablesServiceProvider',
      23 => 'App\\Providers\\AppServiceProvider',
      24 => 'App\\Providers\\AuthServiceProvider',
      25 => 'App\\Providers\\EventServiceProvider',
      26 => 'App\\Providers\\RouteServiceProvider',
      27 => 'Anouar\\Fpdf\\FpdfServiceProvider',
      28 => 'App\\Providers\\QueueCountServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Redis' => 'Illuminate\\Support\\Facades\\Redis',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
      'Helpers' => 'App\\Helpers\\Helpers',
      'Imap' => 'App\\Helpers\\Imap',
      'Datatables' => 'Yajra\\Datatables\\Facades\\Datatables',
      'Fpdf' => 'Anouar\\Fpdf\\Facades\\Fpdf',
    ),
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'web',
      'passwords' => 'users',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
      'api' => 
      array (
        'driver' => 'token',
        'provider' => 'users',
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\User',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'users',
        'table' => 'password_resets',
        'expire' => 60,
      ),
    ),
  ),
  'barcode' => 
  array (
    'store_path' => 'C:\\xampp\\htdocs\\cmpd_prod\\public\\/',
  ),
  'broadcasting' => 
  array (
    'default' => 'log',
    'connections' => 
    array (
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => '',
        'secret' => '',
        'app_id' => '',
        'options' => 
        array (
          'cluster' => 'mt1',
          'encrypted' => true,
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
    ),
  ),
  'cache' => 
  array (
    'default' => 'file',
    'stores' => 
    array (
      'apc' => 
      array (
        'driver' => 'apc',
      ),
      'array' => 
      array (
        'driver' => 'array',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'cache',
        'connection' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => 'C:\\xampp\\htdocs\\cmpd_prod\\storage\\framework/cache/data',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
    ),
    'prefix' => 'thousandoaks_cache',
  ),
  'constant' => 
  array (
    'PMP_SFTP_URL' => 'sftp.pmpclearinghouse.net',
    'PMP_SFTP_USER' => 'ritea2104902733@prodpmpsftp',
    'PMP_SFTP_PASSWORD' => 'Pharmacy123@',
    'ZERO_REPORT_SITE_NAME' => 'cmpd',
    'PMP_ENV' => 'P',
    'FAX_URL' => 'http://api.faxage.com/httpsfax.php',
    'FAX_USERNAME' => 'riteaway',
    'FAX_COMPANY' => '75112',
    'FAX_PASSWORD' => 'Thousand1@',
    'FAX_NUMBER' => '8773232737',
    'IMAP_HOST' => '{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX',
    'IMAP_USERNAME' => 'thousandoakspharma@gmail.com',
    'DB_CONNECTION_F' => 'myFirebird',
    'DB_HOST_F' => 'localhost',
    'DB_DATABASE_F' => '67.48.54.35:C:\\PKS4\\DATA\\CMPDWIN.pkf',
    'DB_USERNAME_F' => 'READONLYUSER',
    'DB_PASSWORD_F' => 'ReadOnly1234$',
    'DB_PORT_F' => '3050',
    'DB_CHARSET_F' => 'UTF-8',
  ),
  'database' => 
  array (
    'default' => 'mysql',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'database' => 'cmpd_prod',
        'prefix' => '',
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'host' => 'prod-compound-portal.caxkgqnjbthp.us-east-2.rds.amazonaws.com',
        'port' => '3306',
        'database' => 'cmpd_prod',
        'username' => 'admin',
        'password' => 'Compounding_prod',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'strict' => false,
        'engine' => 'InnoDB ROW_FORMAT=DYNAMIC',
      ),
      'myFirebird' => 
      array (
        'driver' => 'firebird',
        'host' => 'localhost',
        'port' => '3050',
        'database' => '67.48.54.35:C:\\PKS4\\DATA\\CMPDWIN.pkf',
        'username' => 'READONLYUSER',
        'password' => 'ReadOnly1234$',
        'unix_socket' => '',
        'charset' => 'UTF-8',
        'collation' => 'utf8_nicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => true,
        'engine' => NULL,
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'host' => 'prod-compound-portal.caxkgqnjbthp.us-east-2.rds.amazonaws.com',
        'port' => '3306',
        'database' => 'cmpd_prod',
        'username' => 'admin',
        'password' => 'Compounding_prod',
        'charset' => 'utf8',
        'prefix' => '',
        'schema' => 'public',
        'sslmode' => 'prefer',
      ),
      'sqlsrv' => 
      array (
        'driver' => 'sqlsrv',
        'host' => 'prod-compound-portal.caxkgqnjbthp.us-east-2.rds.amazonaws.com',
        'port' => '3306',
        'database' => 'cmpd_prod',
        'username' => 'admin',
        'password' => 'Compounding_prod',
        'charset' => 'utf8',
        'prefix' => '',
      ),
    ),
    'migrations' => 'migrations',
    'redis' => 
    array (
      'client' => 'predis',
      'default' => 
      array (
        'host' => '127.0.0.1:8012',
        'password' => NULL,
        'port' => '6379',
        'database' => 0,
      ),
    ),
  ),
  'datatables' => 
  array (
    'search' => 
    array (
      'smart' => true,
      'multi_term' => true,
      'case_insensitive' => true,
      'use_wildcards' => false,
    ),
    'index_column' => 'DT_RowIndex',
    'engines' => 
    array (
      'eloquent' => 'Yajra\\DataTables\\EloquentDataTable',
      'query' => 'Yajra\\DataTables\\QueryDataTable',
      'collection' => 'Yajra\\DataTables\\CollectionDataTable',
      'resource' => 'Yajra\\DataTables\\ApiResourceDataTable',
    ),
    'builders' => 
    array (
    ),
    'nulls_last_sql' => '%s %s NULLS LAST',
    'error' => NULL,
    'columns' => 
    array (
      'excess' => 
      array (
        0 => 'rn',
        1 => 'row_num',
      ),
      'escape' => '*',
      'raw' => 
      array (
        0 => 'action',
      ),
      'blacklist' => 
      array (
        0 => 'password',
        1 => 'remember_token',
      ),
      'whitelist' => '*',
    ),
    'json' => 
    array (
      'header' => 
      array (
      ),
      'options' => 0,
    ),
  ),
  'filesystems' => 
  array (
    'default' => 'local',
    'cloud' => 's3',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => 'C:\\xampp\\htdocs\\cmpd_prod\\storage\\app',
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => 'C:\\xampp\\htdocs\\cmpd_prod\\storage\\app/public',
        'url' => 'https://cmpd.riteawayportal.com/storage',
        'visibility' => 'public',
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => NULL,
        'secret' => NULL,
        'region' => NULL,
        'bucket' => NULL,
        'url' => NULL,
      ),
    ),
  ),
  'gmail' => 
  array (
    'project_id' => '',
    'client_id' => '',
    'client_secret' => '',
    'redirect_url' => '',
    'state' => NULL,
    'scopes' => 
    array (
      0 => 'readonly',
      1 => 'modify',
    ),
    'additional_scopes' => 
    array (
    ),
    'access_type' => 'offline',
    'approval_prompt' => 'force',
    'credentials_file_name' => 'gmail-json',
    'allow_multiple_credentials' => '',
    'allow_json_encrypt' => '',
  ),
  'hashing' => 
  array (
    'driver' => 'bcrypt',
    'bcrypt' => 
    array (
      'rounds' => 10,
    ),
    'argon' => 
    array (
      'memory' => 1024,
      'threads' => 2,
      'time' => 2,
    ),
  ),
  'logging' => 
  array (
    'default' => 'stack',
    'channels' => 
    array (
      'stack' => 
      array (
        'driver' => 'stack',
        'channels' => 
        array (
          0 => 'single',
        ),
      ),
      'single' => 
      array (
        'driver' => 'single',
        'path' => 'C:\\xampp\\htdocs\\cmpd_prod\\storage\\logs/laravel.log',
        'level' => 'debug',
      ),
      'daily' => 
      array (
        'driver' => 'daily',
        'path' => 'C:\\xampp\\htdocs\\cmpd_prod\\storage\\logs/laravel.log',
        'level' => 'debug',
        'days' => 7,
      ),
      'slack' => 
      array (
        'driver' => 'slack',
        'url' => NULL,
        'username' => 'Laravel Log',
        'emoji' => ':boom:',
        'level' => 'critical',
      ),
      'stderr' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\StreamHandler',
        'with' => 
        array (
          'stream' => 'php://stderr',
        ),
      ),
      'syslog' => 
      array (
        'driver' => 'syslog',
        'level' => 'debug',
      ),
      'errorlog' => 
      array (
        'driver' => 'errorlog',
        'level' => 'debug',
      ),
    ),
  ),
  'mail' => 
  array (
    'driver' => 'smtp',
    'host' => 'smtp.gmail.com',
    'port' => '587',
    'from' => 
    array (
      'address' => 'thousandoakspharma@gmail.com',
      'name' => 'thousandoakspharma',
    ),
    'encryption' => 'tls',
    'username' => 'thousandoakspharma@gmail.com',
    'password' => 'Chetu@123',
    'sendmail' => '/usr/sbin/sendmail -bs',
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => 'C:\\xampp\\htdocs\\cmpd_prod\\resources\\views/vendor/mail',
      ),
    ),
  ),
  'mail-edit' => 
  array (
    'driver' => 'smtp',
    'host' => 'smtp.gmail.com',
    'port' => '587',
    'from' => 
    array (
      'address' => 'hello@example.com',
      'name' => 'Example',
    ),
    'encryption' => 'tls',
    'username' => 'thousandoakspharma@gmail.com',
    'password' => 'Chetu@123',
    'sendmail' => '/usr/sbin/sendmail -bs',
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => 'C:\\xampp\\htdocs\\cmpd_prod\\resources\\views/vendor/mail',
      ),
    ),
  ),
  'mailbox' => 
  array (
    'driver' => 'log',
    'model' => 'BeyondCode\\Mailbox\\InboundEmail',
    'path' => 'laravel-mailbox',
    'store_incoming_emails_for_days' => 7,
    'only_store_matching_emails' => true,
    'basic_auth' => 
    array (
      'username' => 'thousandoakspharma@gmail.com',
      'password' => 'Chetu@123',
    ),
    'services' => 
    array (
      'mailgun' => 
      array (
        'key' => NULL,
      ),
    ),
  ),
  'queue' => 
  array (
    'default' => 'sync',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 90,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => 'your-public-key',
        'secret' => 'your-secret-key',
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'your-queue-name',
        'region' => 'us-east-1',
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => NULL,
      ),
    ),
    'failed' => 
    array (
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'services' => 
  array (
    'mailgun' => 
    array (
      'domain' => NULL,
      'secret' => NULL,
    ),
    'ses' => 
    array (
      'key' => NULL,
      'secret' => NULL,
      'region' => 'us-east-1',
    ),
    'sparkpost' => 
    array (
      'secret' => NULL,
    ),
    'stripe' => 
    array (
      'model' => 'App\\User',
      'key' => NULL,
      'secret' => NULL,
    ),
  ),
  'session' => 
  array (
    'driver' => 'file',
    'lifetime' => '120',
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => 'C:\\xampp\\htdocs\\cmpd_prod\\storage\\framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'thousandoaks_session',
    'path' => '/',
    'domain' => NULL,
    'secure' => false,
    'http_only' => true,
    'same_site' => NULL,
  ),
  'view' => 
  array (
    'paths' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cmpd_prod\\resources\\views',
    ),
    'compiled' => 'C:\\xampp\\htdocs\\cmpd_prod\\storage\\framework\\views',
  ),
  'trustedproxy' => 
  array (
    'proxies' => NULL,
    'headers' => 30,
  ),
  'tinker' => 
  array (
    'commands' => 
    array (
    ),
    'dont_alias' => 
    array (
      0 => 'App\\Nova',
    ),
  ),
);
