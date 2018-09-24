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
class DeleteRequestTest extends TestCase
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
        $file = 'DeleteRequestProxy.php';
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
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        $response = json_decode(curl_exec($ch), $returnArray);
        curl_close($ch);

        return $response;
    }

    /**
     * Tested method: $_DELETE()->asArray()
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
     * Tested method: $_DELETE()->asArray()
     */
    public function testGetAllParamsAsArrayFromDeleteRequest()
    {
        $response = $this->request()['response'];

        $this->assertContains($response['method'], __FUNCTION__);
    }

    /**
     * Tested method: $_DELETE()->asArray(['method' => 'string'])
     */
    public function testGetAllParamsAsArrayFromDeleteRequestAndFilterEachValue()
    {
        $response = $this->request()['response'];

        $this->assertInternalType('array', $response);

        $this->assertContains($response['method'], __FUNCTION__);

        $this->assertNull($response['nonexistent_key']);
    }

    /**
     * Tested method: $_DELETE()->asObject()
     */
    public function testGetAllParamsAsObjectFromDeleteRequest()
    {
        $response = $this->request('application/json', [], false)->response;

        $this->assertInternalType('object', $response);

        $this->assertContains($response->method, __FUNCTION__);
    }

    /**
     * Tested method: $_DELETE()->asObject(['method' => 'string'])
     */
    public function testGetAllParamsAsObjectFromDeleteRequestAndFilterEachValue()
    {
        $response = $this->request('application/json', [], false)->response;

        $this->assertInternalType('object', $response);

        $this->assertContains($response->method, __FUNCTION__);

        $this->assertNull($response->nonexistent_key);
    }

    /**
     * Tested method: $_DELETE()->asJson()
     */
    public function testGetAllParamsAsJsonFromDeleteRequest()
    {
        $response = $this->request()['response'];

        $this->assertInternalType('string', $response);

        $this->assertContains('{"method":"testGetAllParamsAsJsonFromDeleteRequest"}', $response);
    }

    /**
     * Tested method: $_DELETE('foo')->asString()
     */
    public function testGetStringValueAsStringFromDeleteRequest()
    {
        $params = ['foo' => 'bar'];

        $response = $this->request('application/json', $params)['response'];

        $this->assertInternalType('string', $response);

        $this->assertContains('bar', $response);
    }

    /**
     * Tested method: $_DELETE('?')->asString()
     */
    public function testNonExistentKeyAsStringFromDeleteRequest()
    {
        $response = $this->request()['response'];

        $this->assertNull($response);
    }

    /**
     * Tested method: $_DELETE('?')->asString('default_param')
     */
    public function testNonExistentKeyAsStringFromDeleteRequestAndReturnDefaultParam()
    {
        $response = $this->request()['response'];

        $this->assertSame('default_param', $response);
    }

    /**
     * Tested method: $_DELETE('foo')->asInteger()
     */
    public function testGetStringValueAsIntegerFromDeleteRequest()
    {
        $params = ['foo' => 0];

        $response = $this->request('application/json', $params)['response'];

        $this->assertInternalType('int', $response);

        $this->assertSame(0, $response);
    }

    /**
     * Tested method: $_DELETE('?')->asInteger()
     */
    public function testNonExistentKeyAsIntegerFromDeleteRequest()
    {
        $response = $this->request()['response'];

        $this->assertNull($response);
    }

    /**
     * Tested method: $_DELETE('?')->asInteger(8)
     */
    public function testNonExistentKeyAsIntegerFromDeleteRequestAndReturnDefaultParam()
    {
        $response = $this->request()['response'];

        $this->assertSame(8, $response);
    }

    /**
     * Tested method: $_DELETE('foo')->asFloat()
     */
    public function testGetStringValueAsFloatFromDeleteRequest()
    {
        $params = ['foo' => 0.8];

        $response = $this->request('application/json', $params)['response'];

        $this->assertInternalType('float', $response);

        $this->assertSame(0.8, $response);
    }

    /**
     * Tested method: $_DELETE('?')->asFloat()
     */
    public function testNonExistentKeyAsFloatFromDeleteRequest()
    {
        $response = $this->request()['response'];

        $this->assertNull($response);
    }

    /**
     * Tested method: $_DELETE('?')->asFloat(0.8)
     */
    public function testNonExistentKeyAsFloatFromDeleteRequestAndReturnDefaultParam()
    {
        $response = $this->request()['response'];

        $this->assertSame(0.8, $response);
    }

    /**
     * Tested method: $_DELETE('foo')->asBoolean()
     */
    public function testGetStringBooleanTrueValueAsBooleanFromDeleteRequest()
    {
        $params = ['foo' => 'true'];

        $response = $this->request('application/json', $params)['response'];

        $this->assertInternalType('boolean', $response);

        $this->assertTrue($response);
    }

    /**
     * Tested method: $_DELETE('foo')->asBoolean()
     */
    public function testGetBooleanTrueValueAsBooleanFromDeleteRequest()
    {
        $params = ['foo' => true];

        $response = $this->request('application/json', $params)['response'];

        $this->assertInternalType('boolean', $response);

        $this->assertTrue($response);
    }

    /**
     * Tested method: $_DELETE('foo')->asBoolean()
     */
    public function testGetStringBooleanFalseValueAsBooleanFromDeleteRequest()
    {
        $params = ['foo' => 'false'];

        $response = $this->request('application/json', $params)['response'];

        $this->assertInternalType('boolean', $response);

        $this->assertFalse($response);
    }

    /**
     * Tested method: $_DELETE('foo')->asBoolean()
     */
    public function testGetBooleanFalseValueAsBooleanFromDeleteRequest()
    {
        $params = ['foo' => false];

        $response = $this->request('application/json', $params)['response'];

        $this->assertInternalType('boolean', $response);

        $this->assertFalse($response);
    }

    /**
     * Tested method: $_DELETE('foo')->asBoolean()
     */
    public function testGetStringIntegerTrueValueAsBooleanFromDeleteRequest()
    {
        $params = ['foo' => '1'];

        $response = $this->request('application/json', $params)['response'];

        $this->assertInternalType('boolean', $response);

        $this->assertTrue($response);
    }

    /**
     * Tested method: $_DELETE('foo')->asBoolean()
     */
    public function testGetIntegerTrueValueAsBooleanFromDeleteRequest()
    {
        $params = ['foo' => 1];

        $response = $this->request('application/json', $params)['response'];

        $this->assertInternalType('boolean', $response);

        $this->assertTrue($response);
    }

    /**
     * Tested method: $_DELETE('foo')->asBoolean()
     */
    public function testGetStringIntegerFalseValueAsBooleanFromDeleteRequest()
    {
        $params = ['foo' => '0'];

        $response = $this->request('application/json', $params)['response'];

        $this->assertInternalType('boolean', $response);

        $this->assertFalse($response);
    }

    /**
     * Tested method: $_DELETE('foo')->asBoolean()
     */
    public function testGetIntegerFalseValueAsBooleanFromDeleteRequest()
    {
        $params = ['foo' => 0];

        $response = $this->request('application/json', $params)['response'];

        $this->assertInternalType('boolean', $response);

        $this->assertFalse($response);
    }

    /**
     * Tested method: $_DELETE('?')->asBoolean()
     */
    public function testNonExistentKeyAsBooleanFromDeleteRequest()
    {
        $response = $this->request()['response'];

        $this->assertNull($response);
    }

    /**
     * Tested method: $_DELETE('?')->asBoolean(true)
     */
    public function testNonExistentKeyAsBooleanFromDeleteRequestAndReturnDefaultParam()
    {
        $response = $this->request()['response'];

        $this->assertTrue($response);
    }

    /**
     * Tested method: $_DELETE('foo')->asIp()
     */
    public function testGetStringValueAsIpFromDeleteRequest()
    {
        $params = ['foo' => '192.168.1.1'];

        $response = $this->request('application/json', $params)['response'];

        $this->assertInternalType('string', $response);

        $this->assertContains('192.168.1.1', $response);
    }

    /**
     * Tested method: $_DELETE('?')->asIp()
     */
    public function testNonExistentKeyAsIpFromDeleteRequest()
    {
        $response = $this->request()['response'];

        $this->assertNull($response);
    }

    /**
     * Tested method: $_DELETE('?')->asIp('192.168.1.1')
     */
    public function testNonExistentKeyAsIpFromDeleteRequestAndReturnDefaultParam()
    {
        $response = $this->request()['response'];

        $this->assertSame('192.168.1.1', $response);
    }

    /**
     * Tested method: $_DELETE('foo')->asUrl()
     */
    public function testGetStringValueAsUrlFromDeleteRequest()
    {
        $params = ['foo' => 'https://josantonius.com'];

        $response = $this->request('application/json', $params)['response'];

        $this->assertInternalType('string', $response);

        $this->assertContains('https://josantonius.com', $response);
    }

    /**
     * Tested method: $_DELETE('?')->asUrl()
     */
    public function testNonExistentKeyAsUrlFromDeleteRequest()
    {
        $response = $this->request()['response'];

        $this->assertNull($response);
    }

    /**
     * Tested method: $_DELETE('?')->asUrl('https://josantonius.com')
     */
    public function testNonExistentKeyAsUrlFromDeleteRequestAndReturnDefaultParam()
    {
        $response = $this->request()['response'];

        $this->assertSame('https://josantonius.com', $response);
    }

    /**
     * Tested method: $_DELETE('foo')->asEmail()
     */
    public function testGetStringValueAsEmailFromDeleteRequest()
    {
        $params = ['foo' => 'hello@josantonius.com'];

        $response = $this->request('application/json', $params)['response'];

        $this->assertInternalType('string', $response);

        $this->assertContains('hello@josantonius.com', $response);
    }

    /**
     * Tested method: $_DELETE('?')->asEmail()
     */
    public function testNonExistentKeyAsEmailFromDeleteRequest()
    {
        $response = $this->request()['response'];

        $this->assertNull($response);
    }

    /**
     * Tested method: $_DELETE('?')->asEmail('hello@josantonius.com')
     */
    public function testNonExistentKeyAsEmailFromDeleteRequestAndReturnDefaultParam()
    {
        $response = $this->request()['response'];

        $this->assertSame('hello@josantonius.com', $response);
    }
}
