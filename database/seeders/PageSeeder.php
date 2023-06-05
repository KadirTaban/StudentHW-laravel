<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages=['Sinif Bilgisi','Veli Bilgisi'];
        $count=0;
        foreach($pages as $page) {
            $count++;
            DB::table('pages')->insert([
                'title'=>$page,
                'slug'=>str_slug($page),
                'image'=>'https://via.placeholder.com/300x150.png/0044bb?text=cats+toDoHomework+nobis',
                'content'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sollicitudin velit urna. Morbi et risus eu est dignissim tempor quis eu nisi. Morbi ac feugiat risus. Praesent id semper neque. Nulla sem erat, pharetra eu auctor in, hendrerit non neque. Nulla rutrum, ligula vel auctor iaculis, dolor purus fermentum leo, quis pretium velit justo eu leo. Sed id diam neque. Curabitur eget ornare mi, quis sagittis ipsum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Praesent tellus diam, blandit in porta sed, fermentum id tellus. Phasellus arcu tellus, consectetur non nisl sit amet, vehicula vulputate mauris. Nunc tempor lorem a ante lobortis, id laoreet ipsum rhoncus.',
                'order'=>$count,
                'created_at'=>now(),
                'updated_at'=>now()
            ]);
        }
    }
}
