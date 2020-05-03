<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;

class MyBenchAccountController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function addRecipe($id) {
        if(Auth::check()) {
            DB::table('users_data')->insertOrIgnore([
                ['recipe_id' => $id, 'user_id' => Auth::user()->id],
            ]);
        }
    }

    public function removeRecipe($id) {
        if(Auth::check()) {
            DB::table('users_data')
                ->where('recipe_id', '=', $id)
                ->where('user_id', '=', Auth::user()->id)
                ->delete();
        }
    }

    public function hideUnlocked($val) {
        if(Auth::check()) {
            DB::table('users')
                ->where('id', '=', Auth::user()->id)
                ->update(['unlocked_hidden' => $val]);
        }
        return back();
    }

    public function deleteAccount() {
        if(Auth::check()) {
            DB::table('users')
                ->where('id', '=', Auth::user()->id)
                ->delete();
        }
        return redirect("/");
    }
}
