<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => '배민 상품권 3만원 교환권',
                'description' => '배달의 민족 상품권',
                'price' => 30000,
                'image_url' => 'https://img.danawa.com/prod_img/500000/954/387/img/35387954_1.jpg?_v=20240513141715&shrink=360:360',
                'category' => '상품권'
            ],
            [
                'name' => '배민 상품권 5만원 교환권',
                'description' => '배달의 민족 상품권',
                'price' => 50000,
                'image_url' => 'https://cdn.011st.com/11dims/resize/600x600/quality/75/11src/product/6763567321/B.png?648000000',
                'category' => '상품권'
            ],
            [
                'name' => '배스킨라빈스 파인트',
                'description' => '배스킨라빈스 파인트 교환권',
                'price' => 8200,
                'image_url' => 'https://img.danawa.com/prod_img/500000/273/182/img/3182273_1.jpg?_v=20240510161106',
                'category' => '카페'
            ],
            [
                'name' => '스타벅스 아이스아메리카노',
                'description' => '스타벅스 아이스아메리카노 교환권',
                'price' => 3300,
                'image_url' => 'https://img.danawa.com/prod_img/500000/609/014/img/3014609_1.jpg?_v=20240510092724',
                'category' => '카페'
            ],
            [
                'name' => '스타벅스 자몽허니블랙티',
                'description' => '스타벅스 자몽허니블랙티 교환권',
                'price' => 5300,
                'image_url' => 'https://sitem.ssgcdn.com/32/66/81/item/1000555816632_i1_750.jpg',
                'category' => '카페'
            ],
            [
                'name' => '[교촌치킨] 반반콤보웨지감자세트',
                'description' => '반반콤보웨지감자세트',
                'price' => 30000,
                'image_url' => 'https://sitem.ssgcdn.com/87/63/34/item/1000543346387_i1_750.jpg',
                'category' => '식품'
            ],


            [
                'name' => '신세계백화점 상품권 1만원',
                'description' => '신세계백화점 상품권 1만원',
                'price' => 10000,
                'image_url' => 'https://img.danawa.com/prod_img/500000/073/820/img/820073_1.jpg?_v=20220512083157',
                'category' => '상품권'
            ],
            [
                'name' => '파리바게뜨 우유가득 생크림 케이크',
                'description' => '배달의 민족 상품권',
                'price' => 31000,
                'image_url' => 'https://item.elandrs.com/upload/prd/orgimg/271/2103698271_0000002.jpg?w=750&h=&q=100',
                'category' => '식품'
            ],
            [
                'name' => 'LG전자 스타일러 슈케이스',
                'description' => 'LG전자 스타일러 오브제컬렉션 슈케이스',
                'price' => 390000,
                'image_url' => 'https://www.lge.co.kr/kr/images/lg-styler/md09959827/gallery/medium01.jpg',
                'category' => '전자제품'
            ],
            [
                'name' => 'LG전자 그램 노트북',
                'description' => '노트북',
                'price' => 2440000,
                'image_url' => 'https://m.ddaily.co.kr/2023/01/04/2023010417462633469_l.jpg',
                'category' => '전자제품'
            ],
            [
                'name' => 'CGV 영화 관람권',
                'description' => 'CGV 영화 관람권',
                'price' => 8000,
                'image_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqL67K8VmLJyvodNOCZSB8o1s8T1cGxVxFiOljyrR2J6Nzb8UEG9ayB9he6Dnmc5rm5J4&usqp=CAU',
                'category' => '기타'
            ],
            [
                'name' => 'CU 모바일 금액권 10000원',
                'description' => 'CU 모바일 금액권 10000원',
                'price' => 10000,
                'image_url' => 'https://sitem.ssgcdn.com/81/69/58/item/1000543586981_i1_332.jpg',
                'category' => '상품권'
            ],

            

        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }
    }
}
