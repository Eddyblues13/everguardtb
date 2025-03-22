<?php

namespace App\Http\Controllers\Admin;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserActivityController extends Controller
{
    public function index($id)
    {
        // Fetch activities for the specific user
        $activities = Activity::where('user_id', $id)->get();
        return view('admin.user_activity', compact('activities'));
    }

    public function userActivities($id)
    {
        // Fetch activities for the specific user
        $activities = Activity::where('user_id', $id)->get();
        return view('admin.user_activity', compact('activities'));
    }

    public function destroy($id)
    {
        // Fetch the transaction by ID
        $transaction = Activity::findOrFail($id);
        // Delete the transaction
        $transaction->delete();
        // Redirect back with success message
        return redirect()->back()->with('success', 'Transaction deleted successfully.');
    }
}
