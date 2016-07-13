<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;

class UserController extends Controller
{
    public function index() {
        $users = User::paginate(10);

        return view("user/index", ["users" => $users]);
    }

    public function create(Request $request) {
        return view("user/create", ['request' => $request]);
    }

    public function store(Request $request) {
        $rules = [
            "firstname" => "required|alpha",
            "lastname" => "required|alpha",
            "email" => "required|email|unique:user"
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::to("users/create")
                ->withErrors($validator)
                ->withInput();
        } else {
            $user = new User();
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->email = $request->email;
            $user->save();

            Session::flash("message", "Successfully created user");

            return Redirect::to('users');
        }
    }

    public function show($id) {
        $user = User::find($id);
        $books = $user->books();
        return view("user/show", ['books' => $books->get(), 'user' => $user]);
    }

    public function edit($id) {
        $user = User::find($id);
        return view("user/edit", ['user' => $user]);
    }

    public function update(Request $request, $id) {
        $rules = [
            "firstname" => "required|alpha",
            "lastname" => "required|alpha",
            "email" => "required|email"
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::to("users/{$id}/edit")
                ->withErrors($validator);
        } else {
            $user = User::find($id);
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->email = $request->email;
            $user->save();
            Session::flash("message", "Successfully updated user");

            return Redirect::to('users');
        }
    }

    public function destroy($id) {
        $user = User::find($id);
        $user->delete();
        Session::flash("message", "Successfully deleted user");
        return Redirect::to('users');
    }
}
