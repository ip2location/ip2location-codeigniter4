<?php namespace App\Controllers;

use App\Libraries\IP2Location_lib;
use App\Models\IP2Location_model;

date_default_timezone_set('Etc/UTC');

define('IP2LOCATION_DATABASE_TABLE', 'YOUR IP2LOCATION TABLE NAME');

class IP2Location_test extends BaseController {
    public function index() {
        $ipl = new IP2Location_lib();

        // BIN Database
        $countryCode = $ipl->getCountryCode('8.8.8.8');

        echo '<p>Country code for 8.8.8.8: ' . $countryCode . '</p>';
        
        echo '
        <div>You can download the latest BIN database at
            <ul>
                <li><a href="https://lite.ip2location.com">IP2Location LITE BIN Database (Free)</a></li>
                <li><a href="https://www.ip2location.com">IP2Location BIN Database (Comprehensive)</a></li>
            </ul>
        </div>';

        // Web Service
        echo '<pre>';
        print_r ($ipl->getWebService('8.8.8.8'));
        echo '</pre>';

        // MySQL Query
        $db = model('IP2Location_model', false);
        $data = $db->lookup('8.8.8.8');
        echo '<pre>';
        print_r ($data);
        echo '</pre>';
    }
}
