<?php

namespace App\Http\Controllers;

use App\Contracts\UserServiceable;
use App\Http\Requests\ChildStoreRequest;
use App\Http\Requests\ChildUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;

class UserChildController extends Controller
{
    /**
     * @var UserServiceable
     */
    protected $service;

    /**
     * @var \App\Entities\UserEntity
     */
    protected $user;

    /**
     * @param Route $route
     * @param UserServiceable $service
     */
    public function __construct(Route $route, UserServiceable $service)
    {
        $this->service = $service;

        $this->user = $this->service->find($route->getParameter('user'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->service->getChildren());
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
     * @param ChildStoreRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChildStoreRequest $request)
    {
        $this->service->addChild($request->all());

        return response()->json($this->service->getChildEntity());
    }

    /**
     * Display the specified resource.
     *
     * @param Route $route
     * @return \Illuminate\Http\Response
     */
    public function show(Route $route)
    {
        $id = $route->getParameter('child');

        return response()->json($this->service->getChild($id));
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
     *
     * @param ChildUpdateRequest $request
     * @param Route $route
     * @return \Illuminate\Http\Response
     */
    public function update(ChildUpdateRequest $request, Route $route)
    {
        $id = $route->getParameter('child');

        // find to child data.
        $child = $this->service->getChild($id);

        // to set input.
        $child->fill($request->all())->save();

        return response()->json($child);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Route $route
     * @return \Illuminate\Http\Response
     */
    public function destroy(Route $route)
    {
        $id = $route->getParameter('child');

        // find to user data.
        $child = $this->service->getChild($id);

        // execute deleting.
        $this->service->deleteChild($child->getModel()->id);

        return response()->json($child);
    }
}
