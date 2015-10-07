<?php

namespace App\Http\Controllers;

use App\Contracts\UserServiceable;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;

class UserController extends Controller
{
    /**
     * @var UserServiceable
     */
    protected $user;

    public function __construct(UserServiceable $user)
    {
        $this->user = $user;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->user->paginate());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $this->user->addUser($request->all());

        return response()->json($this->user->getEntity());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json($this->user->find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param UserUpdateRequest $request
     * @param Route $route
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UserUpdateRequest $request, Route $route)
    {
        $id = $route->getParameter('user');

        // find to user data.
        $user = $this->user->find($id);

        // to set input.
        $user->fill($request->all())->save();

        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Route $route
     * @return \Illuminate\Http\Response
     */
    public function destroy(Route $route)
    {
        $id = $route->getParameter('user');

        // find to user data.
        $user = $this->user->find($id);

        // execute deleting.
        $user->delete();

        return response()->json($user);
    }
}
