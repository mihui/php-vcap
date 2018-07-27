<?php

namespace ENV;

class VCAP {

    const ENV_KEY = 'VCAP_SERVICES';
    const ENV_CREDENTIAL_KEY = 'credentials';

    protected $_vcap_services = NULL;
    protected $_is_local = FALSE;

    private static $__vcap_instance = NULL;

    function __construct() {

        $vcap = getenv(self::ENV_KEY);

        if(is_null($vcap) || empty($vcap)) {

            $this->_is_local = TRUE;
            $path = './env.json';
            if(file_exists($path) && is_readable($path)) {
                $vcap = file_get_contents($path);
            }
        }
        $this->_vcap_services = json_decode($vcap, TRUE);
    }

    public static function getInstance() {

        if(self::$__vcap_instance === NULL) {

            self::$__vcap_instance = new VCAP();
        }
        return self::$__vcap_instance;
    }

    public function getVCAP() {

        return $this->_vcap_services;
    }

    public function getService($name) {

        return isset($this->_vcap_services[$name]) ? $this->_vcap_services[$name] : [];
    }

    public function getServiceVariables($name, $key) {

        $ret = [];
        $list = $this->getService($name);

        foreach($list as $listKey => $listVal) {

            $hasKey = array_key_exists($key, $listVal);

            if($hasKey) {
                array_push($ret, $listVal[$key]);
            }
        }

        return $ret;
    }

    public function getServiceVariable($name, $key) {

        $list = $this->getService($name);

        foreach($list as $listKey => $listVal) {

            $hasKey = array_key_exists($key, $listVal);

            if($hasKey) {
                return $listVal[$key];
            }
        }

        return NULL;
    }

    public function getServiceCredential($name) {

        return $this->getServiceVariable($name, self::ENV_CREDENTIAL_KEY);
    }

    public function isLocal() {

        return $this->_is_local;
    }

    /**
     * @codeCoverageIgnore
     */
    function __destruct() {

        unset($this->_vcap_services);
        unset($this->_is_local);
    }
}
