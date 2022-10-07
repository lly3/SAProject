<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product();
        $product->p_title = 'วงกบประตู ไม้สักแท้';
        $product->p_description = 'ทางร้านใช้เวลาเตรียมสินค้า5-7 วัน หลังจากการยืนยันการชำระเงิน เช็คสินค้าก่อนบรรจุให้ทุก order';
        $product->p_quantity = 10;
        $product->p_price = 1470;
        $product->p_wood_type = 'ไม้สักแท้';
        $product->p_size = '100x200';
        $product->save();
        $image = new Image();
        $image->url = '1.jpg';
        $image->product_id = $product->id;
        $image->save();
        $product->images()->save($image);

        $product = new Product();
        $product->p_title = 'STWOOD วงกบประตูไม้ ไม้เต็ง วงกบไม้';
        $product->p_description = 'จำกัดการซื้อ 1 ชิ้นต่อ 1 คำสั่งซื้อนะคะ  เนื่องจากเป็นเงื่อนไขจากทางขนส่งเรื่องน้ำหนักของสินค้าขนาดใหญ่ ต้องแยกส่งออเดอร์ละวง ไม่สามารถมัดรวมได้ และอาจเกิดความเสียหาย';
        $product->p_quantity = 113;
        $product->p_price = 850;
        $product->p_wood_type = 'ไม้เต็ง';
        $product->p_size = '80x200';
        $product->save();
        $image = new Image();
        $image->url = '2.jpg';
        $image->product_id = $product->id;
        $image->save();
        $product->images()->save($image);

        $product = new Product();
        $product->p_title = 'วงกบประตู ไม้สักแท้';
        $product->p_description = 'ทางร้านใช้เวลาเตรียมสินค้า5-7 วัน หลังจากการยืนยันการชำระเงิน เช็คสินค้าก่อนบรรจุให้ทุก order';
        $product->p_quantity = 2;
        $product->p_price = 1370;
        $product->p_wood_type = 'ไม้สักแท้';
        $product->p_size = '90x180';
        $product->save();
        $image = new Image();
        $image->url = '1.jpg';
        $image->product_id = $product->id;
        $image->save();
        $product->images()->save($image);

        $product = new Product();
        $product->p_title = 'STWOOD วงกบประตูไม้ ไม้เต็ง วงกบไม้';
        $product->p_description = 'จำกัดการซื้อ 1 ชิ้นต่อ 1 คำสั่งซื้อนะคะ  เนื่องจากเป็นเงื่อนไขจากทางขนส่งเรื่องน้ำหนักของสินค้าขนาดใหญ่ ต้องแยกส่งออเดอร์ละวง ไม่สามารถมัดรวมได้ และอาจเกิดความเสียหาย';
        $product->p_quantity = 13;
        $product->p_price = 850;
        $product->p_wood_type = 'ไม้เต็ง';
        $product->p_size = '70x200';
        $product->save();
        $image = new Image();
        $image->url = '2.jpg';
        $image->product_id = $product->id;
        $image->save();
        $product->images()->save($image);


        $product = new Product();
        $product->p_title = 'ประตูไม้สยาแดง 6 ฟัก สีธรรมชาติ';
        $product->p_description = 'ประตูไม้จริง หน้าต่างไม้ โดยผู้เชี่ยวชาญมากประสบการณ์ ผลิตจากไม้สยาแดงเกรดคุณภาพ ผ่านกระบวนการอบแห้งที่ได้มาตรฐาน ลดการโก่งงอ การแตกของเนื้อไม้';
        $product->p_quantity = 20;
        $product->p_price = 1890;
        $product->p_wood_type = 'ไม้สยาแดง';
        $product->p_size = '80x200';
        $product->save();
        $image = new Image();
        $image->url = '5.jpg';
        $image->product_id = $product->id;
        $image->save();
        $product->images()->save($image);

        $product = new Product();
        $product->p_title = 'ประตูไม้สยาแดง 4 ฟัก สีธรรมชาติ';
        $product->p_description = ' หน้าต่างไม้ โดยผู้เชี่ยวชาญมากประสบการณ์ ผลิตจากไม้สยาแดงเกรดคุณภาพ ผ่านกระบวนการอบแห้งที่ได้มาตรฐาน ลดการโก่งงอ การแตกของเนื้อไม้ ลายไม้มีความสวยงามเป็นธรรมชาติ สามารถใช้ติดตั้งได้ทั้งภายในและภายนอกอาคาร';
        $product->p_quantity = 7;
        $product->p_price = 2270;
        $product->p_wood_type = 'ไม้สยาแดง';
        $product->p_size = '80x200';
        $product->save();
        $image = new Image();
        $image->url = '6.jpg';
        $image->product_id = $product->id;
        $image->save();
        $product->images()->save($image);

        $product = new Product();
        $product->p_title = 'ประตูไม้สยาแดง 5 ฟัก';
        $product->p_description = 'ผ่านกระบวนการอบแห้งที่ได้มาตรฐาน ลดการโก่งงอ การแตกของเนื้อไม้ ลายไม้มีความสวยงามเป็นธรรมชาติ สามารถใช้ติดตั้งได้ทั้งภายในและภายนอกอาคาร';
        $product->p_quantity = 3;
        $product->p_price = 2670;
        $product->p_wood_type = 'ไม้สยาแดง';
        $product->p_size = '80x200';
        $product->save();
        $image = new Image();
        $image->url = '4.jpg';
        $image->product_id = $product->id;
        $image->save();
        $product->images()->save($image);

        $product = new Product();
        $product->p_title = 'ประตูไม้ดักลาสเฟอร์';
        $product->p_description = 'ใช้ไม้จากป่าที่มีการปลูกทดแทนอย่างเป็นระบบนำเข้าจากประเทศแคนาดา เนื้อไม้มีสีน้ำตาลอมส้ม-แดง ลายเสี้ยนไม้สวยงาม';
        $product->p_quantity = 11;
        $product->p_price = 2980;
        $product->p_wood_type = 'ไม้ดักลาสเฟอร์';
        $product->p_size = '80x200';
        $product->save();
        $image = new Image();
        $image->url = '7.jpg';
        $image->product_id = $product->id;
        $image->save();
        $product->images()->save($image);

    }
}
