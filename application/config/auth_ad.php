<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @package         Auth_AD
 * @subpackage      configuration
 * @author          Ntonsite Mwamlima
 * @version         0.4
 */

// hosts: an array of AD servers (usually domain controllers) to use for authentication		
$config['hosts'] = array('192.168.0.234');

// port: the remote port number to connect to (default is 389) 
$config['port'] = 389;

// base_dn: the base DN of your Active Directory domain
$config['base_dn'] = 'dc=accessbank,dc=internal';

// ad_domain: the domain name to prepend (versions prior to Windows 2000) or append (Windows 2000 and up)
$config['ad_domain'] = 'accessbank.internal';

// start_ou: the DN of the OU you want to start searching from. Leave empty to start from domain root.
// examples: 'OU=Users' or 'OU=Corporate,OU=Users'
$config['start_ou'] = '';

// proxy_user: the (distinguished) username of the user that does the querying (AD generally does not allow anonymous binds) 
$config['proxy_user'] = 'ACCESSBANK01\nmwamlima';

// proxy_pass: This password comes from the AD user generic user to have a read access
$config['proxy_pass'] = '$TOny2020';

/* End of file auth_ad.php */
/* Location: ./application/config/auth_ad.php */
