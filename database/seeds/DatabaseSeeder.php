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
            'photo' => 'images/coctails/sidecar.jpg',
        ],
        [
            'name' => "Мохито",
            'description' => 'Освежающий сладкий лонг на основе рома с большим количеством мяты и лайма',
            'recipe' => 'Мята свежая - 4-5 веточек. Коричневый тростниковый сахар (или обычный) - 1 ч. л. Белый ром (например, Bacardi) - 50 мл. Спрайт (или содовая) - 60 мл. Лайм - 0,5 шт. Лед - сколько уйдет',
            'photo' => 'images/coctails/mojito.jpg',
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
            'name' => "Лимон",
            'description' => 'Желтый',
            'photo' => 'images/ingridients/lemon.jpg',
        ],
        [
            'name' => "Лимонная цедра",
            'description' => 'Лимонная цедра',
            'photo' => 'images/ingridients/lemonzest.jpg',
        ],
        [
            'name' => "Мята свежая",
            'description' => 'Мята свежая',
            'photo' => 'images/ingridients/mint.jpg',
        ],
        [
            'name' => "Коричневый тростниковый сахар",
            'description' => 'Коричневый тростниковый сахар',
            'photo' => 'images/ingridients/brownsugar.jpg',
        ],
        [
            'name' => "Белый ром",
            'description' => 'Белый ром',
            'photo' => 'images/ingridients/bacardi.jpg',
        ],
        [
            'name' => "Спрайт",
            'description' => 'Спрайт',
            'photo' => 'images/ingridients/sprite.jpg',
        ],
        [
            'name' => "Лайм",
            'description' => 'Лайм',
            'photo' => 'images/ingridients/lime.jpg',
        ],
        [
            'name' => "Леда",
            'description' => 'Лед',
            'photo' => 'images/ingridients/ice.jpg',
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
            "count_of_ingridient"=>"4-5 веточек"
        ],
        [
            "ingridient_id"=>"6",
            "coctail_id"=>2,
            "count_of_ingridient"=>"По желанию"
        ],
        [
            "ingridient_id"=>"7",
            "coctail_id"=>2,
            "count_of_ingridient"=>"1 чайная ложка"
        ],
        [
            "ingridient_id"=>"8",
            "coctail_id"=>2,
            "count_of_ingridient"=>"50 мл.ю"
        ],
        [
            "ingridient_id"=>"9",
            "coctail_id"=>2,
            "count_of_ingridient"=>"60 мл."
        ],
        [
            "ingridient_id"=>"10",
            "coctail_id"=>2,
            "count_of_ingridient"=>"сколько войдет"
        ],
        [
            "ingridient_id"=>"11",
            "coctail_id"=>2,
            "count_of_ingridient"=>"сколько войдет"
        ],
        [
            "ingridient_id"=>"7",
            "coctail_id"=>5,
            "count_of_ingridient"=>"4-5 веточек"
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
