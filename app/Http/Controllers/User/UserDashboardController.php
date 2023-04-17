<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;

class UserDashboardController extends Controller
{
    public function dashboard()
    {
        $id = \Auth::id();
        $totalTransaction = \DB::table('transactions')->select($id)->count();

        $transactionCancel = Transaction::where('tst_status', -1)->select($id)->count();

        $transactionShipping = Transaction::where('tst_status', 2)->select($id)->count();

        $transactionComplete = Transaction::where('tst_status', 3)->select($id)->count();

        $viewData = [
            'totalTransaction'    => $totalTransaction,
            'transactionCancel'   => $transactionCancel,
            'transactionShipping' => $transactionShipping,
            'transactionComplete' => $transactionComplete
        ];

        return view('user.dashboard', $viewData);
    }
}
