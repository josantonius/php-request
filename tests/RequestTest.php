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
     * @since 2.0.0
     *
     * @var object
     */
    protected $Request;

    /**
     * Set up.
     *
     * @since 2.0.0
     */
    public function setUp()
    {
        $this->Request = new Request;

        parent::setUp();
    }

    /**
     * Check if it is a GET request.
     */
    public function testIsGet()
    {
        $request = $this->Request;

        $_SERVER['REQUEST_METHOD'] = 'GET';

        $this->assertTrue($request::isGet());
    }

    /**
     * Check if it is a POST request.
     */
    public function testIsPost()
    {
        $request = $this->Request;

        $_SERVER['REQUEST_METHOD'] = 'POST';

        $this->assertTrue($request::isPost());
    }

    /**
     * Check if it is a PUT request.
     */
    public function testIsPut()
    {
        $request = $this->Request;

        $_SERVER['REQUEST_METHOD'] = 'PUT';

        $this->assertTrue($request::isPut());
    }

    /**
     * Check if it is a DELETE request.
     */
    public function testIsDelete()
    {
        $request = $this->Request;

        $_SERVER['REQUEST_METHOD'] = 'DELETE';

        $this->assertTrue($request::isDelete());
    }
}
