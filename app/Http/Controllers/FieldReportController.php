<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FieldReport;

use Auth;
use App\Comment;



class FieldReportController extends Controller
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

        $user = Auth::user();

        $fieldReport = FieldReport::find($id);

        if ($fieldReport) {
            if ($user->id == $fieldReport->user_id) {
                $hasPermissions = true;
            } else {
                $hasPermissions = false;
            }

            return view('field-report', ['fieldReport' => $fieldReport, 'hasPermissions' => $hasPermissions]);
        } else {
            abort('404');
        }
    }

    public function deleteFieldReport($id)
    {
        $user = Auth::user();

        $fieldReport = FieldReport::find($id);

        if ($fieldReport) {
            if ($user->id == $fieldReport->user_id) {
                $fieldReport->delete();
                return redirect('home');
            } else {
                abort('404');
            }
        } else {
            abort('404');
        }
    }

    public function addCommentToFieldReport(Request $request, $id)
    {
        $user = Auth::user();

        $comment = new Comment;

        $comment->user_id = $user->id;
        $comment->field_report_id = $id;
        $comment->content = $request->input('content');

        return redirect("/field-report/$id");
    }
}
