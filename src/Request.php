<?php declare(strict_types=1);
/**
 * PHP library for handling requests.
 * 
 * @category   JST
 * @package    Request
 * @subpackage Request
 * @author     Josantonius - info@josantonius.com
 * @copyright  Copyright (c) 2017 JST PHP Framework
 * @license    https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @version    1.0.0
 * @link       https://github.com/Josantonius/PHP-Request
 * @since      File available since 1.0.0 - Update: 2017-01-17
 */

namespace Josantonius\Request;

# use Josantonius\Request\Exception\RequestException;

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
    public static function get(string $key = null) {

        return $_GET[$key] ?? $_GET ?? null;
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
    public static function post(string $key = null) {

        return $_POST[$key] ?? $_POST ?? null;
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
    public static function files(string $key = null) {

        return $_FILES[$key] ?? $_FILES ?? null;        
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
    public static function put(string $key = null) {

        parse_str(file_get_contents("php://input"), $_PUT);

        return $_PUT[$key] ?? $_PUT ?? null;
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
    public static function del(string $key) {

        parse_str(file_get_contents("php://input"), $_DEL);

        return $_DEL[$key] ?? null;
    }
    
    /**
     * Check if it is a GET request.
     *
     * @since 1.0.0
     *
     * @return boolean
     */
    public static function isGet() {

        return $_SERVER["REQUEST_METHOD"] === "GET";
    }

    /**
     * Check if it is a POST request.
     *
     * @since 1.0.0
     *
     * @return boolean
     */
    public static function isPost() {

        return $_SERVER["REQUEST_METHOD"] === "POST";
    }

    
    /**
     * Check if it is a PUT request.
     *
     * @since 1.0.0
     *
     * @return boolean
     */
    public static function isPut() {

        return $_SERVER["REQUEST_METHOD"] === "PUT";
    }
    
    /**
     * Check if it is a DELETE request.
     *
     * @since 1.0.0
     *
     * @return boolean
     */
    public static function isDelete() {

        return $_SERVER["REQUEST_METHOD"] === "DELETE";
    }

    /**
     * Check if it is a AJAX request.
     *
     * @since 1.0.0
     *
     * @return boolean
     */
    public static function isAjax() {

        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {

            return strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
        }

        return false;
    }
}