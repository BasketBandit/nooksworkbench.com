<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MyBenchRecipeController extends Controller {
    private $categories;
    private $tags;
    private $sources;
    private $progress;
    private $base_url;

    public function __construct() {
        $this->middleware('auth');
    }

    public function setup() {
        $this->categories = DB::table('users_data')
            ->join('recipes', 'recipes.id', '=', 'users_data.recipe_id')
            ->select('recipes.category')
            ->where('users_data.user_id', '=', Auth::user()->id)
            ->groupBy('category')
            ->get();

        $this->tags = DB::table('users_data')
            ->join('recipes', 'recipes.id', '=', 'users_data.recipe_id')
            ->select('recipes.tag')
            ->where('users_data.user_id', '=', Auth::user()->id)
            ->groupBy('tag')
            ->get();

        $this->sources = DB::table('users_data')
            ->join('recipes', 'recipes.id', '=', 'users_data.recipe_id')
            ->selectRaw('substring_index(`source`, ", ", 1) as sources')
            ->where('users_data.user_id', '=', Auth::user()->id)
            ->groupBy('sources')
            ->get();

        $this->progress = DB::table('users_data')
            ->join('recipes', 'recipes.id', '=', 'users_data.recipe_id')
            ->where('users_data.user_id', '=', Auth::user()->id)
            ->count();

        $this->base_url = "/mybench";
    }

    public function index() {
        self::setup();
        $recipes = DB::table('users_data')
            ->join('recipes', 'recipes.id', '=', 'users_data.recipe_id')
            ->where('users_data.user_id', '=', Auth::user()->id)
            ->orderBy('recipes.name', 'asc')
            ->paginate(24)->onEachSide(1);

        return view('index')
            ->with('base_url', $this->base_url)
            ->with('progress', $this->progress)
            ->with('categories', $this->categories)
            ->with('tags', $this->tags)
            ->with('sources', $this->sources)
            ->with('recipes', $recipes);
    }

    public function browse($name) {
        self::setup();
        $recipes = DB::table('users_data')
            ->join('recipes', 'recipes.id', '=', 'users_data.recipe_id')
            ->where('users_data.user_id', '=', Auth::user()->id)
            ->where('name','LIKE','%'.$name."%")
            ->orderBy('name', 'asc')
            ->paginate(24)->onEachSide(1);

        return view('index')
            ->with('base_url', $this->base_url)
            ->with('progress', $this->progress)
            ->with('categories', $this->categories)
            ->with('tags', $this->tags)
            ->with('sources', $this->sources)
            ->with('recipes', $recipes);
    }

    public function recipe($name) {
        self::setup();
        $recipes = DB::table('users_data')
            ->join('recipes', 'recipes.id', '=', 'users_data.recipe_id')
            ->where('users_data.user_id', '=', Auth::user()->id)
            ->where('name','=',$name)
            ->orderBy('name', 'asc')
            ->paginate(24)->onEachSide(1);

        return view('index')
            ->with('base_url', $this->base_url)
            ->with('progress', $this->progress)
            ->with('categories', $this->categories)
            ->with('tags', $this->tags)
            ->with('sources', $this->sources)
            ->with('recipes', $recipes);
    }

    public function material($name) {
        self::setup();
        $recipes = DB::table('users_data')
            ->join('recipes', 'recipes.id', '=', 'users_data.recipe_id')
            ->where('users_data.user_id', '=', Auth::user()->id)
            ->where(function($query) use ($name) {
                $query->where('m1_id','LIKE','%'.$name."%")
                    ->orWhere('m2_id','LIKE','%'.$name."%")
                    ->orWhere('m3_id','LIKE','%'.$name."%")
                    ->orWhere('m4_id','LIKE','%'.$name."%")
                    ->orWhere('m5_id','LIKE','%'.$name."%")
                    ->orWhere('m6_id','LIKE','%'.$name."%");
            })
            ->orderBy('name', 'asc')
            ->paginate(24)->onEachSide(1);

        return view('index')
            ->with('base_url', $this->base_url)
            ->with('progress', $this->progress)
            ->with('categories', $this->categories)
            ->with('tags', $this->tags)
            ->with('sources', $this->sources)
            ->with('recipes', $recipes);
    }

    public function category($name) {
        self::setup();
        $recipes = DB::table('users_data')
            ->join('recipes', 'recipes.id', '=', 'users_data.recipe_id')
            ->where('users_data.user_id', '=', Auth::user()->id)
            ->where('category','=',$name)
            ->orderBy('name', 'asc')
            ->paginate(24)->onEachSide(1);

        return view('index')
            ->with('base_url', $this->base_url)
            ->with('progress', $this->progress)
            ->with('categories', $this->categories)
            ->with('tags', $this->tags)
            ->with('sources', $this->sources)
            ->with('recipes', $recipes);
    }

    public function size($name) {
        self::setup();
        $recipes = DB::table('users_data')
            ->join('recipes', 'recipes.id', '=', 'users_data.recipe_id')
            ->where('users_data.user_id', '=', Auth::user()->id)
            ->where('grid','=',$name)
            ->orderBy('name', 'asc')
            ->paginate(24)->onEachSide(1);

        return view('index')
            ->with('base_url', $this->base_url)
            ->with('progress', $this->progress)
            ->with('categories', $this->categories)
            ->with('tags', $this->tags)
            ->with('sources', $this->sources)
            ->with('recipes', $recipes);
    }

    public function tag($name) {
        self::setup();
        $recipes = DB::table('users_data')
            ->join('recipes', 'recipes.id', '=', 'users_data.recipe_id')
            ->where('users_data.user_id', '=', Auth::user()->id)
            ->where('tag','LIKE','%'.$name.'%')
            ->orderBy('name', 'asc')
            ->paginate(24)->onEachSide(1);

        return view('index')
            ->with('base_url', $this->base_url)
            ->with('progress', $this->progress)
            ->with('categories', $this->categories)
            ->with('tags', $this->tags)
            ->with('sources', $this->sources)
            ->with('recipes', $recipes);
    }

    public function source($name) {
        self::setup();
        $recipes = DB::table('users_data')
            ->join('recipes', 'recipes.id', '=', 'users_data.recipe_id')
            ->where('users_data.user_id', '=', Auth::user()->id)
            ->where('source','LIKE','%'.$name.'%')
            ->orderBy('name', 'asc')
            ->paginate(24)->onEachSide(1);

        return view('index')
            ->with('base_url', $this->base_url)
            ->with('progress', $this->progress)
            ->with('categories', $this->categories)
            ->with('tags', $this->tags)
            ->with('sources', $this->sources)
            ->with('recipes', $recipes);
    }

    public function customisable($name) {
        self::setup();
        $recipes = DB::table('users_data')
            ->join('recipes', 'recipes.id', '=', 'users_data.recipe_id')
            ->where('users_data.user_id', '=', Auth::user()->id)
            ->where('customisable','=',$name)
            ->orderBy('name', 'asc')
            ->paginate(24)->onEachSide(1);

        return view('index')
            ->with('base_url', $this->base_url)
            ->with('progress', $this->progress)
            ->with('categories', $this->categories)
            ->with('tags', $this->tags)
            ->with('sources', $this->sources)
            ->with('recipes', $recipes);
    }
}
