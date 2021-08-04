<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Titlesearch;
use App\Models\TitlesearchUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Laravel\Cashier\Subscription;

class EnterpriseUserController extends Controller
{
    public function index()
    {
        return view('dashboards.enterprise.index');
    }

    public function billing()
    {
        $stripe = new \Stripe\StripeClient(
            'sk_test_51J0tovL3QWWj2S9pDEVLcWavz5CLRBiigkOE73g2zx6pmntOlRBYp7VSsj52Fmmj8kfR9mlDgOGCsD8hdV2IuH5I00spyTKrbh'
        );

        $plans = $stripe->plans;

        $user = User::find(Auth::user()->id);

        $subscriptions = Subscription::where('user_id', Auth::user()->id)->paginate(10);
        return view('dashboards.enterprise.billing', ['users' => $user, 'subscriptions' => $subscriptions, 'plans' => $plans]);
    }

    public function employees()
    {
        $enterpriseId = Auth::id();
        $employees = Employee::where('enterprise_id', $enterpriseId)->latest()->paginate(10);


        // dd($employees);
        return view('dashboards.enterprise.employee.index', ['employees' => $employees]);
    }

    public function deleteEmployee(Employee $employee)
    {
        // dd($employee);
        if ($employee) {
            DB::table('users')->where('id', $employee->user_id)->delete();
            $employee->delete();

            return redirect()->route('enterprise.employees')
                ->with('success', 'Employee Deleted Successfully');
        }
    }

    public function searches()
    {

        $enterpriseUser = Auth::user();
        $employees = Employee::where('enterprise_id', $enterpriseUser->id)->with('titleSearches')->latest()->paginate(5);
        $titleSearches = Titlesearch::with('users')->paginate(5);

        return view('dashboards.enterprise.searches', ['titleSearches' => $titleSearches, 'employees' => $employees]);
    }

    public function settings()
    {
        return view('dashboards.enterprise.settings');
    }
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
                        return redirect()->back();
                    } else {
                        $request->session()->flash('error', 'new password can not be the old password!');
                        return redirect()->back();
                    }
                } else {
                    $request->session()->flash('error', 'New Password and Confirm New Password do not match');
                    return redirect()->back();
                }
            } else {
                $request->session()->flash('error', 'The password does not match your current password');
                return redirect()->back();
            }
        }
    }

    public function uploadAvatar(Request $request)
    {
        $user = User::find(Auth::user()->id);

        //checking the file
        if ($request->hasFile('avatar')) {

            //getting the original name
            $filename = $request->avatar->getClientOriginalName();

            //deleting previous image from storage
            if ($user->avatar) {
                Storage::delete($user->avatar);
            }

            //storing the file
            $request->avatar->storeAs('user-images', $filename, 'public');

            //updating the database
            $user->update(['avatar' => $filename]);
            $request->session()->flash('success', 'Your avatar has been uploaded');
            return redirect()->back();
        }
    }
}
