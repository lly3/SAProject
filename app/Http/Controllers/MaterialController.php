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
}
