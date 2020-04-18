<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Recipe;

class DefaultController extends Controller {
	public function index() {
		$recipes = Recipe::all();
		return view('index', compact('recipes'));
	}

	public function recipe($name) {
        $recipes = DB::table('recipe')->where('name','LIKE','%'.$name."%")->get();
        return view('index', compact('recipes'));
    }

    public function material($name) {
        $recipes = DB::table('recipe')->where('m1_id','LIKE','%'.$name."%")
                                      ->orWhere('m2_id','LIKE','%'.$name."%")
                                      ->orWhere('m3_id','LIKE','%'.$name."%")
                                      ->orWhere('m4_id','LIKE','%'.$name."%")
                                      ->orWhere('m5_id','LIKE','%'.$name."%")
                                      ->orWhere('m6_id','LIKE','%'.$name."%")
                                      ->get();
        return view('index', compact('recipes'));
    }

    public function category($name) {
        $recipes = DB::table('recipe')->where('category','=',$name)->get();
        return view('index', compact('recipes'));
    }

    public function size($name) {
        $recipes = DB::table('recipe')->where('grid','=',$name)->get();
        return view('index', compact('recipes'));
    }
}
