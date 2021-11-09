<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class DatabaseSeeder extends Seeder
{
    private $coctails=[
        [
            'name' => "Сайдкар",
            'description' => 'Классический коктейль, традиционно приготавливаемый из коньяка, апельсинового ликёра',
            'recipe' => 'Апельсиновый ликер типа Куантро (охлажденный) - 2 ст. л. Коньяк - 1 ст. л. Игристое вино охлажденное (испанское игристое вино Кава) - 1/2 стакана. Долька лимона. Лимонная цедра для украшения (по желанию)',
            'photo' => 'images/coctails/sidecar.jpg"',
        ],
        [
            'name' => "Мохито",
            'description' => 'Освежающий сладкий лонг на основе рома с большим количеством мяты и лайма',
            'recipe' => 'Мята свежая - 4-5 веточек. Коричневый тростниковый сахар (или обычный) - 1 ч. л. Белый ром (например, Bacardi) - 50 мл. Спрайт (или содовая) - 60 мл. Лайм - 0,5 шт. Лед - сколько уйдет',
            'photo' => 'images/coctails/mojito.png',
        ],
        [
            'name' => "Пина Колада",
            'description' => 'Традиционный карибский алкогольный коктейль на основе светлого рома, с кокосовым молоком и ананасовым соком.',
            'recipe' => 'Ром белый – 50 мл (3 ст. л.). Сок ананасовый – 50 мл (3 ст. л.). Ликер кокосовый – 36 мл (6 ч. л.). Сахарная пудра или мелкий сахар (если используется свежий фрукт) – 5 мл (1 ч. л.)',
            'photo' => 'images/coctails/pinacolada.jpg',
        ],
        [
            'name' => "Черный Русский",
            'description' => 'Классический коктейль, традиционно приготавливаемый из коньяка, апельсинового ликёра',
            'recipe' => 'Водка — 50 мл (3 ст. л.). Кофейный ликер Калуа (Kahlua) или «Тетушка Мария» (Tia Maria) — 25 мл ( 1,5 ст. л.)',
            'photo' => 'images/coctails/daiquiri.jpg',
        ],
        [
            'name' => "Голубое небо",
            'description' => 'Не нашел :)',
            'recipe' => 'Кокосовый ром Малибу - 1 стакан. Кокосовое молоко - 2/3 стакана. Ананасовый сок - 3/4 стакана. Легкий сахарный сироп - 3/4 стакана. Лед. Ликер Кюрасао Блю - 1/8 стакана. Кокосовые дольки для сервировки',
            'photo' => 'images/coctails/bluesky.jpg',
        ]
    ];
    private $ingredients=[
        [
            'name' => "Апельсиновый ликер",
            'description' => 'Отдельная большая категория ликеров, включающая в себя одни из самых знаменитых и популярных ликеров',
            'photo' => 'images/ingridients/orangeliqueur.jpg',
        ],
        [
            'name' => "Испанское игристое вино Кава",
            'description' => 'Произведённое в Испании игристое вино.',
            'photo' => 'images/ingridients/kava.jpg',
        ],
        [
            'name' => "Коньяк",
            'description' => 'Алкоголь',
            'photo' => 'images/ingridients/cognac.jpg',
        ],
        [
            'name' => "Лимона",
            'description' => 'Желтый',
            'photo' => 'images/ingridients/lemon.jpg',
        ],
        [
            'name' => "Лимонная цедра",
            'description' => 'Лимонная цедра',
            'photo' => 'images/ingridients/lemonzest.jpg',
        ]
    ];
    private $recipe=[
        [
            "ingridient_id"=>"1",
            "coctail_id"=>1,
            "count_of_ingridient"=>"2 ст. л."
        ],
        [
            "ingridient_id"=>"3",
            "coctail_id"=>1,
            "count_of_ingridient"=>"1 ст. л."
        ],
        [
            "ingridient_id"=>"2",
            "coctail_id"=>1,
            "count_of_ingridient"=>"1/2 стакана"
        ],
        [
            "ingridient_id"=>"4",
            "coctail_id"=>1,
            "count_of_ingridient"=>"Долька"
        ],
        [
            "ingridient_id"=>"5",
            "coctail_id"=>1,
            "count_of_ingridient"=>"По желанию"
        ]
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coctails')->insert($this->coctails);
        DB::table('ingridients')->insert($this->ingredients);
        DB::table('ingridients_coctails')->insert($this->recipe);
    }
}
