<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

use function PHPUnit\Framework\countOf;

class AdminsContoller extends Controller
{
    public function index(){
        $number_of_categories = Category::count();
        $number_of_subcategories = SubCategory::count();
 
        return view('admin.index' , compact('number_of_categories', 'number_of_subcategories'));

    }
}
