<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Titlesearch;
use App\Models\TitlesearchUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $userDataHighChart = User::select(DB::raw("COUNT(*) as count"))
            ->whereYear("created_at", date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');

        $userDataPieChart = DB::table('users')
            ->select(
                DB::raw('role as role'),
                DB::raw('COUNT(*) as number')
            )
            ->groupBy('role')
            ->get();

        $array[] = ['Role', 'Number'];
        foreach ($userDataPieChart as $key => $value) {
            $array[++$key] = [$value->role, $value->number];
        }

        return view('dashboards.admin.index', compact('userDataHighChart'))->with('role', json_encode($array));
    }

    public function showEnterpriseUsers()
    {
        $enterpriseUsers = User::where('role', 2)->latest()->paginate(10);

        return view('dashboards.admin.enterpriseUsers', ['enterpriseUsers' => $enterpriseUsers]);
    }

    //for employees
    // public function viewEmployee(Employee $employee)
    // {
    //     $employeee = Employee::where('id', $employee->id)->with('user')->first();
    //     // dd($employeee);
    //     return view('dashboards.admin.viewEmployee', compact('employee'));
    // }

    public function viewUser(User $user)
    {
        return view('dashboards.admin.viewUser', compact('user'));
    }

    public function showStarterUsers()
    {
        $starterUsers = User::where('role', 4)->latest()->paginate(10);
        return view('dashboards.admin.starterUsers', ['starterUsers' => $starterUsers]);
    }

    public function showEmployeeUsers()
    {
        $employees = Employee::with('enterpriseUser')->paginate(10);


        return view('dashboards.admin.employeeUsers', ['employees' => $employees]);
    }

    public function showFreelancerUsers()
    {
        $freelancerUsers = User::where('role', 3)->latest()->paginate(10);
        return view('dashboards.admin.freelancerUsers', ['freelancerUsers' => $freelancerUsers]);
    }

    public function deleteUser(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'User Successfully Deleted ');
    }

    public function usersTableQuery(Request $request)
    {
        if (isset($_GET['query'])) {
            $searchText = $_GET['query'];

            $users = User::where('name', 'LIKE', '%' . $searchText . '%')
                ->orwhere('lastname', 'LIKE', '%' . $searchText . '%')
                ->orwhere('email', 'LIKE', '%' . $searchText . '%')
                ->paginate(10);

            if ($users->isEmpty()) {
                return redirect()->back()->with('error', 'No user found');
            } else {
                return view('dashboards.admin.querySearch', ['users' => $users]);
            }
        } else {
            return redirect()->back();
        }
    }

    public function subscriptions()
    {
        // $stripe = new \Stripe\StripeClient(
        //     'sk_test_51J0tovL3QWWj2S9pDEVLcWavz5CLRBiigkOE73g2zx6pmntOlRBYp7VSsj52Fmmj8kfR9mlDgOGCsD8hdV2IuH5I00spyTKrbh'
        // );
        // dd($stripe->subscriptions->all());
        return view('dashboards.admin.subscriptions');
    }

    public function searches()
    {
        $searches = Titlesearch::with('users')->paginate(10);
        // dd($searches->users[0]->pivot);

        return view('dashboards.admin.searches', ['searches' => $searches]);
    }
    public function plans()
    {
        return view('dashboards.admin.plans');
    }
    public function counties()
    {
        return view('dashboards.admin.counties');
    }
    public function feedbacks()
    {
        return view('dashboards.admin.feedbacks');
    }
}
