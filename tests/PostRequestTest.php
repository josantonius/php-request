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

use Josantonius\Request\Request;
use PHPUnit\Framework\TestCase;

/**
 * Tests class for Request library.
 */
class PostRequestTest extends TestCase
{
    /**
     * Request instance.
     *
     * @var object
     */
    protected $Request;

    /**
     * Set up.
     */
    public function setUp()
    {
        parent::setUp();
    }

    /**
     * Create cURL requests.
     *
     * @return mixed
     */
    public function request(array $params = [], bool $returnArray = true)
    {
        $file = 'PostRequestProxy.php';
        $url = 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/' . $file;

        $params = array_merge($params, [
            'method' => debug_backtrace()[1]['function']
        ]);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        $response = json_decode(curl_exec($ch), $returnArray);
        curl_close($ch);

        return $response;
    }

    /**
     * Tested method: $_POST()->asArray()
     */
    public function testGetAllParamsAsArrayFromPostRequest()
    {
        $response = $this->request()['response'];

        $this->assertInternalType('array', $response);

        $this->assertContains($response['method'], __FUNCTION__);
    }

    /**
     * Tested method: $_POST()->asArray(['method' => 'string'])
     */
    public function testGetAllParamsAsArrayFromPostRequestAndFilterEachValue()
    {
        $response = $this->request()['response'];

        $this->assertInternalType('array', $response);

        $this->assertContains($response['method'], __FUNCTION__);

        $this->assertNull($response['nonexistent_key']);
    }

    /**
     * Tested method: $_POST()->asObject()
     */
    public function testGetAllParamsAsObjectFromPostRequest()
    {
        $response = $this->request([], false)->response;

        $this->assertInternalType('object', $response);

        $this->assertContains($response->method, __FUNCTION__);
    }

    /**
     * Tested method: $_POST()->asObject(['method' => 'string'])
     */
    public function testGetAllParamsAsObjectFromPostRequestAndFilterEachValue()
    {
        $response = $this->request([], false)->response;

        $this->assertInternalType('object', $response);

        $this->assertContains($response->method, __FUNCTION__);

        $this->assertNull($response->nonexistent_key);
    }

    /**
     * Tested method: $_POST()->asJson()
     */
    public function testGetAllParamsAsJsonFromPostRequest()
    {
        $response = $this->request()['response'];

        $this->assertInternalType('string', $response);

        $this->assertContains('{"method":"testGetAllParamsAsJsonFromPostRequest"}', $response);
    }

    /**
     * Tested method: $_POST('foo')->asString()
     */
    public function testGetStringValueAsStringFromPostRequest()
    {
        $params = ['foo' => 'bar'];

        $response = $this->request($params)['response'];

        $this->assertInternalType('string', $response);

        $this->assertContains('bar', $response);
    }

    /**
     * Tested method: $_POST('?')->asString()
     */
    public function testNonExistentKeyAsStringFromPostRequest()
    {
        $response = $this->request()['response'];

        $this->assertNull($response);
    }

    /**
     * Tested method: $_POST('?')->asString('default_param')
     */
    public function testNonExistentKeyAsStringFromPostRequestAndReturnDefaultParam()
    {
        $response = $this->request()['response'];

        $this->assertSame('default_param', $response);
    }

    /**
     * Tested method: $_POST('foo')->asInteger()
     */
    public function testGetStringValueAsIntegerFromPostRequest()
    {
        $params = ['foo' => 0];

        $response = $this->request($params)['response'];

        $this->assertInternalType('int', $response);

        $this->assertSame(0, $response);
    }

    /**
     * Tested method: $_POST('?')->asInteger()
     */
    public function testNonExistentKeyAsIntegerFromPostRequest()
    {
        $response = $this->request()['response'];

        $this->assertNull($response);
    }

    /**
     * Tested method: $_POST('?')->asInteger(8)
     */
    public function testNonExistentKeyAsIntegerFromPostRequestAndReturnDefaultParam()
    {
        $response = $this->request()['response'];

        $this->assertSame(8, $response);
    }

    /**
     * Tested method: $_POST('foo')->asFloat()
     */
    public function testGetStringValueAsFloatFromPostRequest()
    {
        $params = ['foo' => 0.8];

        $response = $this->request($params)['response'];

        $this->assertInternalType('float', $response);

        $this->assertSame(0.8, $response);
    }

    /**
     * Tested method: $_POST('?')->asFloat()
     */
    public function testNonExistentKeyAsFloatFromPostRequest()
    {
        $response = $this->request()['response'];

        $this->assertNull($response);
    }

    /**
     * Tested method: $_POST('?')->asFloat(0.8)
     */
    public function testNonExistentKeyAsFloatFromPostRequestAndReturnDefaultParam()
    {
        $response = $this->request()['response'];

        $this->assertSame(0.8, $response);
    }

    /**
     * Tested method: $_POST('foo')->asBoolean()
     */
    public function testGetStringBooleanTrueValueAsBooleanFromPostRequest()
    {
        $params = ['foo' => 'true'];

        $response = $this->request($params)['response'];

        $this->assertInternalType('boolean', $response);

        $this->assertTrue($response);
    }

    /**
     * Tested method: $_POST('foo')->asBoolean()
     */
    public function testGetBooleanTrueValueAsBooleanFromPostRequest()
    {
        $params = ['foo' => true];

        $response = $this->request($params)['response'];

        $this->assertInternalType('boolean', $response);

        $this->assertTrue($response);
    }

    /**
     * Tested method: $_POST('foo')->asBoolean()
     */
    public function testGetStringBooleanFalseValueAsBooleanFromPostRequest()
    {
        $params = ['foo' => 'false'];

        $response = $this->request($params)['response'];

        $this->assertInternalType('boolean', $response);

        $this->assertFalse($response);
    }

    /**
     * Tested method: $_POST('foo')->asBoolean()
     */
    public function testGetBooleanFalseValueAsBooleanFromPostRequest()
    {
        $params = ['foo' => false];

        $response = $this->request($params)['response'];

        $this->assertInternalType('boolean', $response);

        $this->assertFalse($response);
    }

    /**
     * Tested method: $_POST('foo')->asBoolean()
     */
    public function testGetStringIntegerTrueValueAsBooleanFromPostRequest()
    {
        $params = ['foo' => '1'];

        $response = $this->request($params)['response'];

        $this->assertInternalType('boolean', $response);

        $this->assertTrue($response);
    }

    /**
     * Tested method: $_POST('foo')->asBoolean()
     */
    public function testGetIntegerTrueValueAsBooleanFromPostRequest()
    {
        $params = ['foo' => 1];

        $response = $this->request($params)['response'];

        $this->assertInternalType('boolean', $response);

        $this->assertTrue($response);
    }

    /**
     * Tested method: $_POST('foo')->asBoolean()
     */
    public function testGetStringIntegerFalseValueAsBooleanFromPostRequest()
    {
        $params = ['foo' => '0'];

        $response = $this->request($params)['response'];

        $this->assertInternalType('boolean', $response);

        $this->assertFalse($response);
    }

    /**
     * Tested method: $_POST('foo')->asBoolean()
     */
    public function testGetIntegerFalseValueAsBooleanFromPostRequest()
    {
        $params = ['foo' => 0];

        $response = $this->request($params)['response'];

        $this->assertInternalType('boolean', $response);

        $this->assertFalse($response);
    }

    /**
     * Tested method: $_POST('?')->asBoolean()
     */
    public function testNonExistentKeyAsBooleanFromPostRequest()
    {
        $response = $this->request()['response'];

        $this->assertNull($response);
    }

    /**
     * Tested method: $_POST('?')->asBoolean(true)
     */
    public function testNonExistentKeyAsBooleanFromPostRequestAndReturnDefaultParam()
    {
        $response = $this->request()['response'];

        $this->assertTrue($response);
    }

    /**
     * Tested method: $_POST('foo')->asIp()
     */
    public function testGetStringValueAsIpFromPostRequest()
    {
        $params = ['foo' => '192.168.1.1'];

        $response = $this->request($params)['response'];

        $this->assertInternalType('string', $response);

        $this->assertContains('192.168.1.1', $response);
    }

    /**
     * Tested method: $_POST('?')->asIp()
     */
    public function testNonExistentKeyAsIpFromPostRequest()
    {
        $response = $this->request()['response'];

        $this->assertNull($response);
    }

    /**
     * Tested method: $_POST('?')->asIp('192.168.1.1')
     */
    public function testNonExistentKeyAsIpFromPostRequestAndReturnDefaultParam()
    {
        $response = $this->request()['response'];

        $this->assertSame('192.168.1.1', $response);
    }

    /**
     * Tested method: $_POST('foo')->asUrl()
     */
    public function testGetStringValueAsUrlFromPostRequest()
    {
        $params = ['foo' => 'https://josantonius.com'];

        $response = $this->request($params)['response'];

        $this->assertInternalType('string', $response);

        $this->assertContains('https://josantonius.com', $response);
    }

    /**
     * Tested method: $_POST('?')->asUrl()
     */
    public function testNonExistentKeyAsUrlFromPostRequest()
    {
        $response = $this->request()['response'];

        $this->assertNull($response);
    }

    /**
     * Tested method: $_POST('?')->asUrl('https://josantonius.com')
     */
    public function testNonExistentKeyAsUrlFromPostRequestAndReturnDefaultParam()
    {
        $response = $this->request()['response'];

        $this->assertSame('https://josantonius.com', $response);
    }

    /**
     * Tested method: $_POST('foo')->asEmail()
     */
    public function testGetStringValueAsEmailFromPostRequest()
    {
        $params = ['foo' => 'hello@josantonius.com'];

        $response = $this->request($params)['response'];

        $this->assertInternalType('string', $response);

        $this->assertContains('hello@josantonius.com', $response);
    }

    /**
     * Tested method: $_POST('?')->asEmail()
     */
    public function testNonExistentKeyAsEmailFromPostRequest()
    {
        $response = $this->request()['response'];

        $this->assertNull($response);
    }

    /**
     * Tested method: $_POST('?')->asEmail('hello@josantonius.com')
     */
    public function testNonExistentKeyAsEmailFromPostRequestAndReturnDefaultParam()
    {
        $response = $this->request()['response'];

        $this->assertSame('hello@josantonius.com', $response);
    }
}
