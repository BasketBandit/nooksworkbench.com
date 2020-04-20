<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Recipe;

class DefaultController extends Controller {
	public function index() {
	    $categories = DB::table('recipe')->select('category')->groupBy('category')->get();
	    $tags = DB::table('recipe')->select('tag')->groupBy('tag')->get();
		$recipes = DB::table('recipe')->paginate(24);
		return view('index', compact('categories', 'tags', 'recipes'));
	}

	public function recipe($name) {
	    $categories = DB::table('recipe')->select('category')->groupBy('category')->get();
	    $tags = DB::table('recipe')->select('tag')->groupBy('tag')->get();
        $recipes = DB::table('recipe')->where('name','LIKE','%'.$name."%")->paginate(24);
		return view('index', compact('categories', 'tags', 'recipes'));
    }

    public function material($name) {
        $categories = DB::table('recipe')->select('category')->groupBy('category')->get();
        $tags = DB::table('recipe')->select('tag')->groupBy('tag')->get();
        $recipes = DB::table('recipe')->where('m1_id','LIKE','%'.$name."%")
                                      ->orWhere('m2_id','LIKE','%'.$name."%")
                                      ->orWhere('m3_id','LIKE','%'.$name."%")
                                      ->orWhere('m4_id','LIKE','%'.$name."%")
                                      ->orWhere('m5_id','LIKE','%'.$name."%")
                                      ->orWhere('m6_id','LIKE','%'.$name."%")
                                      ->paginate(24);
		return view('index', compact('categories', 'tags', 'recipes'));
    }

    public function category($name) {
        $categories = DB::table('recipe')->select('category')->groupBy('category')->get();
        $tags = DB::table('recipe')->select('tag')->groupBy('tag')->get();
        $recipes = DB::table('recipe')->where('category','=',$name)->paginate(24);
		return view('index', compact('categories', 'tags', 'recipes'));
    }

    public function size($name) {
        $categories = DB::table('recipe')->select('category')->groupBy('category')->get();
        $tags = DB::table('recipe')->select('tag')->groupBy('tag')->get();
        $recipes = DB::table('recipe')->where('grid','=',$name)->paginate(24);
		return view('index', compact('categories', 'tags', 'recipes'));
    }

    public function tag($name) {
        $categories = DB::table('recipe')->select('category')->groupBy('category')->get();
        $tags = DB::table('recipe')->select('tag')->groupBy('tag')->get();
        $recipes = DB::table('recipe')->where('tag','LIKE','%'.$name.'%')->paginate(24);
		return view('index', compact('categories', 'tags', 'recipes'));
    }

    public function source($name) {
        $categories = DB::table('recipe')->select('category')->groupBy('category')->get();
        $tags = DB::table('recipe')->select('tag')->groupBy('tag')->get();
        $recipes = DB::table('recipe')->where('source','LIKE','%'.$name.'%')->paginate(24);
		return view('index', compact('categories', 'tags', 'recipes'));
    }
}
