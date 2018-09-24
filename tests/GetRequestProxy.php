<?php
/**
 * PHP library for handling requests.
 *
 * @author    Josantonius <hello@josantonius.com>
 * @copyright 2017 - 2018 (c) Josantonius - PHP-Request
 * @license   https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link      https://github.com/Josantonius/PHP-Request
 * @since     2.0.0
 */
namespace Josantonius\Request\Test;

require '../vendor/autoload.php';

use Josantonius\Request\Request;

$method = $_GET['method'];

GetRequestProxy::$method();

class GetRequestProxy
{
    public static function testGetAllParamsAsArrayFromGetRequest()
    {
        $_GET = Request::input('GET');

        echo json_encode([
            'response' => $_GET()->asArray()
        ]);
    }

    public static function testGetAllParamsAsArrayFromGetRequestAndFilterEachValue()
    {
        $_GET = Request::input('GET');

        echo json_encode([
            'response' => $_GET()->asArray([
                'method' => 'string',
                'nonexistent_key' => 'integer',
            ])
        ]);
    }

    public static function testGetAllParamsAsObjectFromGetRequest()
    {
        $_GET = Request::input('GET');

        echo json_encode([
            'response' => $_GET()->asObject()
        ]);
    }

    public static function testGetAllParamsAsObjectFromGetRequestAndFilterEachValue()
    {
        $_GET = Request::input('GET');

        echo json_encode([
            'response' => $_GET()->asObject([
                'method' => 'string',
                'nonexistent_key' => 'integer',
            ])
        ]);
    }

    public static function testGetAllParamsAsJsonFromGetRequest()
    {
        $_GET = Request::input('GET');

        echo json_encode([
            'response' => $_GET()->asJson()
        ]);
    }

    public static function testGetStringValueAsStringFromGetRequest()
    {
        $_GET = Request::input('GET');

        echo json_encode([
            'response' => $_GET('foo')->asString()
        ]);
    }

    public static function testNonExistentKeyAsStringFromGetRequest()
    {
        $_GET = Request::input('GET');

        echo json_encode([
            'response' => $_GET('?')->asString()
        ]);
    }

    public static function testNonExistentKeyAsStringFromGetRequestAndReturnDefaultParam()
    {
        $_GET = Request::input('GET');

        echo json_encode([
            'response' => $_GET('?')->asString('default_param')
        ]);
    }

    public static function testGetStringValueAsIntegerFromGetRequest()
    {
        $_GET = Request::input('GET');

        echo json_encode([
            'response' => $_GET('foo')->asInteger()
        ]);
    }

    public static function testNonExistentKeyAsIntegerFromGetRequest()
    {
        $_GET = Request::input('GET');

        echo json_encode([
            'response' => $_GET('?')->asInteger()
        ]);
    }

    public static function testNonExistentKeyAsIntegerFromGetRequestAndReturnDefaultParam()
    {
        $_GET = Request::input('GET');

        echo json_encode([
            'response' => $_GET('?')->asInteger(8)
        ]);
    }

    public static function testGetStringValueAsFloatFromGetRequest()
    {
        $_GET = Request::input('GET');

        echo json_encode([
            'response' => $_GET('foo')->asFloat()
        ]);
    }

    public static function testNonExistentKeyAsFloatFromGetRequest()
    {
        $_GET = Request::input('GET');

        echo json_encode([
            'response' => $_GET('?')->asFloat()
        ]);
    }

    public static function testNonExistentKeyAsFloatFromGetRequestAndReturnDefaultParam()
    {
        $_GET = Request::input('GET');

        echo json_encode([
            'response' => $_GET('?')->asFloat(0.8)
        ]);
    }

    public static function testGetStringBooleanTrueValueAsBooleanFromGetRequest()
    {
        $_GET = Request::input('GET');

        echo json_encode([
            'response' => $_GET('foo')->asBoolean()
        ]);
    }

    public static function testGetStringBooleanFalseValueAsBooleanFromGetRequest()
    {
        $_GET = Request::input('GET');

        echo json_encode([
            'response' => $_GET('foo')->asBoolean()
        ]);
    }

    public static function testGetStringIntegerTrueValueAsBooleanFromGetRequest()
    {
        $_GET = Request::input('GET');

        echo json_encode([
            'response' => $_GET('foo')->asBoolean()
        ]);
    }

    public static function testGetStringIntegerFalseValueAsBooleanFromGetRequest()
    {
        $_GET = Request::input('GET');

        echo json_encode([
            'response' => $_GET('foo')->asBoolean()
        ]);
    }

    public static function testNonExistentKeyAsBooleanFromGetRequest()
    {
        $_GET = Request::input('GET');

        echo json_encode([
            'response' => $_GET('?')->asBoolean()
        ]);
    }

    public static function testNonExistentKeyAsBooleanFromGetRequestAndReturnDefaultParam()
    {
        $_GET = Request::input('GET');

        echo json_encode([
            'response' => $_GET('?')->asBoolean(true)
        ]);
    }

    public static function testGetStringValueAsIpFromGetRequest()
    {
        $_GET = Request::input('GET');

        echo json_encode([
            'response' => $_GET('foo')->asIp()
        ]);
    }

    public static function testNonExistentKeyAsIpFromGetRequest()
    {
        $_GET = Request::input('GET');

        echo json_encode([
            'response' => $_GET('?')->asIp()
        ]);
    }

    public static function testNonExistentKeyAsIpFromGetRequestAndReturnDefaultParam()
    {
        $_GET = Request::input('GET');

        echo json_encode([
            'response' => $_GET('?')->asIp('192.168.1.1')
        ]);
    }

    public static function testGetStringValueAsUrlFromGetRequest()
    {
        $_GET = Request::input('GET');

        echo json_encode([
            'response' => $_GET('foo')->asUrl()
        ]);
    }

    public static function testNonExistentKeyAsUrlFromGetRequest()
    {
        $_GET = Request::input('GET');

        echo json_encode([
            'response' => $_GET('?')->asUrl()
        ]);
    }

    public static function testNonExistentKeyAsUrlFromGetRequestAndReturnDefaultParam()
    {
        $_GET = Request::input('GET');

        echo json_encode([
            'response' => $_GET('?')->asUrl('https://josantonius.com')
        ]);
    }

    public static function testGetStringValueAsEmailFromGetRequest()
    {
        $_GET = Request::input('GET');

        echo json_encode([
            'response' => $_GET('foo')->asEmail()
        ]);
    }

    public static function testNonExistentKeyAsEmailFromGetRequest()
    {
        $_GET = Request::input('GET');

        echo json_encode([
            'response' => $_GET('?')->asEmail()
        ]);
    }

    public static function testNonExistentKeyAsEmailFromGetRequestAndReturnDefaultParam()
    {
        $_GET = Request::input('GET');

        echo json_encode([
            'response' => $_GET('?')->asEmail('hello@josantonius.com')
        ]);
    }
}
