<?php

namespace App\Http\Controllers;

use App\Models\Bom;
use App\Models\Manufacture;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index() {
        $materials = Material::all();
        return view('materials.index', ['materials' => $materials]);
    }

    public function store(Request $request) {
        foreach (Material::all() as $material) {
            $quantity = $request->input($material->id.'_quantity');
            if($quantity != 0) {
                $material->m_stock += $quantity;
                $material->save();
            }
        }

        return redirect()->back()->with('success', 'อัพเดจวัสดุสำเร็จ');
    }
}
