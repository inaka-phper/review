<?php
namespace Test\Services;

use App\Services\UserService;
use Mockery as m;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-09-27 at 08:32:31.
 */
class UserServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var User
     */
    protected $object;

    /**
     * @var UserEntityable(mock)
     */
    protected $mock;

    /**
     * @var array User's columns
     */
    protected $value = [
        'id' => 1,
        'name' => 'phpunit',
        'email' => 'inaka.phper+phpunit@gmail.com',
        'password' => 'secret',
        'remember_token' => null,
    ];

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->mock = m::mock('UserEntityable', 'App\Contracts\UserEntityable');
        $this->object = new UserService($this->mock);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        m::close();
    }

    /**
     * @covers App\Services\User::addUser
     */
    public function testAddUser()
    {
        $this->mock
            ->shouldReceive('create')->andReturn(m::self());

        $this->assertInstanceOf('App\Contracts\UserEntityable', $this->object->addUser($this->value));
    }

    /**
     * @covers App\Services\User::addUsers
     */
    public function testAddUsers()
    {
        $this->mock
            ->shouldReceive('create')->andReturn(m::self());

        $this->assertTrue($this->object->addUsers([$this->value, $this->value]));
    }

    /**
     * @covers App\Services\User::find
     */
    public function testFind()
    {
        $this->mock->shouldReceive('find')->andReturn(m::self());

        $this->assertInstanceOf('App\Contracts\UserEntityable', $this->object->find(1));
    }

    /**
     * @covers App\Services\User::all
     */
    public function testAll()
    {
        $collection = m::mock('Collection');
        $this->mock->shouldReceive('all')->andReturn($collection);

        $this->assertInstanceOf('Collection', $this->object->all());
    }

    /**
     * @covers App\Services\User::paginate
     */
    public function testPaginate()
    {
        $collection = m::mock('Paginator');
        $this->mock->shouldReceive('paginate')->andReturn($collection);

        $this->assertInstanceOf('Paginator', $this->object->paginate());
    }
}