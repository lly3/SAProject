<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $material = new Material();
        $material->m_description = "ตะปู";
        $material->m_stock = 100;
        $material->save();

        $material = new Material();
        $material->m_description = "กาว";
        $material->m_stock = 86;
        $material->save();

        $material = new Material();
        $material->m_description = "ไม้สักแท้";
        $material->m_size = "1.2x2.4 เมตร หนา 3 นิ้ว";
        $material->m_stock = 100;
        $material->save();

        $material = new Material();
        $material->m_description = "ไม้เต็ง";
        $material->m_size = "1.2x2.4 เมตร หนา 3 นิ้ว";
        $material->m_stock = 100;
        $material->save();

        $material = new Material();
        $material->m_description = "ไม้สยาแดง";
        $material->m_size = "1.2x2.4 เมตร หนา 3 นิ้ว";
        $material->m_stock = 100;
        $material->save();

        $material = new Material();
        $material->m_description = "ประตูไม้ดักลาสเฟอร์";
        $material->m_size = "1.2x2.4 เมตร หนา 3 นิ้ว";
        $material->m_stock = 100;
        $material->save();
    }
}
