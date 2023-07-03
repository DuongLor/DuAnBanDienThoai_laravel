<?php

namespace App\Http\View\Composers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\View\View;

class LayoutComposer
{
	public function compose(View $view)
	{
		// Xử lý dữ liệu và truyền cho view
		$categories = Category::all();
		$brands = Brand::all();
    $data = [
      'categories' => $categories,
			'brands' => $brands,
    ];
    $view->with($data);
	}
}
