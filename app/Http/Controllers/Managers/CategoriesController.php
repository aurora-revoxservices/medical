<?php


namespace App\Http\Controllers\Managers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\Models\Categorie;


class CategoriesController extends Controller
{

    //-----BLOGS-----------------------------------------------//
    public function index()
    {
        $categories = Categorie::get();
        return view('managers.views.categories.index')->with([
            'categories' => $categories,
        ]);
    }

    public function create()
    {

        $availables = collect([
            ['id' => '1', 'title' => 'Activo'],
            ['id' => '0', 'title' => 'Inactivo'],
        ]);

        $availables = $availables->pluck('title','id');
        return view('managers.views.categories.create')->with([
            'availables' => $availables,

        ]);

    }

    public function storage(Request $request)
    {
        $category = new Categorie;
        $category->slack = $this->generate_slack("categories");
        $category->slug  = Str::slug($request->label, '-');
        $category->label = $request->label;
        $category->available = $request->available;
        $category->save();

        return redirect()->route('manager.categories');
    }

    public function edit($slack)
    {
        $category = Categorie::slack($slack);
        $availables = collect([
            ['id' => '0', 'title' => 'Inactivo'],
            ['id' => '1', 'title' => 'Activo'],
        ]);
        $availables = $availables->pluck('title','id');

        return view('managers.views.categories.edit')->with([
            'category' => $category,
            'availables' => $availables,

        ]);
    }

    public function update(Request $request , $slack)
    {
        $category = Categorie::slack($slack);
        $category->label = $request->label;
        $category->available = $request->available;
        $category->save();
        return redirect()->route('manager.categories');

    }

    public function destroy($slack)
    {
        $category = Categorie::slack($slack);
        $category->delete();
        return redirect()->route('manager.categories');
    }


}

