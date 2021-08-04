<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeTitlesearch;
use App\Models\Titlesearch;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use PDF;

class TitlesearchController extends Controller
{
    public function index()
    {
        return view('titlesearch.index');
    }

    public function search(Request $request)
    {
        //validating the input data
        if ($request->lastname) {
            $validatedName = $request->validate([
                'lastname' => 'required|string|max:255',
                'firstname' => 'required|string|max:255',
                'middlename' => 'required|string|max:255',
            ]);

            if ($validatedName) {
                try {
                    $lastname = $request->lastname;
                    $firstname = $request->firstname;
                    $middlename = $request->middlename;

                    $searchName = $lastname . ',' . $firstname . '%20' . $middlename;

                    $response = Http::get('https://xeraphys.herokuapp.com/name/' . $searchName)->json();
                } catch (\Exception $exception) {
                    return redirect()->route('title.search')->with('error', 'Invalid data or check your network connection');
                }

                //saving in database
                if (!$response) {

                    $request->session()->flash('error', 'Invalid input');
                    return redirect()->back();
                } else {
                    $data = array(
                        'lastname' => $request->lastname,
                        'firstname' => $request->firstname,
                        'middlename' => $request->middlename,
                    );
                    Titlesearch::updateOrCreate($data);

                    //attaching to the pivot table
                    $user = Auth::user();
                    $titleSearch = Titlesearch::where([
                        ['lastname', $lastname],
                        ['firstname', $firstname],
                        ['middlename', $middlename],
                    ])->first();

                    // dd($user->titleSearches);
                    $user->titleSearches()->attach($titleSearch->id);

                    //attaching to employee Pivot
                    if ($user->role == 5) {
                        $employee = Employee::where('email', $user->email)->first();

                        EmployeeTitlesearch::create([
                            'employee_id' => $employee->id,
                            'titlesearch_id' => $titleSearch->id,
                        ]);
                    }
                }
                $request->session()->put('response', $response); // Store it as flash data.
                return redirect()->route('title.response');
            }
        } elseif ($request->parcel_id) {
            $validatedParcelId = $request->validate([
                'parcel_id' => 'required|string|max:255',
            ]);

            if ($validatedParcelId) {
                try {
                    $parcel_id = $request->parcel_id;

                    $response = Http::get('https://parcel-id.herokuapp.com/parcelnumber/' . $parcel_id)->json();
                } catch (\Exception $exception) {
                    return redirect()->route('title.search')->with('error', 'Invalid data or check your network connection');
                }

                //saving in database
                if (!$response) {

                    $request->session()->flash('error', 'Invalid input');
                    return redirect()->back();
                } else {
                    $data = array(
                        'parcel_id' => $request->parcel_id,
                    );
                    Titlesearch::updateOrCreate($data);

                    //attaching to the pivot table
                    $user = Auth::user();
                    $titleSearch = Titlesearch::where([
                        ['parcel_id', $parcel_id],
                    ])->first();

                    $user->titleSearches()->attach($titleSearch->id);
                }
                $request->session()->put('response', $response); // Store it as flash data.
                return redirect()->route('title.response');
            }
        }
    }

    public function showResponse(Request $request)
    {
        if ($request->session()->has('response')) {
            $responses = $request->session()->get('response');

            // dd($responses);
            return view('titlesearch.response', ['responses' => $responses]);
        } else {

            return redirect()->route('title.search')->with('error', 'Invalid data, check and try again');
        }
    }

    public function exportPDF(Request $request)
    {
        if ($request->session()->has('response')) {
            $responses = $request->session()->get('response');
        } else {

            return redirect()->route('titlesearch.index')->with('error', 'Invalid data, check and try again');
        }

        $pdf = PDF::loadview('titlesearch.pdf', ['responses' => $responses]);
        return $pdf->download('Plutus.ai-titlesearch.pdf');
    }
}
