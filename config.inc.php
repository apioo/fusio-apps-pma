<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * phpMyAdmin sample configuration, you can use it as base for
 * manual configuration. For easier setup you can use setup/
 *
 * All directives are explained in documentation in the doc/ folder
 * or at <https://docs.phpmyadmin.net/>.
 *
 * @package PhpMyAdmin
 */

if (!isset($_ENV['FUSIO_ENV'])) {
    $dotenv = new \Symfony\Component\Dotenv\Dotenv();
    $dotenv->load(__DIR__ . '/../../.env');
}

/**
 * This is needed for cookie based authentication to encrypt password in
 * cookie. Needs to be 32 chars long.
 */
$cfg['blowfish_secret'] = $_ENV['FUSIO_PROJECT_KEY']; /* YOU MUST FILL IN THIS FOR COOKIE AUTH! */

$cfg['PmaAbsoluteUri'] = $_ENV['FUSIO_APPS_URL'] . '/pma/';

/**
 * Servers configuration
 */
$i = 0;

// dynamically load all connections from Fusio
$mysqli = new \mysqli($_ENV['FUSIO_DB_HOST'], $_ENV['FUSIO_DB_USER'], $_ENV['FUSIO_DB_PW'], $_ENV['FUSIO_DB_NAME']);
$stmt = $mysqli->prepare('SELECT id, class, config FROM fusio_connection ORDER BY name ASC');
$stmt->execute();
$stmt->bind_result($id, $class, $config);

while ($stmt->fetch()) {
    if ($class === 'Fusio\Impl\Connection\System') {
        $host = $_ENV['FUSIO_DB_HOST'];
        $db = $_ENV['FUSIO_DB_NAME'];
    } elseif ($class === 'Fusio\Adapter\Sql\Connection\Sql' && !empty($config)) {
        $parts = explode('.', $config, 2);
        list($iv, $data) = $parts;

        $config = openssl_decrypt(base64_decode($data), 'AES-128-CBC', $_ENV['FUSIO_PROJECT_KEY'], OPENSSL_RAW_DATA, base64_decode($iv));
        $config = json_decode($config, true);

        $host = $config['host'];
        $db = $config['database'];
    }

    $i++;
    /* Authentication type */
    $cfg['Servers'][$i]['auth_type'] = 'cookie';
    /* Server parameters */
    $cfg['Servers'][$i]['host'] = $host;
    $cfg['Servers'][$i]['only_db'] = [$db];
    $cfg['Servers'][$i]['compress'] = false;
    $cfg['Servers'][$i]['AllowNoPassword'] = true;
}

$stmt->close();

/**
 * End of servers configuration
 */

/**
 * Directories for saving/loading files from server
 */
$cfg['UploadDir'] = __DIR__ . '/tmp';
$cfg['SaveDir'] = '';

/**
 * Whether to display icons or text or both icons and text in table row
 * action segment. Value can be either of 'icons', 'text' or 'both'.
 * default = 'both'
 */
//$cfg['RowActionType'] = 'icons';

/**
 * Defines whether a user should be displayed a "show all (records)"
 * button in browse mode or not.
 * default = false
 */
//$cfg['ShowAll'] = true;

/**
 * Number of rows displayed when browsing a result set. If the result
 * set contains more rows, "Previous" and "Next".
 * Possible values: 25, 50, 100, 250, 500
 * default = 25
 */
//$cfg['MaxRows'] = 50;

/**
 * Disallow editing of binary fields
 * valid values are:
 *   false    allow editing
 *   'blob'   allow editing except for BLOB fields
 *   'noblob' disallow editing except for BLOB fields
 *   'all'    disallow editing
 * default = 'blob'
 */
//$cfg['ProtectBinary'] = false;

/**
 * Default language to use, if not browser-defined or user-defined
 * (you find all languages in the locale folder)
 * uncomment the desired line:
 * default = 'en'
 */
//$cfg['DefaultLang'] = 'en';
//$cfg['DefaultLang'] = 'de';

/**
 * How many columns should be used for table display of a database?
 * (a value larger than 1 results in some information being hidden)
 * default = 1
 */
//$cfg['PropertiesNumColumns'] = 2;

/**
 * Set to true if you want DB-based query history.If false, this utilizes
 * JS-routines to display query history (lost by window close)
 *
 * This requires configuration storage enabled, see above.
 * default = false
 */
//$cfg['QueryHistoryDB'] = true;

/**
 * When using DB-based query history, how many entries should be kept?
 * default = 25
 */
//$cfg['QueryHistoryMax'] = 100;

/**
 * Whether or not to query the user before sending the error report to
 * the phpMyAdmin team when a JavaScript error occurs
 *
 * Available options
 * ('ask' | 'always' | 'never')
 * default = 'ask'
 */
//$cfg['SendErrorReports'] = 'always';

/**
 * You can find more configuration options in the documentation
 * in the doc/ folder or at <https://docs.phpmyadmin.net/>.
 */
