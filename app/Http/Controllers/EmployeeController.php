<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboards.enterprise.employee.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboards.enterprise.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedEmployee = $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'company_name' => ['required', 'string', 'max:255'],
            'role' => ['required'],
        ]);

        if (!$validatedEmployee) {
            $request->session()->flash('success', 'Ensure all the details are properly filled');
            return redirect()->route('enterprise.employees');
        } else {
            // $data = array(
            //     'name' => $request->name,
            //     'lastname' => $request->lastname,
            //     'email' => $request->email,
            //     'company_name' => $request->company_name,
            //     'user_id' => Auth::user()->id,
            //     'role' => $request->role,
            // );

            $userData = array(
                'name' => $request->name,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            );
            // Employee::updateOrCreate($data);
            $createEmployeeUser = User::updateOrCreate($userData);

            if ($createEmployeeUser) {
                $newUser = User::where('email', $request->email)->first();

                $data = array(
                    'name' => $request->name,
                    'lastname' => $request->lastname,
                    'email' => $request->email,
                    'company_name' => $request->company_name,
                    'user_id' => $newUser->id,
                    'enterprise_id' => Auth::user()->id,
                    'role' => $request->role,
                );
                Employee::updateOrCreate($data);
            }

            $request->session()->flash('success', 'Employee successfully created!');
            return redirect()->route('enterprise.employees');
        }
    }

    public function updatePassword(Request $request)
    {
        $validate = $request->validate([
            'old-password' => ['required', 'min:8'],
            'password' => ['required', 'min:8', 'required_with:password_confirmation'],
        ]);

        $user = User::find(Auth::user()->id);


        if ($user) {
            //if current password passed on doesn't matches old password in database
            if (Hash::check($request['old-password'], $user->password) && $validate) {

                //if password passed for updated matches password confirmation
                if ($request['password'] === $request['password_confirmation']) {

                    //if new password isn't the same as old password
                    if (!Hash::check($request['password'], $user->password)) {
                        $user->password = Hash::make($request['password']);

                        $user->save();

                        $request->session()->flash('success', 'The password has been updated');
                        return redirect()->route('employee.dashboard');
                    } else {
                        $request->session()->flash('error', 'new password can not be the old password!');
                        return redirect()->route('employee.dashboard');
                    }
                } else {
                    $request->session()->flash('error', 'New Password and Confirm Password do not match');
                    return redirect()->route('employee.dashboard');
                }
            } else {
                $request->session()->flash('error', 'The password does not match your current password');
                return redirect()->route('employee.dashboard');
            }
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if ($user) {
            // UPADTE PROFILE
            $validate = null;
            if (Auth::user()->email === $request['email']) {
                $validate = $request->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'lastname' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255'],
                    'phone_number' => ['required', 'string', 'max:20'],
                    'city' => ['required'],
                    'state_county' => ['required'],
                    'postcode' => ['required', 'string', 'max:10'],
                    'country' => ['required'],
                ]);
            } else {
                $validate = $request->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'lastname' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'phone_number' => ['required', 'string', 'max:20'],
                    'city' => ['required'],
                    'state_county' => ['required'],
                    'postcode' => ['required', 'integer', 'max:10'],
                    'country' => ['required'],
                ]);
            }
            if ($validate) {
                $user->name = $request['name'];
                $user->lastname = $request['lastname'];
                $user->email = $request['email'];
                $user->phone_number = $request['phone_number'];
                $user->city = $request['city'];
                $user->state_county = $request['state_county'];
                $user->postcode = $request['postcode'];
                $user->country = $request['country'];

                $user->save();

                $request->session()->flash('success', 'Your details have been successfully updated');
                return redirect()->back();
            } else {
                return redirect()->back();
            }
        }
    }

    public function uploadAvatar(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if ($request->hasFile('avatar')) {
            $filename = $request->avatar->getClientOriginalName();
            $request->avatar->storeAs('user-images', $filename, 'public');

            $user->update(['avatar' => $filename]);

            $request->session()->flash('success', 'Your avatar has been uploaded');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
