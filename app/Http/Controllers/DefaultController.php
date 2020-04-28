<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Recipe;

class DefaultController extends Controller {
    private $categories;
    private $tags;
    private $sources;
    private $base_url;

    public function __construct() {
        $this->categories = DB::table('recipes')->select('category')->groupBy('category')->get();
        $this->tags = DB::table('recipes')->select('tag')->groupBy('tag')->get();
        $this->sources = DB::table('recipes')->selectRaw('substring_index(`source`, ", ", 1) as sources')->groupBy('sources')->get();
        $this->base_url = "";
     }

	public function index() {
		$recipes = DB::table('recipes')
		    ->orderBy('name', 'asc')
		    ->paginate(24);

		return view('index')
		    ->with('base_url', $this->base_url)
		    ->with('categories', $this->categories)
		    ->with('tags', $this->tags)
		    ->with('sources', $this->sources)
		    ->with('recipes', $recipes);
	}

	public function browse($name) {
        $recipes = DB::table('recipes')
            ->where('name','LIKE','%'.$name."%")
            ->orderBy('name', 'asc')
            ->paginate(24);

		return view('index')
		    ->with('base_url', $this->base_url)
		    ->with('categories', $this->categories)
		    ->with('tags', $this->tags)
		    ->with('sources', $this->sources)
		    ->with('recipes', $recipes);
    }

    public function recipe($name) {
        $recipes = DB::table('recipes')
            ->where('name','=',$name)
            ->orderBy('name', 'asc')
            ->paginate(24);

		return view('index')
		    ->with('base_url', $this->base_url)
		    ->with('categories', $this->categories)
		    ->with('tags', $this->tags)
		    ->with('sources', $this->sources)
		    ->with('recipes', $recipes);
    }

    public function material($name) {
        $recipes = DB::table('recipes')
            ->where('m1_id','LIKE','%'.$name."%")
            ->orWhere('m2_id','LIKE','%'.$name."%")
            ->orWhere('m3_id','LIKE','%'.$name."%")
            ->orWhere('m4_id','LIKE','%'.$name."%")
            ->orWhere('m5_id','LIKE','%'.$name."%")
            ->orWhere('m6_id','LIKE','%'.$name."%")
            ->orderBy('name', 'asc')
            ->paginate(24);

		return view('index')
		    ->with('base_url', $this->base_url)
		    ->with('categories', $this->categories)
		    ->with('tags', $this->tags)
		    ->with('sources', $this->sources)
		    ->with('recipes', $recipes);
    }

    public function category($name) {
        $recipes = DB::table('recipes')
            ->where('category','=',$name)
            ->orderBy('name', 'asc')
            ->paginate(24);

		return view('index')
		    ->with('base_url', $this->base_url)
		    ->with('categories', $this->categories)
		    ->with('tags', $this->tags)
		    ->with('sources', $this->sources)
		    ->with('recipes', $recipes);
    }

    public function size($name) {
        $recipes = DB::table('recipes')
            ->where('grid','=',$name)
            ->orderBy('name', 'asc')
            ->paginate(24);

		return view('index')
		    ->with('base_url', $this->base_url)
		    ->with('categories', $this->categories)
		    ->with('tags', $this->tags)
		    ->with('sources', $this->sources)
		    ->with('recipes', $recipes);
    }

    public function tag($name) {
        $recipes = DB::table('recipes')
            ->where('tag','LIKE','%'.$name.'%')
            ->orderBy('name', 'asc')
            ->paginate(24);

		return view('index')
		    ->with('base_url', $this->base_url)
		    ->with('categories', $this->categories)
		    ->with('tags', $this->tags)->with('sources', $this->sources)
		    ->with('recipes', $recipes);
    }

    public function source($name) {
        $recipes = DB::table('recipes')
            ->where('source','LIKE','%'.$name.'%')
            ->orderBy('name', 'asc')
            ->paginate(24);

		return view('index')
		    ->with('base_url', $this->base_url)
		    ->with('categories', $this->categories)
		    ->with('tags', $this->tags)
		    ->with('sources', $this->sources)
		    ->with('recipes', $recipes);
    }

    public function customisable($name) {
        $recipes = DB::table('recipes')
            ->where('customisable','=',$name)
            ->orderBy('name', 'asc')
            ->paginate(24);

    	return view('index')
    	    ->with('base_url', $this->base_url)
    	    ->with('categories', $this->categories)
    	    ->with('tags', $this->tags)->with('sources', $this->sources)
    	    ->with('recipes', $recipes);
    }
}
