<?php
namespace Roots\Sage\RemoteApi;

use Roots\Sage\API\API;
use Roots\Sage\Models\Candidate\Candidate;

class RemoteApi extends API\API  {
    protected $User;
    protected $origin = 'http://api.wapcard.se/api/';

    public function __construct($request, $origin) {
        parent::__construct($request);

        // Abstracted out for example
//        $APIKey = new Models\APIKey();
        $APIKey = 'a0da6fba2ad43f51d1149c792a1e45991a8437da';
        $User = new Candidate();

        if (!array_key_exists('apiKey', $this->request)) {
            throw new Exception('No API Key provided');
        } else if (!$APIKey->verifyKey($this->request['apiKey'], $origin)) {
            throw new Exception('Invalid API Key');
        } else if (array_key_exists('token', $this->request) &&
            !$User->get('token', $this->request['token'])) {

            throw new Exception('Invalid User Token');
        }

        $this->User = $User;
    }

    /**
     * Example of an Endpoint
     */
    protected function example() {
        if ($this->method == 'GET') {
            return "Your name is " . $this->User->name;
        } else {
            return "Only accepts GET requests";
        }
    }
}
?>