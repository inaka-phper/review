<?php
/**
 * Created by PhpStorm.
 * User: phper
 * Date: 2015/11/07
 * Time: 2:39
 */

namespace Tests\bdd;


use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use TestCase;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * test user data.
     * @var array
     */
    private $data = [
        'id' => null,
        'name' => 'bdd',
        'email' => 'inaka.phper+test02@gmail.com',
        'password' => 'password'
    ];

    /**
     * test for create user.
     */
    public function testAddUser()
    {
        $this->post('/user', $this->data)
            ->seeJson([
                'id' => 1,
                'name' => $this->data['name'],
            ]);
    }

    /**
     *test for get user.
     */
    public function testGetUser()
    {
        factory(User::class)->make($this->data)->save();
        $this->get('/user/1')
            ->seeJsonEquals([
                'id' => 1,
                'name' => 'bdd',
            ]);
    }

    /**
     * test for update user.
     */
    public function testUpdateUser()
    {
        factory(User::class)->make($this->data)->save();
        $this->put('/user/1', ['name' => 'update']);
        $this->get('/user/1')
            ->seeJsonEquals([
                'id' => 1,
                'name' => 'update',
            ]);
    }

    /**
     * test for delete user.
     */
    public function testDeleteUser()
    {
        factory(User::class)->make($this->data)->save();
        $this->delete('/user/1');

        $response = $this->call('GET', '/user/1');
        $this->assertEquals(404, $response->status());
    }
}
