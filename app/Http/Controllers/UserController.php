<?php

namespace App\Http\Controllers;

use App\Services\ImageService;
use App\SocialLink;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        return view('users.users', ['users' => User::all(), 'socials' => SocialLink::getSocials()]);
    }

    public function showCreateForm()
    {
        if (!User::canEdit()) {
            return abort(404);
        }

        return view('users/user-add', [
            'statuses' => User::getStatuses(),
            'socials' => SocialLink::getSocials()
        ]);
    }

    public function store(Request $request)
    {
        if (!$this->canEdit()) {
            return abort(404);
        }

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'email|required|unique:users',
            'password' => 'required'
        ]);

        $data = $request->all();

        $data['password'] = Hash::make($data['password']);

        if (isset($data['image'])) {
            $data['image'] = ImageService::uploadImage($data['image'], 'users');
        }

        $user = new User();
        $user->fill($data);

        $user->save();

        return redirect(route('users'))->with('message', __('User was added'));
    }

    public function editForm($id, $template = null)
    {
        if (!$this->canEdit($id)) {
            return abort(404);
        }

        $user = User::findOrFail($id);

        return view('users/edit', [
            'user' => $user,
            'statuses' => User::getStatuses(),
            'socials' => SocialLink::getSocials(),
            'template' => $template
        ]);
    }

    public function update(Request $request, $id)
    {
        if (!$this->canEdit($id)) {
            return abort(404);
        }

        $data = $request->all();
        /* Костыль для сохранения по частям */
        if (!isset($data['password'])) {
            $data['password'] = '';
        }

        if (!$data['password']) {
            unset($data['password']);
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        if (isset($data['image'])) {
            $data['image'] = ImageService::uploadImage($data['image'], 'users');
        }

        $user = User::findOrFail($id);

        $user->fill($data);
        $user->save();

        return redirect(route('user.view', ['id' => $id]))->with('message', __('User was updated'));
    }

    public function show($id)
    {
        return view('users.show', ['user' => User::findOrFail($id), 'socials' => SocialLink::getSocials()]);
    }

    public function destroy($id)
    {
        if (!$this->canEdit($id)) {
            return abort(404);
        }

        $user = User::find($id);

        if (!empty($user)) {
            $user->delete();
            return redirect(route('users'))->with('message', __('User was deleted'));
        } else {
            return redirect(route('users'))->withErrors(['message' => __('User not found. Please check it.')]);
        }
    }

    public function canEdit($id = 0){
        return User::canEdit() || Auth::id() == $id;
    }
}
