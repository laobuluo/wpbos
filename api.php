<?php
if (!defined('ABSPATH')) {
    exit;
}

// 抑制 BaiduBce.phar 内旧版 Guzzle 在 PHP 8+ 下的 ArrayAccess 弃用警告（phar 无法修改）
if (PHP_VERSION_ID >= 80000) {
    set_error_handler(function ($errno, $errstr, $errfile) {
        if ($errno === E_DEPRECATED && $errfile && strpos($errfile, 'BaiduBce.phar') !== false) {
            return true;
        }
        return false;
    }, E_DEPRECATED);
}

require_once dirname(__FILE__) . '/sdk/BaiduBce.phar';
use BaiduBce\Services\Bos\BosClient;


class BosStorageObjectApi
{
	private $bucket;
	private $client;


	public function __construct($options) {
	    $options = is_array($options) ? $options : array();
	    $this->bucket = isset($options['bucket']) ? $options['bucket'] : '';
        $BOS_TEST_CONFIG = array(
            'credentials' => array(
                'accessKeyId' => isset($options['accessKeyId']) ? $options['accessKeyId'] : '',
                'secretAccessKey' => isset($options['secretAccessKey']) ? $options['secretAccessKey'] : '',
            ),
            'endpoint' => isset($options['endpoint']) ? $options['endpoint'] : '',
            'protocol' => isset($options['protocol']) ? $options['protocol'] : 'https',
        );
        $this->client = new BosClient($BOS_TEST_CONFIG);
	}


	public function Upload($key, $localFilePath) {
	    try {
            $this->client->putObjectFromFile($this->bucket, $key, $localFilePath);
        } catch (\BaiduBce\Exception\BceBaseException $e) {
            if (defined('WP_DEBUG') && WP_DEBUG) {
                error_log('WPBOS Upload Error: ' . $e->getMessage() . ' (Key: ' . $key . ')');
            }
            throw $e;
        }
    }


	public function Delete($keys) {
		foreach( $keys as $k => $v ){
            $this->client->deleteObject($this->bucket, $v);
		}
	}


	public function hasExist($key) {
        try {
            $this->client->getObjectMetadata($this->bucket, $key);
            return True;
        } catch (\BaiduBce\Exception\BceBaseException $e) {
            if ($e->getStatusCode() == 404) {
        //        echo 'objectKey' . " not exist!";
                return False;
            }
            return False;
        }
	}
}