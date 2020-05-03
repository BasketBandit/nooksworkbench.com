<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DefaultRecipeController extends Controller {
    private $categories;
    private $tags;
    private $sources;
    private $base_url;
    private $preferences;

    public function __construct()
    {
        $this->categories = DB::table('recipes')->select('category')->groupBy('category')->get();
        $this->tags = DB::table('recipes')->select('tag')->groupBy('tag')->get();
        $this->sources = DB::table('recipes')->selectRaw('substring_index(`source`, ", ", 1) as sources')->groupBy('sources')->get();
        $this->base_url = "";

        if(Auth::check()) {
            $this->preferences = DB::table('users_preferences')->where('user_id', '=', Auth::user()->id)->get();
        }
     }

	public function index() {
	    if(Auth::check()) {
            $recipes = DB::table('recipes')
                ->leftJoin('users_data', function ($join) {
                    $join->on('users_data.recipe_id', '=', 'recipes.id')
                        ->where('users_data.user_id', '=', Auth::user()->id);
                })
                ->select('*', 'recipes.id')
                ->when(Auth::user()->unlocked_hidden == 1, function ($query) {
                    return $query->where('users_data.unlocked', '=', null);
                })
                ->orderBy('name', 'asc')
                ->paginate(24)->onEachSide(1);
		} else {
            $recipes = DB::table('recipes')
                ->orderBy('name', 'asc')
                ->paginate(24)->onEachSide(1);
		}

		return view('index')
		    ->with('base_url', $this->base_url)
            ->with('preferences', $this->preferences)
		    ->with('categories', $this->categories)
		    ->with('tags', $this->tags)
		    ->with('sources', $this->sources)
		    ->with('recipes', $recipes);
	}

	public function browse($name) {
	    if(Auth::check()) {
            $recipes = DB::table('recipes')
                ->leftJoin('users_data', function ($join) {
                    $join->on('users_data.recipe_id', '=', 'recipes.id')
                         ->where('users_data.user_id', '=', Auth::user()->id);
                })
                ->select('*', 'recipes.id')
                ->where('name','LIKE','%'.$name."%")
                ->when(Auth::user()->unlocked_hidden == 1, function ($query) {
                    return $query->where('users_data.unlocked', '=', null);
                })
                ->orderBy('name', 'asc')
                ->paginate(24)->onEachSide(1);
		} else {
            $recipes = DB::table('recipes')
                ->where('name','LIKE','%'.$name."%")
                ->orderBy('name', 'asc')
                ->paginate(24)->onEachSide(1);
		}

		return view('index')
		    ->with('base_url', $this->base_url)
            ->with('preferences', $this->preferences)
		    ->with('categories', $this->categories)
		    ->with('tags', $this->tags)
		    ->with('sources', $this->sources)
		    ->with('recipes', $recipes);
    }

    public function recipe($name) {
        if(Auth::check()) {
            $recipes = DB::table('recipes')
                ->leftJoin('users_data', function ($join) {
                    $join->on('users_data.recipe_id', '=', 'recipes.id')
                         ->where('users_data.user_id', '=', Auth::user()->id);
                })
                ->select('*', 'recipes.id')
                ->where('name','=',$name)
                ->when(Auth::user()->unlocked_hidden == 1, function ($query) {
                    return $query->where('users_data.unlocked', '=', null);
                })
                ->paginate(24)->onEachSide(1);
        } else {
            $recipes = DB::table('recipes')
                ->where('name','=',$name)
                ->paginate(24)->onEachSide(1);
        }

		return view('index')
		    ->with('base_url', $this->base_url)
            ->with('preferences', $this->preferences)
		    ->with('categories', $this->categories)
		    ->with('tags', $this->tags)
		    ->with('sources', $this->sources)
		    ->with('recipes', $recipes);
    }

    public function material($name) {
        if(Auth::check()) {
            $recipes = DB::table('recipes')
                ->leftJoin('users_data', function ($join) {
                    $join->on('users_data.recipe_id', '=', 'recipes.id')
                         ->where('users_data.user_id', '=', Auth::user()->id);
                })
                ->select('*', 'recipes.id')
                ->where(function($query) use ($name) {
                    $query->where('m1_id','LIKE','%'.$name."%")
                        ->orWhere('m2_id','LIKE','%'.$name."%")
                        ->orWhere('m3_id','LIKE','%'.$name."%")
                        ->orWhere('m4_id','LIKE','%'.$name."%")
                        ->orWhere('m5_id','LIKE','%'.$name."%")
                        ->orWhere('m6_id','LIKE','%'.$name."%");
                })
                ->when(Auth::user()->unlocked_hidden == 1, function ($query) {
                    return $query->where('users_data.unlocked', '=', null);
                })
                ->orderBy('name', 'asc')
                ->paginate(24)->onEachSide(1);
        } else {
            $recipes = DB::table('recipes')
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
        }

		return view('index')
		    ->with('base_url', $this->base_url)
            ->with('preferences', $this->preferences)
		    ->with('categories', $this->categories)
		    ->with('tags', $this->tags)
		    ->with('sources', $this->sources)
		    ->with('recipes', $recipes);
    }

    public function category($name) {
        if(Auth::check()) {
            $recipes = DB::table('recipes')
                ->leftJoin('users_data', function ($join) {
                    $join->on('users_data.recipe_id', '=', 'recipes.id')
                         ->where('users_data.user_id', '=', Auth::user()->id);
                })
                ->select('*', 'recipes.id')
                ->where('category','=',$name)
                ->when(Auth::user()->unlocked_hidden == 1, function ($query) {
                    return $query->where('users_data.unlocked', '=', null);
                })
                ->orderBy('name', 'asc')
                ->paginate(24)->onEachSide(1);
        } else {
            $recipes = DB::table('recipes')
                ->where('category','=',$name)
                ->orderBy('name', 'asc')
                ->paginate(24)->onEachSide(1);
        }

		return view('index')
		    ->with('base_url', $this->base_url)
            ->with('preferences', $this->preferences)
		    ->with('categories', $this->categories)
		    ->with('tags', $this->tags)
		    ->with('sources', $this->sources)
		    ->with('recipes', $recipes);
    }

    public function size($name) {
        if(Auth::check()) {
            $recipes = DB::table('recipes')
                ->leftJoin('users_data', function ($join) {
                    $join->on('users_data.recipe_id', '=', 'recipes.id')
                         ->where('users_data.user_id', '=', Auth::user()->id);
                })
                ->select('*', 'recipes.id')
                ->where('grid','=',$name)
                ->when(Auth::user()->unlocked_hidden == 1, function ($query) {
                    return $query->where('users_data.unlocked', '=', null);
                })
                ->orderBy('name', 'asc')
                ->paginate(24)->onEachSide(1);
        } else {
            $recipes = DB::table('recipes')
                ->where('grid','=',$name)
                ->orderBy('name', 'asc')
                ->paginate(24)->onEachSide(1);
        }

		return view('index')
		    ->with('base_url', $this->base_url)
            ->with('preferences', $this->preferences)
		    ->with('categories', $this->categories)
		    ->with('tags', $this->tags)
		    ->with('sources', $this->sources)
		    ->with('recipes', $recipes);
    }

    public function tag($name) {
        if(Auth::check()) {
            $recipes = DB::table('recipes')
                ->leftJoin('users_data', function ($join) {
                    $join->on('users_data.recipe_id', '=', 'recipes.id')
                         ->where('users_data.user_id', '=', Auth::user()->id);
                })
                ->select('*', 'recipes.id')
                ->where('tag','LIKE','%'.$name.'%')
                ->when(Auth::user()->unlocked_hidden == 1, function ($query) {
                    return $query->where('users_data.unlocked', '=', null);
                })
                ->orderBy('name', 'asc')
                ->paginate(24)->onEachSide(1);
        } else {
            $recipes = DB::table('recipes')
                ->where('tag','LIKE','%'.$name.'%')
                ->orderBy('name', 'asc')
                ->paginate(24)->onEachSide(1);
        }

		return view('index')
		    ->with('base_url', $this->base_url)
            ->with('preferences', $this->preferences)
		    ->with('categories', $this->categories)
		    ->with('tags', $this->tags)->with('sources', $this->sources)
		    ->with('recipes', $recipes);
    }

    public function source($name) {
        if(Auth::check()) {
            $recipes = DB::table('recipes')
                ->leftJoin('users_data', function ($join) {
                    $join->on('users_data.recipe_id', '=', 'recipes.id')
                         ->where('users_data.user_id', '=', Auth::user()->id);
                })
                ->select('*', 'recipes.id')
                ->where('source','LIKE','%'.$name.'%')
                ->when(Auth::user()->unlocked_hidden == 1, function ($query) {
                    return $query->where('users_data.unlocked', '=', null);
                })
                ->orderBy('name', 'asc')
                ->paginate(24)->onEachSide(1);
        } else {
            $recipes = DB::table('recipes')
                ->where('source','LIKE','%'.$name.'%')
                ->orderBy('name', 'asc')
                ->paginate(24)->onEachSide(1);
        }

		return view('index')
		    ->with('base_url', $this->base_url)
            ->with('preferences', $this->preferences)
		    ->with('categories', $this->categories)
		    ->with('tags', $this->tags)
		    ->with('sources', $this->sources)
		    ->with('recipes', $recipes);
    }

    public function customisable($name) {
        if(Auth::check()) {
            $recipes = DB::table('recipes')
                ->leftJoin('users_data', function ($join) {
                    $join->on('users_data.recipe_id', '=', 'recipes.id')
                         ->where('users_data.user_id', '=', Auth::user()->id);
                })
                ->select('*', 'recipes.id')
                ->where('customisable','=',$name)
                ->when(Auth::user()->unlocked_hidden == 1, function ($query) {
                    return $query->where('users_data.unlocked', '=', null);
                })
                ->orderBy('name', 'asc')
                ->paginate(24)->onEachSide(1);
        } else {
            $recipes = DB::table('recipes')
                ->where('customisable','=',$name)
                ->orderBy('name', 'asc')
                ->paginate(24)->onEachSide(1);
        }

    	return view('index')
    	    ->with('base_url', $this->base_url)
            ->with('preferences', $this->preferences)
    	    ->with('categories', $this->categories)
    	    ->with('tags', $this->tags)
            ->with('sources', $this->sources)
    	    ->with('recipes', $recipes);
    }
}
