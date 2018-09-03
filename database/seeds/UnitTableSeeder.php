<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert([
            [
                'name'              => 'Гидравлическая система 5001',
                'description'       => 'Для получения отличных всходов возникает необходимость выбора универсальной сеялки, которая при наименьших затратах труда, смогла бы обеспечивать первоклассный посев широкого спектра сельскохозяйственных культур (зерновых, трав, овощей, смесей, бобовых, технических культур), это сеялка серии СЗМ «Ника-4», «Ника-6» производства ООО «Велес-Агро ЛТД. На нашем сайте Вы сможете найти широкий ассортимент оригинальных запчастей. Позвоните нам и наши специалисты помогут Вам подобрать нужную запчасть и получить ее у Вас в хозяйстве.',
                'image_id'          => 1,
                'meta_title'        => 'Гидравлическая система 5001',
                'meta_description'  => 'Гидравлическая система 5001',
                'meta_keywords'     => 'Гидравлическая система 5001',
                'url_alias'         => 'gidravlicheskaya-sistema-5001',
                'sort_order'        => 1,
                'status'            => 1,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'name'              => 'Рудуктора и приводы узел 5002',
                'description'       => 'Для получения отличных всходов возникает необходимость выбора универсальной сеялки, которая при наименьших затратах труда, смогла бы обеспечивать первоклассный посев широкого спектра сельскохозяйственных культур (зерновых, трав, овощей, смесей, бобовых, технических культур), это сеялка серии СЗМ «Ника-4», «Ника-6» производства ООО «Велес-Агро ЛТД. На нашем сайте Вы сможете найти широкий ассортимент оригинальных запчастей. Позвоните нам и наши специалисты помогут Вам подобрать нужную запчасть и получить ее у Вас в хозяйстве.',
                'image_id'          => 1,
                'meta_title'        => 'Рудуктора и приводы узел 5002',
                'meta_description'  => 'Рудуктора и приводы узел 5002',
                'meta_keywords'     => 'Рудуктора и приводы узел 5002',
                'url_alias'         => 'ruduktora-i-privody-uzel-5002',
                'sort_order'        => 1,
                'status'            => 1,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
        ]);
    }
}