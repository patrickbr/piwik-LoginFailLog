<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */
namespace Piwik\Plugins\LoginFailLog;

use Piwik\Container\StaticContainer;
use Piwik\Session;
use Piwik\IP;

class LoginFailLog extends \Piwik\Plugin
{
    public function registerEvents()
    {
        return array(
            'Login.authenticate.failed' => 'logFailedLogin'
        );
    }

    /**
     * Log failed login attempts
     */
    public function logFailedLogin($login)
    {
        $ip = StaticContainer::get('Piwik\IP');
        $logger = StaticContainer::get('Psr\Log\LoggerInterface');
        $logger->warning('Failed PIWIK login from {ip} with username \'{user}\'.', array(
            'ip' => $ip->getIpFromHeader(),
            'user' => $login
        ));
    }
}
