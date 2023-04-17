<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;

class UserTransactionController extends Controller
{
    public function index(Request $request)
    {
        $transactions = Transaction::whereRaw(1)
                ->where('tst_user_id', \Auth::id());

        if ($request->id) $transactions->where('id', $request->id);
        if ($emails = $request->email) {
            $transactions->where('tst_email', 'like', '%'.$emails.'%');
        }

        if ($type = $request->type) {
            if ($type == 1)
            {
                $transactions->where('tst_user_id', '<>', 0);
            } else
            {
                $transactions->where('tst_user_id', 0);
            }
        }
        if ($status = $request->status) {
            $transactions->where('tst_status', $status);
        }

        $transactions = $transactions->orderByDesc('id')
                            ->paginate(10);
        $viewData = [
            'transactions' => $transactions,
            'query'        => $request->query()
        ];

        return view('user.transaction', $viewData);
    }
}
