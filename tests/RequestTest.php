<?php
/**
 * PHP library for handling requests.
 *
 * @author    Josantonius <hello@josantonius.com>
 * @copyright 2017 - 2018 (c) Josantonius - PHP-Request
 * @license   https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link      https://github.com/Josantonius/PHP-Request
 * @since     1.1.3
 */
namespace Josantonius\Request\Test;

use Josantonius\Request\Request;
use PHPUnit\Framework\TestCase;

/**
 * Tests class for Request library.
 */
class RequestTest extends TestCase
{
    /**
     * Request instance.
     *
     * @since 1.1.5
     *
     * @var object
     */
    protected $Request;

    /**
     * Set up.
     *
     * @since 1.1.5
     */
    public function setUp()
    {
        parent::setUp();

        $this->Request = new Request;
    }

    /**
     * Check if it is an instance of Request.
     *
     * @since 1.1.5
     */
    public function testIsInstanceOfRequest()
    {
        $this->assertInstanceOf('Josantonius\Request\Request', $this->Request);
    }

    /**
     * Access to all GET parameters.
     */
    public function testGet()
    {
        $request = $this->Request;
        $_GET = ['test' => 'value', 'test-2' => 1];

        $this->assertInternalType('array', $request::get());
    }

    /**
     * Access to GET specific key parameter.
     */
    public function testGetSpecificKey()
    {
        $request = $this->Request;

        $this->assertContains('value', $request::get('test'));
    }

    /**
     * Access to GET specific key parameter when not exists.
     */
    public function testGetSpecificKeyError()
    {
        $request = $this->Request;
        unset($_GET);

        $this->assertNull($request::get('?'));
    }

    /**
     * Access to all GET parameters when not exists.
     */
    public function testGetError()
    {
        $request = $this->Request;

        $this->assertNull($request::get());
    }

    /**
     * Access to all POST parameters.
     */
    public function testPost()
    {
        $_POST = ['test' => 'value', 'test-2' => 1];
        $request = $this->Request;

        $this->assertInternalType('array', $request::post());
    }

    /**
     * Access to POST specific key parameter.
     */
    public function testPostSpecificKey()
    {
        $request = $this->Request;

        $this->assertContains('value', $request::post('test'));
    }

    /**
     * Access to POST specific key parameter when not exists.
     */
    public function testPostSpecificKeyError()
    {
        $request = $this->Request;
        unset($_POST);

        $this->assertNull($request::post('?'));
    }

    /**
     * Access to all POST parameters when not exists.
     */
    public function testPostError()
    {
        $request = $this->Request;

        $this->assertNull($request::post());
    }

    /**
     * Access to all FILES parameters.
     */
    public function testFiles()
    {
        $request = $this->Request;
        $_FILES = ['test' => 'value', 'test-2' => 1];

        $this->assertInternalType('array', $request::files());
    }

    /**
     * Access to FILES specific key parameter.
     */
    public function testFilesSpecificKey()
    {
        $request = $this->Request;

        $this->assertContains('value', $request::files('test'));
    }

    /**
     * Access to FILES specific key parameter when not exists.
     */
    public function testFilesSpecificKeyError()
    {
        $request = $this->Request;
        unset($_FILES);

        $this->assertNull($request::files('?'));
    }

    /**
     * Access to all FILES parameters when not exists.
     */
    public function testFilesError()
    {
        $request = $this->Request;

        $this->assertNull($request::files());
    }

    /**
     * Access to PUT specific key parameter when not exists.
     */
    public function testPutSpecificKeyError()
    {
        $request = $this->Request;

        $this->assertNull($request::put('?'));
    }

    /**
     * Access to all PUT parameters when not exists.
     */
    public function testPutError()
    {
        $request = $this->Request;

        $this->assertCount(0, $request::put());
    }

    /**
     * Access to DEL specific key parameter when not exists.
     */
    public function testDelSpecificKeyError()
    {
        $request = $this->Request;

        $this->assertNull($request::del('?'));
    }

    /**
     * Check if it is a GET request.
     */
    public function testIsGet()
    {
        $request = $this->Request;

        $this->assertFalse($request::isGet());
    }

    /**
     * Check if it is a POST request.
     */
    public function testIsPost()
    {
        $request = $this->Request;

        $this->assertTrue($request::isPost());
    }

    /**
     * Check if it is a PUT request.
     */
    public function testIsPut()
    {
        $request = $this->Request;

        $this->assertFalse($request::isPut());
    }

    /**
     * Check if it is a DELETE request.
     */
    public function testIsDelete()
    {
        $request = $this->Request;

        $this->assertFalse($request::isDelete());
    }

    /**
     * Check if it isn't a DELETE request.
     */
    public function testIsNotDelete()
    {
        $request = $this->Request;

        $this->assertFalse($request::isDelete());
    }

    /**
     * Check if it is a Ajax request.
     */
    public function testIsAjax()
    {
        $request = $this->Request;

        $this->assertTrue($request::isAjax());
    }
}
