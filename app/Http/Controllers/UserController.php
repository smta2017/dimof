<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends AppBaseController
{
    /** @var UserRepository $userRepository*/
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     */
    public function index(Request $request)
    {
        $users = $this->userRepository->paginate(10);

        return view('users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new User.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created User in storage.
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();

        $user = $this->userRepository->create($input);

        Session::flash('success','User saved successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Session::flash('error','User not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Session::flash('error','User not found');

            return redirect(route('users.index'));
        }

        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified User in storage.
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Session::flash('error','User not found');

            return redirect(route('users.index'));
        }

        $user = $this->userRepository->update($request->all(), $id);

        Session::flash('success','User updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Session::flash('error','User not found');

            return redirect(route('users.index'));
        }

        if($user->posts()->exists()){
            Session::flash('error','User Has posts');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Session::flash('success','User deleted successfully.');

        return redirect(route('users.index'));
    }
}
