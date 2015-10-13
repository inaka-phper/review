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
    protected $user;

    /**
     * @var ChildEntityable(mock)
     */
    protected $child;

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
        $this->user = m::mock('UserEntityable', 'App\Contracts\UserEntityable');
        $this->child = m::mock('ChildEntityable', 'App\Contracts\ChildEntityable');

        $this->object = new UserService($this->user, $this->child);
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
     * @covers App\Services\User::getEntity
     */
    public function testGetEntity()
    {
        $this->assertInstanceOf('App\Contracts\UserEntityable', $this->object->getEntity());
    }

    /**
     * @covers App\Services\User::addUser
     */
    public function testAddUser()
    {
        $this->user
            ->shouldReceive('create')->andReturn($this->user);

        $this->assertInstanceOf('App\Contracts\UserEntityable', $this->object->addUser($this->value));
    }

    /**
     * @covers App\Services\User::addUsers
     */
    public function testAddUsers()
    {
        $this->user
            ->shouldReceive('create')->andReturn(true);

        $this->assertTrue($this->object->addUsers([$this->value, $this->value]));
    }

    /**
     * @covers App\Services\User::addChild
     */
    public function testAddChild()
    {
        $this->child
            ->shouldReceive('create')->andReturn($this->child);

        $this->assertInstanceOf('App\Contracts\ChildEntityable', $this->object->addChild($this->value));
    }

    /**
     * @covers App\Services\User::addUsers
     */
    public function testDeleteChild()
    {
        $this->child
            ->shouldReceive('destroy')->andReturn(true);

        $this->assertTrue($this->object->deleteChild(1));
    }

    /**
     * @covers App\Services\User::find
     */
    public function testFind()
    {
        $this->user->shouldReceive('find')->andReturn($this->user);

        $this->assertInstanceOf('App\Contracts\UserEntityable', $this->object->find(1));
    }

    /**
     * @covers App\Services\User::all
     */
    public function testAll()
    {
        $collection = m::mock('Collection');
        $this->user->shouldReceive('all')->andReturn($collection);

        $this->assertInstanceOf('Collection', $this->object->all());
    }

    /**
     * @covers App\Services\User::paginate
     */
    public function testPaginate()
    {
        $collection = m::mock('Paginator');
        $this->user->shouldReceive('paginate')->andReturn($collection);

        $this->assertInstanceOf('Paginator', $this->object->paginate());
    }

    /**
     * @covers App\Services\User::getChild
     */
    public function testGetChild()
    {
        $collection = m::mock('Collection');
        $collection->shouldReceive('first')->andReturn($this->child);
        $this->user->shouldReceive('children')->andReturn($collection);

        $this->assertInstanceOf('App\Contracts\ChildEntityable', $this->object->getChild(1));
    }

    /**
     * @covers App\Services\User::getChildren
     */
    public function testGetChildren()
    {
        $collection = m::mock('Collection');
        $this->user->shouldReceive('children')->andReturn($collection);

        $this->assertInstanceOf('Collection', $this->object->getChildren());
    }
}
