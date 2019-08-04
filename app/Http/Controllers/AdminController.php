<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FieldReport;

use Auth;
use App\Comment;

class AdminController extends Controller
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

        $comments = Comment::all();
        $fieldReports = FieldReport::all();

        if ($user->id == 1 || $user->id == 2) {
            return view('admin.admin', ['comments' => $comments, 'fieldReports' => $fieldReports]);
        }

        abort('500');
    }

    public function approveFieldReport($id)
    {
        $user = auth()->user();

        if ($user->id == 1 || $user->id == 2) {

            $fieldReport = FieldReport::find($id);

            $fieldReport->approved = true;

            $fieldReport->save();

            return redirect('/admin');
        }

        abort('500');
    }
}
