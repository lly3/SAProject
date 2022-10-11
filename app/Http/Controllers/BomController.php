<?php

namespace App\Http\Controllers;

use App\Models\Bom;
use App\Models\Material;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Container\BoundMethod;
use Illuminate\Http\Request;

class BomController extends Controller
{
    public function create() {
        $materials = Material::all();
        $products = Product::all();
        return view('boms.create', ['materials' => $materials, 'products' => $products]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'description' => ['required', 'max:1000'],
            'status' => ['required', 'max:1', 'min:0'],
            'selected_product' => ['required', 'integer'],
        ]);

        $bom = new Bom();
        $bom->bom_description = $request->input('description');
        $bom->bom_status = $request->input('status');
        $bom->user_id = $request->user()->id;
        $bom->product_id = $request->input('selected_product');
        $bom->save();

        foreach (Material::all() as $material) {
            $quantity = $request->input($material->id.'_quantity');
            if($quantity != 0) {
                $material->m_stock -= $quantity;
                $material->save();

                $bom->materials()->save($material, ['bm_quantity' => $quantity]);
            }
        }

        return redirect()->back();
    }
}
