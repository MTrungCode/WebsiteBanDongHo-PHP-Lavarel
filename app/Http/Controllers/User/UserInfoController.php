<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequestUpdateInfo;
use App\Models\User;

class UserInfoController extends Controller
{
    public function updateInfo()
    {
        return view('user.update_info');
    }
    public function SaveUpdateInfo(UserRequestUpdateInfo $request)
    {
        $data = $request->except('_token');
        $user = User::find(\Auth::id());
        $user->update($data);

        return redirect()->back();
    }
}
