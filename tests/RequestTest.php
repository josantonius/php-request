<?php
/**
 * PHP library for handling requests.
 *
 * @author    Josantonius <hello@josantonius.com>
 * @copyright 2017 (c) Josantonius - PHP-Request
 * @license   https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link      https://github.com/Josantonius/PHP-Request
 * @since     1.1.3
 */
namespace Josantonius\Request\Test;

use Josantonius\Request\Request;
use PHPUnit\Framework\TestCase;

/**
 * Tests class for Request library.
 *
 * @since 1.1.3
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
        $actual = $this->Request;
        $this->assertInstanceOf('Josantonius\Request\Request', $actual);
    }

    /**
     * Access to all GET parameters.
     *
     * @since 1.1.3
     */
    public function testGet()
    {
        $_GET = ['test' => 'value', 'test-2' => 1];

        $this->assertInternalType('array', $this->Request->get());
    }

    /**
     * Access to GET specific key parameter.
     *
     * @since 1.1.3
     */
    public function testGetSpecificKey()
    {
        $this->assertContains('value', $this->Request->get('test'));
    }

    /**
     * Access to GET specific key parameter when not exists.
     *
     * @since 1.1.3
     */
    public function testGetSpecificKeyError()
    {
        unset($_GET);

        $this->assertNull($this->Request->get('?'));
    }

    /**
     * Access to all GET parameters when not exists.
     *
     * @since 1.1.3
     */
    public function testGetError()
    {
        $this->assertNull($this->Request->get());
    }

    /**
     * Access to all POST parameters.
     *
     * @since 1.1.3
     */
    public function testPost()
    {
        $_POST = ['test' => 'value', 'test-2' => 1];

        $this->assertInternalType('array', $this->Request->post());
    }

    /**
     * Access to POST specific key parameter.
     *
     * @since 1.1.3
     */
    public function testPostSpecificKey()
    {
        $this->assertContains('value', $this->Request->post('test'));
    }

    /**
     * Access to POST specific key parameter when not exists.
     *
     * @since 1.1.3
     */
    public function testPostSpecificKeyError()
    {
        unset($_POST);

        $this->assertNull($this->Request->post('?'));
    }

    /**
     * Access to all POST parameters when not exists.
     *
     * @since 1.1.3
     */
    public function testPostError()
    {
        $this->assertNull($this->Request->post());
    }

    /**
     * Access to all FILES parameters.
     *
     * @since 1.1.3
     */
    public function testFiles()
    {
        $_FILES = ['test' => 'value', 'test-2' => 1];

        $this->assertInternalType('array', $this->Request->files());
    }

    /**
     * Access to FILES specific key parameter.
     *
     * @since 1.1.3
     */
    public function testFilesSpecificKey()
    {
        $this->assertContains('value', $this->Request->files('test'));
    }

    /**
     * Access to FILES specific key parameter when not exists.
     *
     * @since 1.1.3
     */
    public function testFilesSpecificKeyError()
    {
        unset($_FILES);

        $this->assertNull($this->Request->files('?'));
    }

    /**
     * Access to all FILES parameters when not exists.
     *
     * @since 1.1.3
     */
    public function testFilesError()
    {
        $this->assertNull($this->Request->files());
    }

    /**
     * Access to PUT specific key parameter when not exists.
     *
     * @since 1.1.3
     */
    public function testPutSpecificKeyError()
    {
        $this->assertNull($this->Request->put('?'));
    }

    /**
     * Access to all PUT parameters when not exists.
     *
     * @since 1.1.3
     */
    public function testPutError()
    {
        $this->assertCount(0, $this->Request->put());
    }

    /**
     * Access to DEL specific key parameter when not exists.
     *
     * @since 1.1.3
     */
    public function testDelSpecificKeyError()
    {
        $this->assertNull($this->Request->del('?'));
    }

    /**
     * Check if it is a GET request.
     *
     * @since 1.1.3
     */
    public function testIsGet()
    {
        $this->assertFalse($this->Request->isGet());
    }

    /**
     * Check if it is a POST request.
     *
     * @since 1.1.3
     */
    public function testIsPost()
    {
        $this->assertTrue($this->Request->isPost());
    }

    /**
     * Check if it is a PUT request.
     *
     * @since 1.1.3
     */
    public function testIsPut()
    {
        $this->assertFalse($this->Request->isPut());
    }

    /**
     * Check if it is a DELETE request.
     *
     * @since 1.1.3
     */
    public function testIsDelete()
    {
        $this->assertFalse($this->Request->isDelete());
    }

    /**
     * Check if it isn't a DELETE request.
     *
     * @since 1.1.3
     */
    public function testIsNotDelete()
    {
        $this->assertFalse($this->Request->isDelete());
    }

    /**
     * Check if it is a Ajax request.
     *
     * @since 1.1.3
     */
    public function testIsAjax()
    {
        $this->assertTrue($this->Request->isAjax());
    }
}
