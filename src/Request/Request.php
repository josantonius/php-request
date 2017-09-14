<?php
/**
 * PHP library for handling requests.
 * 
 * @author     Josantonius - hello@josantonius.com
 * @copyright  Copyright (c) 2017
 * @license    https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link       https://github.com/Josantonius/PHP-Request
 * @since      1.0.0
 */

namespace Josantonius\Request;

/**
 * Request handler.
 *
 * @since 1.0.0
 */
class Request {

    /**
     * Secure access to GET parameters.
     *
     * @since 1.0.0
     *
     * @param string $key
     *
     * @return mixed
     */
    public static function get($key = null) {

        if (isset($_GET[$key])) {

            return $_GET[$key];
        }

        return (!$key && isset($_GET)) ? $_GET : null;
    }

    /**
     * Secure access to POST parameters.
     *
     * @since 1.0.0
     *
     * @param string $key
     *
     * @return mixed
     */
    public static function post($key = null) {

        if (isset($_POST[$key])) {

            return $_POST[$key];
        }

        return (!$key && isset($_POST)) ? $_POST : null;
    }

    /**
     * Secure access to FILES parameters.
     *
     * @since 1.0.0
     *
     * @param string $key
     *
     * @return mixed
     */
    public static function files($key = null) {

        if (isset($_FILES[$key])) {

            return $_FILES[$key];
        }

        return (!$key && isset($_FILES)) ? $_FILES : null;     
    }

    /**
     * Secure access to PUT parameters.
     *
     * @since 1.0.0
     *
     * @param string $key
     *
     * @return mixed
     */
    public static function put($key = null) {

        parse_str(file_get_contents('php://input'), $_PUT);

        if (isset($_PUT[$key])) {

            return $_PUT[$key];
        }

        return (!$key && isset($_PUT)) ? $_PUT : null;
    }

    /**
     * Secure access to DELETE parameters.
     *
     * @since 1.0.0
     *
     * @param string $key
     *
     * @return mixed
     */
    public static function del($key) {

        parse_str(file_get_contents('php://input'), $_DEL);

        return (isset($_DEL[$key])) ? $_DEL[$key] : null;
    }
    
    /**
     * Check if it is a GET request.
     *
     * @since 1.0.0
     *
     * @return boolean
     */
    public static function isGet() {

        return $_SERVER['REQUEST_METHOD'] === 'GET';
    }

    /**
     * Check if it is a POST request.
     *
     * @since 1.0.0
     *
     * @return boolean
     */
    public static function isPost() {

        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    
    /**
     * Check if it is a PUT request.
     *
     * @since 1.0.0
     *
     * @return boolean
     */
    public static function isPut() {

        return $_SERVER['REQUEST_METHOD'] === 'PUT';
    }
    
    /**
     * Check if it is a DELETE request.
     *
     * @since 1.0.0
     *
     * @return boolean
     */
    public static function isDelete() {

        return $_SERVER['REQUEST_METHOD'] === 'DELETE';
    }

    /**
     * Check if it is a AJAX request.
     *
     * @since 1.0.0 
     *
     * @return boolean
     */
    public static function isAjax() {

        if (!empty($http = $_SERVER['HTTP_X_REQUESTED_WITH'])) {

            return strtolower($http) === 'xmlhttprequest';
        }

        return false;
    }
}
