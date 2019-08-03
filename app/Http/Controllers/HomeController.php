<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FieldReport;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        $userId = $user->id;
        $allFieldReports = FieldReport::where('user_id', $userId)->get();
        return view('home', ['user' => $user, 'allFieldReports' => $allFieldReports]);
    }

    public function saveFieldReport(Request $request)
    {
        $fieldReport = new FieldReport();
        $fieldReport->title = $request->input('title');
        $fieldReport->content = $request->input('content');
        $fieldReport->user_id = auth()->user()->id;

        $fieldReport->save();

        return redirect('/home');
    }

    public function getFieldReport($id)
    {
        $fieldReport = FieldReport::find($id);

        if ($fieldReport) {
            return view('field-report', ['fieldReport' => $fieldReport]);
        } else {
            abort('404');
        }
    }
}
