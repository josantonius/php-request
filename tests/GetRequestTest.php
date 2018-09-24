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
class GetRequestTest extends TestCase
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
    public function request(string $params = '', bool $returnArray = true)
    {
        $file = 'GetRequestProxy.php';
        $url = 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/' . $file;
        $params = '?method=' . debug_backtrace()[1]['function'] . $params;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url . $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = json_decode(curl_exec($ch), $returnArray);
        curl_close($ch);

        return $response;
    }

    /**
     * Tested method: $_GET()->asArray()
     */
    public function testGetAllParamsAsArrayFromGetRequest()
    {
        $response = $this->request()['response'];

        $this->assertInternalType('array', $response);

        $this->assertContains($response['method'], __FUNCTION__);
    }

    /**
     * Tested method: $_GET()->asArray(['method' => 'string'])
     */
    public function testGetAllParamsAsArrayFromGetRequestAndFilterEachValue()
    {
        $response = $this->request()['response'];

        $this->assertInternalType('array', $response);

        $this->assertContains($response['method'], __FUNCTION__);

        $this->assertNull($response['nonexistent_key']);
    }

    /**
     * Tested method: $_GET()->asObject()
     */
    public function testGetAllParamsAsObjectFromGetRequest()
    {
        $response = $this->request('', false)->response;

        $this->assertInternalType('object', $response);

        $this->assertContains($response->method, __FUNCTION__);
    }

    /**
     * Tested method: $_GET()->asObject(['method' => 'string'])
     */
    public function testGetAllParamsAsObjectFromGetRequestAndFilterEachValue()
    {
        $response = $this->request('', false)->response;

        $this->assertInternalType('object', $response);

        $this->assertContains($response->method, __FUNCTION__);

        $this->assertNull($response->nonexistent_key);
    }

    /**
     * Tested method: $_GET()->asJson()
     */
    public function testGetAllParamsAsJsonFromGetRequest()
    {
        $response = $this->request()['response'];

        $this->assertInternalType('string', $response);

        $this->assertContains('{"method":"testGetAllParamsAsJsonFromGetRequest"}', $response);
    }

    /**
     * Tested method: $_GET('foo')->asString()
     */
    public function testGetStringValueAsStringFromGetRequest()
    {
        $params = '&foo=bar';

        $response = $this->request($params)['response'];

        $this->assertInternalType('string', $response);

        $this->assertContains('bar', $response);
    }

    /**
     * Tested method: $_GET('?')->asString()
     */
    public function testNonExistentKeyAsStringFromGetRequest()
    {
        $response = $this->request()['response'];

        $this->assertNull($response);
    }

    /**
     * Tested method: $_GET('?')->asString('default_param')
     */
    public function testNonExistentKeyAsStringFromGetRequestAndReturnDefaultParam()
    {
        $response = $this->request()['response'];

        $this->assertSame('default_param', $response);
    }

    /**
     * Tested method: $_GET('foo')->asInteger()
     */
    public function testGetStringValueAsIntegerFromGetRequest()
    {
        $params = '&foo=0';

        $response = $this->request($params)['response'];

        $this->assertInternalType('int', $response);

        $this->assertSame(0, $response);
    }

    /**
     * Tested method: $_GET('?')->asInteger()
     */
    public function testNonExistentKeyAsIntegerFromGetRequest()
    {
        $response = $this->request()['response'];

        $this->assertNull($response);
    }

    /**
     * Tested method: $_GET('?')->asInteger(8)
     */
    public function testNonExistentKeyAsIntegerFromGetRequestAndReturnDefaultParam()
    {
        $response = $this->request()['response'];

        $this->assertSame(8, $response);
    }

    /**
     * Tested method: $_GET('foo')->asFloat()
     */
    public function testGetStringValueAsFloatFromGetRequest()
    {
        $params = '&foo=0.8';

        $response = $this->request($params)['response'];

        $this->assertInternalType('float', $response);

        $this->assertSame(0.8, $response);
    }

    /**
     * Tested method: $_GET('?')->asFloat()
     */
    public function testNonExistentKeyAsFloatFromGetRequest()
    {
        $response = $this->request()['response'];

        $this->assertNull($response);
    }

    /**
     * Tested method: $_GET('?')->asFloat(0.8)
     */
    public function testNonExistentKeyAsFloatFromGetRequestAndReturnDefaultParam()
    {
        $response = $this->request()['response'];

        $this->assertSame(0.8, $response);
    }

    /**
     * Tested method: $_GET('foo')->asBoolean()
     */
    public function testGetStringBooleanTrueValueAsBooleanFromGetRequest()
    {
        $params = '&foo=true';

        $response = $this->request($params)['response'];

        $this->assertInternalType('boolean', $response);

        $this->assertTrue($response);
    }

    /**
     * Tested method: $_GET('foo')->asBoolean()
     */
    public function testGetStringBooleanFalseValueAsBooleanFromGetRequest()
    {
        $params = '&foo=false';

        $response = $this->request($params)['response'];

        $this->assertInternalType('boolean', $response);

        $this->assertFalse($response);
    }

    /**
     * Tested method: $_GET('foo')->asBoolean()
     */
    public function testGetStringIntegerTrueValueAsBooleanFromGetRequest()
    {
        $params = '&foo=1';

        $response = $this->request($params)['response'];

        $this->assertInternalType('boolean', $response);

        $this->assertTrue($response);
    }

    /**
     * Tested method: $_GET('foo')->asBoolean()
     */
    public function testGetStringIntegerFalseValueAsBooleanFromGetRequest()
    {
        $params = '&foo=0';

        $response = $this->request($params)['response'];

        $this->assertInternalType('boolean', $response);

        $this->assertFalse($response);
    }

    /**
     * Tested method: $_GET('?')->asBoolean()
     */
    public function testNonExistentKeyAsBooleanFromGetRequest()
    {
        $response = $this->request()['response'];

        $this->assertNull($response);
    }

    /**
     * Tested method: $_GET('?')->asBoolean(true)
     */
    public function testNonExistentKeyAsBooleanFromGetRequestAndReturnDefaultParam()
    {
        $response = $this->request()['response'];

        $this->assertTrue($response);
    }

    /**
     * Tested method: $_GET('foo')->asIp()
     */
    public function testGetStringValueAsIpFromGetRequest()
    {
        $params = '&foo=192.168.1.1';

        $response = $this->request($params)['response'];

        $this->assertInternalType('string', $response);

        $this->assertContains('192.168.1.1', $response);
    }

    /**
     * Tested method: $_GET('?')->asIp()
     */
    public function testNonExistentKeyAsIpFromGetRequest()
    {
        $response = $this->request()['response'];

        $this->assertNull($response);
    }

    /**
     * Tested method: $_GET('?')->asIp('192.168.1.1')
     */
    public function testNonExistentKeyAsIpFromGetRequestAndReturnDefaultParam()
    {
        $response = $this->request()['response'];

        $this->assertSame('192.168.1.1', $response);
    }

    /**
     * Tested method: $_GET('foo')->asUrl()
     */
    public function testGetStringValueAsUrlFromGetRequest()
    {
        $params = '&foo=' . urlencode('https://josantonius.com');

        $response = $this->request($params)['response'];

        $this->assertInternalType('string', $response);

        $this->assertContains('https://josantonius.com', $response);
    }

    /**
     * Tested method: $_GET('?')->asUrl()
     */
    public function testNonExistentKeyAsUrlFromGetRequest()
    {
        $response = $this->request()['response'];

        $this->assertNull($response);
    }

    /**
     * Tested method: $_GET('?')->asUrl('https://josantonius.com')
     */
    public function testNonExistentKeyAsUrlFromGetRequestAndReturnDefaultParam()
    {
        $response = $this->request()['response'];

        $this->assertSame('https://josantonius.com', $response);
    }

    /**
     * Tested method: $_GET('foo')->asEmail()
     */
    public function testGetStringValueAsEmailFromGetRequest()
    {
        $params = '&foo=hello@josantonius.com';

        $response = $this->request($params)['response'];

        $this->assertInternalType('string', $response);

        $this->assertContains('hello@josantonius.com', $response);
    }

    /**
     * Tested method: $_GET('?')->asEmail()
     */
    public function testNonExistentKeyAsEmailFromGetRequest()
    {
        $response = $this->request()['response'];

        $this->assertNull($response);
    }

    /**
     * Tested method: $_GET('?')->asEmail('hello@josantonius.com')
     */
    public function testNonExistentKeyAsEmailFromGetRequestAndReturnDefaultParam()
    {
        $response = $this->request()['response'];

        $this->assertSame('hello@josantonius.com', $response);
    }
}
