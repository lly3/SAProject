<?php

namespace App\Http\Controllers;

use App\Models\Manufacture;
use App\Models\Material;
use App\Models\Product;
use Illuminate\Http\Request;

class ManufactureController extends Controller
{
    public function create() {
        $products = Product::all();
        $materials = Material::all();

        return view('manufactures.create', ['products' => $products, 'materials' => $materials]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'selected_product' => ['required', 'integer'],
        ]);

        $manufacture = new Manufacture();
        $manufacture->product_id = $request->input('selected_product');
        $manufacture->user_id = $request->user()->id;
        $manufacture->m_date = now();
        $manufacture->save();

        foreach (Material::all() as $material) {
            $quantity = $request->input($material->id.'_quantity');
            if($quantity != 0) {
                $material->m_stock -= $quantity;
                $material->save();
            }
        }

        return redirect()->back()->with('success', 'ผลิตสินค้าสำเร็จ');
    }
}
