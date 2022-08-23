<?php

namespace Database\Seeders;

use App\Models\Organization;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $organization = Organization::first();
        if (!$organization) {
            $this->command->line("Generating Organizations");
            $organizations = [
                'กองกลาง', 'กองการเจ้าหน้าที่', 'กองกิจการนิสิต', 'กองคลัง', 'กองแผนงาน', 'กองยานพาหนะ อาคารและสถานที่',
                'กองวิเทศสัมพันธ์', 'สำนักงานตรวจสอบภายใน', 'สำนักงานทรัพย์สิน', 'สำนักงานบริการวิชาการ', 'สำนักงานกฏหมาย',
                'สำนักการกีฬา', 'สำนักงานพัฒนาคุณภาพและบริหารความเสี่ยง', 'สำนักงานคณะกรรมการพัฒนาการปฏิบัติราชการ',
                'สถานพยาบาลมหาวิทยาลัยเกษตรศาสตร์'
            ];
            collect($organizations)->each(function ($organization_name, $key) {
                $organization = new Organization();
                $organization->name = $organization_name;
                $organization->save();
            });
        }

        $this->command->line("Generating organizations for all posts");
        $posts = Post::get();
        $posts->each(function($post, $key) {
            $organization_id = Organization::inRandomOrder()->first()->id;
            $post->organization_id = $organization_id;
            $post->save();
        });
    }
}
