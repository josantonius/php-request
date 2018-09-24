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
class PutRequestTest extends TestCase
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
    public function request(
        string $contentType = 'application/json',
        array $params = [],
        bool $returnArray = true
    ) {
        $file = 'PutRequestProxy.php';
        $method = debug_backtrace()[1]['function'];

        $url = 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/' . $file . '?method=' . $method;

        $params = array_merge($params, ['method' => $method]);

        switch ($contentType) {
            case 'application/atom+xml':
                $params = new \SimpleXmlElement($input);
                break;
            case 'text/html':
            case 'text/plain':
            case 'application/json':
            case 'application/javascript':
                $params = json_encode($params);
                break;
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: $contentType"]);

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        $response = json_decode(curl_exec($ch), $returnArray);
        curl_close($ch);

        return $response;
    }

    /**
     * Tested method: $_PUT()->asArray()
     */
    public function testGetAllParamsAsArrayFromMultipleContentType()
    {
        $response = $this->request('multipart/form-data')['response'];

        $this->assertContains($response['method'], __FUNCTION__);

        $response = $this->request('application/x-www-form-urlencoded')['response'];

        $this->assertContains($response['method'], __FUNCTION__);

        $response = $this->request('text/html')['response'];

        $this->assertContains($response['method'], __FUNCTION__);

        $response = $this->request('text/plain')['response'];

        $this->assertContains($response['method'], __FUNCTION__);

        $response = $this->request('application/json')['response'];

        $this->assertContains($response['method'], __FUNCTION__);

        $response = $this->request('application/javascript')['response'];

        $this->assertContains($response['method'], __FUNCTION__);
    }

    /**
     * Tested method: $_PUT()->asArray()
     */
    public function testGetAllParamsAsArrayFromPutRequest()
    {
        $response = $this->request()['response'];

        $this->assertContains($response['method'], __FUNCTION__);
    }

    /**
     * Tested method: $_PUT()->asArray(['method' => 'string'])
     */
    public function testGetAllParamsAsArrayFromPutRequestAndFilterEachValue()
    {
        $response = $this->request()['response'];

        $this->assertInternalType('array', $response);

        $this->assertContains($response['method'], __FUNCTION__);

        $this->assertNull($response['nonexistent_key']);
    }

    /**
     * Tested method: $_PUT()->asObject()
     */
    public function testGetAllParamsAsObjectFromPutRequest()
    {
        $response = $this->request('application/json', [], false)->response;

        $this->assertInternalType('object', $response);

        $this->assertContains($response->method, __FUNCTION__);
    }

    /**
     * Tested method: $_PUT()->asObject(['method' => 'string'])
     */
    public function testGetAllParamsAsObjectFromPutRequestAndFilterEachValue()
    {
        $response = $this->request('application/json', [], false)->response;

        $this->assertInternalType('object', $response);

        $this->assertContains($response->method, __FUNCTION__);

        $this->assertNull($response->nonexistent_key);
    }

    /**
     * Tested method: $_PUT()->asJson()
     */
    public function testGetAllParamsAsJsonFromPutRequest()
    {
        $response = $this->request()['response'];

        $this->assertInternalType('string', $response);

        $this->assertContains('{"method":"testGetAllParamsAsJsonFromPutRequest"}', $response);
    }

    /**
     * Tested method: $_PUT('foo')->asString()
     */
    public function testGetStringValueAsStringFromPutRequest()
    {
        $params = ['foo' => 'bar'];

        $response = $this->request('application/json', $params)['response'];

        $this->assertInternalType('string', $response);

        $this->assertContains('bar', $response);
    }

    /**
     * Tested method: $_PUT('?')->asString()
     */
    public function testNonExistentKeyAsStringFromPutRequest()
    {
        $response = $this->request()['response'];

        $this->assertNull($response);
    }

    /**
     * Tested method: $_PUT('?')->asString('default_param')
     */
    public function testNonExistentKeyAsStringFromPutRequestAndReturnDefaultParam()
    {
        $response = $this->request()['response'];

        $this->assertSame('default_param', $response);
    }

    /**
     * Tested method: $_PUT('foo')->asInteger()
     */
    public function testGetStringValueAsIntegerFromPutRequest()
    {
        $params = ['foo' => 0];

        $response = $this->request('application/json', $params)['response'];

        $this->assertInternalType('int', $response);

        $this->assertSame(0, $response);
    }

    /**
     * Tested method: $_PUT('?')->asInteger()
     */
    public function testNonExistentKeyAsIntegerFromPutRequest()
    {
        $response = $this->request()['response'];

        $this->assertNull($response);
    }

    /**
     * Tested method: $_PUT('?')->asInteger(8)
     */
    public function testNonExistentKeyAsIntegerFromPutRequestAndReturnDefaultParam()
    {
        $response = $this->request()['response'];

        $this->assertSame(8, $response);
    }

    /**
     * Tested method: $_PUT('foo')->asFloat()
     */
    public function testGetStringValueAsFloatFromPutRequest()
    {
        $params = ['foo' => 0.8];

        $response = $this->request('application/json', $params)['response'];

        $this->assertInternalType('float', $response);

        $this->assertSame(0.8, $response);
    }

    /**
     * Tested method: $_PUT('?')->asFloat()
     */
    public function testNonExistentKeyAsFloatFromPutRequest()
    {
        $response = $this->request()['response'];

        $this->assertNull($response);
    }

    /**
     * Tested method: $_PUT('?')->asFloat(0.8)
     */
    public function testNonExistentKeyAsFloatFromPutRequestAndReturnDefaultParam()
    {
        $response = $this->request()['response'];

        $this->assertSame(0.8, $response);
    }

    /**
     * Tested method: $_PUT('foo')->asBoolean()
     */
    public function testGetStringBooleanTrueValueAsBooleanFromPutRequest()
    {
        $params = ['foo' => 'true'];

        $response = $this->request('application/json', $params)['response'];

        $this->assertInternalType('boolean', $response);

        $this->assertTrue($response);
    }

    /**
     * Tested method: $_PUT('foo')->asBoolean()
     */
    public function testGetBooleanTrueValueAsBooleanFromPutRequest()
    {
        $params = ['foo' => true];

        $response = $this->request('application/json', $params)['response'];

        $this->assertInternalType('boolean', $response);

        $this->assertTrue($response);
    }

    /**
     * Tested method: $_PUT('foo')->asBoolean()
     */
    public function testGetStringBooleanFalseValueAsBooleanFromPutRequest()
    {
        $params = ['foo' => 'false'];

        $response = $this->request('application/json', $params)['response'];

        $this->assertInternalType('boolean', $response);

        $this->assertFalse($response);
    }

    /**
     * Tested method: $_PUT('foo')->asBoolean()
     */
    public function testGetBooleanFalseValueAsBooleanFromPutRequest()
    {
        $params = ['foo' => false];

        $response = $this->request('application/json', $params)['response'];

        $this->assertInternalType('boolean', $response);

        $this->assertFalse($response);
    }

    /**
     * Tested method: $_PUT('foo')->asBoolean()
     */
    public function testGetStringIntegerTrueValueAsBooleanFromPutRequest()
    {
        $params = ['foo' => '1'];

        $response = $this->request('application/json', $params)['response'];

        $this->assertInternalType('boolean', $response);

        $this->assertTrue($response);
    }

    /**
     * Tested method: $_PUT('foo')->asBoolean()
     */
    public function testGetIntegerTrueValueAsBooleanFromPutRequest()
    {
        $params = ['foo' => 1];

        $response = $this->request('application/json', $params)['response'];

        $this->assertInternalType('boolean', $response);

        $this->assertTrue($response);
    }

    /**
     * Tested method: $_PUT('foo')->asBoolean()
     */
    public function testGetStringIntegerFalseValueAsBooleanFromPutRequest()
    {
        $params = ['foo' => '0'];

        $response = $this->request('application/json', $params)['response'];

        $this->assertInternalType('boolean', $response);

        $this->assertFalse($response);
    }

    /**
     * Tested method: $_PUT('foo')->asBoolean()
     */
    public function testGetIntegerFalseValueAsBooleanFromPutRequest()
    {
        $params = ['foo' => 0];

        $response = $this->request('application/json', $params)['response'];

        $this->assertInternalType('boolean', $response);

        $this->assertFalse($response);
    }

    /**
     * Tested method: $_PUT('?')->asBoolean()
     */
    public function testNonExistentKeyAsBooleanFromPutRequest()
    {
        $response = $this->request()['response'];

        $this->assertNull($response);
    }

    /**
     * Tested method: $_PUT('?')->asBoolean(true)
     */
    public function testNonExistentKeyAsBooleanFromPutRequestAndReturnDefaultParam()
    {
        $response = $this->request()['response'];

        $this->assertTrue($response);
    }

    /**
     * Tested method: $_PUT('foo')->asIp()
     */
    public function testGetStringValueAsIpFromPutRequest()
    {
        $params = ['foo' => '192.168.1.1'];

        $response = $this->request('application/json', $params)['response'];

        $this->assertInternalType('string', $response);

        $this->assertContains('192.168.1.1', $response);
    }

    /**
     * Tested method: $_PUT('?')->asIp()
     */
    public function testNonExistentKeyAsIpFromPutRequest()
    {
        $response = $this->request()['response'];

        $this->assertNull($response);
    }

    /**
     * Tested method: $_PUT('?')->asIp('192.168.1.1')
     */
    public function testNonExistentKeyAsIpFromPutRequestAndReturnDefaultParam()
    {
        $response = $this->request()['response'];

        $this->assertSame('192.168.1.1', $response);
    }

    /**
     * Tested method: $_PUT('foo')->asUrl()
     */
    public function testGetStringValueAsUrlFromPutRequest()
    {
        $params = ['foo' => 'https://josantonius.com'];

        $response = $this->request('application/json', $params)['response'];

        $this->assertInternalType('string', $response);

        $this->assertContains('https://josantonius.com', $response);
    }

    /**
     * Tested method: $_PUT('?')->asUrl()
     */
    public function testNonExistentKeyAsUrlFromPutRequest()
    {
        $response = $this->request()['response'];

        $this->assertNull($response);
    }

    /**
     * Tested method: $_PUT('?')->asUrl('https://josantonius.com')
     */
    public function testNonExistentKeyAsUrlFromPutRequestAndReturnDefaultParam()
    {
        $response = $this->request()['response'];

        $this->assertSame('https://josantonius.com', $response);
    }

    /**
     * Tested method: $_PUT('foo')->asEmail()
     */
    public function testGetStringValueAsEmailFromPutRequest()
    {
        $params = ['foo' => 'hello@josantonius.com'];

        $response = $this->request('application/json', $params)['response'];

        $this->assertInternalType('string', $response);

        $this->assertContains('hello@josantonius.com', $response);
    }

    /**
     * Tested method: $_PUT('?')->asEmail()
     */
    public function testNonExistentKeyAsEmailFromPutRequest()
    {
        $response = $this->request()['response'];

        $this->assertNull($response);
    }

    /**
     * Tested method: $_PUT('?')->asEmail('hello@josantonius.com')
     */
    public function testNonExistentKeyAsEmailFromPutRequestAndReturnDefaultParam()
    {
        $response = $this->request()['response'];

        $this->assertSame('hello@josantonius.com', $response);
    }
}
