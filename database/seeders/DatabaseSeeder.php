<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductBrand;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Models\StateOrRegion;
use App\Models\Township;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\WishList;
use App\Models\WishListItem;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Category::factory(3)
        //     ->has(Product::factory()->count(5))
        //     // ->has(ProductBrand::factory()->count(1))
        //     ->create();
        ProductBrand::factory(6)->create();


        Category::factory(3)
            ->has(
                Product::factory()->count(3)
                    ->has(ProductImage::factory()->count(4), "product_images")
                    ->has(ProductBrand::factory()->count(1), "product_brand"),
                "products"
            )
            ->create();


        // the code below is the same as the code ->has(CartItem::factory()->count(5))->count(1), "cart_items")
        // $carts = Cart::all(); //3
        // $carts->each(function ($cart) {
        //     CartItem::factory(5)->create(['cart_id' => $cart->id]); //15
        // });

        $porducts = Product::all();
        $porducts->each(function ($product) {
            $product->product_colors()->sync([1, 2, 3]);
        });

        $state_or_regions = [
            1 => 'Yangon',
            2 => 'Mandalay',
            3 => 'Naypyidaw',
            4 => 'Ayeyarwady',
            5 => 'Bago',
            6 => 'Magway',
            7 => 'Sagaing',
            8 => 'Tanintharyi',
            9 => 'Chin',
            10 => 'Kachin',
            11 => 'Kayah',
            12 => 'Kayin',
            13 => 'Mon',
            14 => 'Rakhine',
            15 => 'Shan'
        ];

        foreach ($state_or_regions as $state) {
            StateOrRegion::factory()->create(['name' => $state]);
        }

        $townships_and_zip_codes = [
            1 => [
                'Ahlone' => '11121',
                'Bahan' => '11201',
                'Botataung' => '11161',
                'Dagon' => '11191',
                'Dagon Myothit (East)' => '11451',
                'Dagon Myothit (North)' => '11411',
                'Dagon Myothit (South)' => '11431',
                'Dala' => '11231',
                'Dawbon' => '11221',
                'Hlaing' => '11051',
                'Hlaingthaya' => '11401',
                'Hmawbi' => '11321',
                'Htantabin' => '11311',
                'Insein' => '11011',
                'Kamayut' => '11041',
                'Kyauktada' => '11181',
                'Kyimyindaing' => '11101',
                'Lanmadaw' => '11131',
                'Latha' => '11141',
                'Mayangone' => '11061',
                'Mingaladon' => '11021',
                'Mingalartaungnyunt' => '11291',
                'North Okkalapa' => '11031',
                'Pabedan' => '11171',
                'Pazundaung' => '11151',
                'Sanchaung' => '11111',
                'Seikkyi Kanaungto' => '11241',
                'Shwepyithar' => '11421',
                'South Okkalapa' => '11091',
                'Taikkyi' => '11111',
                'Tamwe' => '11211',
                'Thaketa' => '11241',
                'Thingangyun' => '11071',
                'Thongwa' => '11261',
                'Twante' => '11351',
                'Yankin' => '11081',
                'Kawmhu' => '11341',
                'Khayan' => '11331',
                'Kyaiklat' => '11141',
            ],
            2 => [
                'Amarapura' => '05011',
                'Aungmyaythazan' => '05001',
                'Chanayethazan' => '05071',
                'Chanmyathazi' => '05051',
                'Kyaukpadaung' => '05221',
                'Madaya' => '05231',
                'Mahaaungmyay' => '05091',
                'Mahlaing' => '05211',
                'Meiktila' => '05131',
                'Mogok' => '05501',
                'Myingyan' => '05241',
                'Myittha' => '05171',
                'Nyaung-U' => '05281',
                'Natogyi' => '05141',
                'Ngazun' => '05151',
                'Patheingyi' => '05081',
                'Pyawbwe' => '05261',
                'Pyinoolwin' => '05111',
                'Sintgaing' => '05161',
                'Taungtha' => '05181',
                'Thabeikkyin' => '05511',
                'Tada-U' => '05201',
                'Wundwin' => '05121',
                'Yamethin' => '05271',
            ],
            3 => [
                'Dekkhinathiri' => '15001',
                'Lewe' => '15011',
                'Pyinmana' => '15031',
                'Tatkon' => '15041',
                'Zeyathiri' => '15051',
                'Pobbathiri' => '15061',
                'Zabuthiri' => '15071',
            ],
            4 => [
                'Bogale' => '13071',
                'Danubyu' => '13081',
                'Dedaye' => '13091',
                'Einme' => '13101',
                'Hinthada' => '13031',
                'Ingapu' => '13041',
                'Kyangin' => '13051',
                'Kyaunggon' => '13111',
                'Kyonpyaw' => '13021',
                'Labutta' => '13121',
                'Lemyethna' => '13131',
                'Mawlamyinegyun' => '13141',
                'Maubin' => '13011',
                'Myaungmya' => '13061',
                'Ngapudaw' => '13151',
                'Nyaungdon' => '13161',
                'Pantanaw' => '13171',
                'Pathein' => '13001',
                'Pyapon' => '13181',
                'Thabaung' => '13191',
                'Wakema' => '13201',
                'Yegyi' => '13211',
                'Zalun' => '13221',
            ],
            5 => [
                'Bago' => '08131',
                'Daik-U' => '08161',
                'Htantabin' => '08111',
                'Kawa' => '08141',
                'Kyaukkyi' => '08191',
                'Letpadan' => '08151',
                'Minhla' => '08181',
                'Monyo' => '08121',
                'Nattalin' => '08171',
                'Okpho' => '08101',
                'Padaung' => '08141',
                'Paungde' => '08151',
                'Pyay' => '08171',
                'Shwegyin' => '08181',
                'Taungoo' => '08191',
                'Thanatpin' => '08201',
                'Thayarwady' => '08121',
                'Waw' => '08211',
                'Yedashe' => '08221',
            ],
            6 => [
                'Aunglan' => '06011',
                'Chauk' => '06121',
                'Gangaw' => '06021',
                'Kamma' => '06031',
                'Magway' => '06041',
                'Minbu' => '06051',
                'Minhla' => '06061',
                'Mindon' => '06071',
                'Myaing' => '06081',
                'Myothit' => '06091',
                'Natmauk' => '06101',
                'Ngape' => '06111',
                'Pakokku' => '06131',
                'Pauk' => '06141',
                'Pwintbyu' => '06151',
                'Salin' => '06161',
                'Saw' => '06171',
                'Seikphyu' => '06181',
                'Sidoktaya' => '06191',
                'Sinbaungwe' => '06201',
                'Thayet' => '06211',
                'Tilin' => '06221',
                'Yenangyaung' => '06231',
                'Yesagyo' => '06241',
            ],
            7 => [
                'Banmauk' => '04011',
                'Budalin' => '04021',
                'Chaung-U' => '04031',
                'Hkamti' => '04041',
                'Homalin' => '04051',
                'Indaw' => '04061',
                'Kale' => '04071',
                'Kalewa' => '04081',
                'Kanbalu' => '04091',
                'Katha' => '04101',
                'Kawlin' => '04111',
                'Kyunhla' => '04121',
                'Lahe' => '04131',
                'Mawlaik' => '04141',
                'Monywa' => '04151',
                'Myaung' => '04161',
                'Myinmu' => '04171',
                'Nanyun' => '04181',
                'Pale' => '04191',
                'Phaungbyin' => '04201',
                'Pinlebu' => '04211',
                'Salingyi' => '04221',
                'Shwebo' => '04231',
                'Tamu' => '04241',
                'Taze' => '04251',
                'Tigyaing' => '04261',
                'Wetlet' => '04271',
                'Wuntho' => '04281',
                'Ye-U' => '04291',
                'Yinmabin' => '04301',
            ],
            8 => [
                'Bokpyin' => '17091',
                'Dawei' => '17011',
                'Kawthoung' => '17021',
                'Kyunsu' => '17031',
                'Launglon' => '17041',
                'Myeik' => '17051',
                'Palaw' => '17061',
                'Tanintharyi' => '17071',
                'Thayetchaung' => '17081',
                'Yebyu' => '17092',
            ],
            9 => [
                'Falam' => '09051',
                'Hakha' => '09011',
                'Htantlang' => '09021',
                'Kanpetlet' => '09031',
                'Madupi' => '09041',
                'Mindat' => '09071',
                'Paletwa' => '09081',
                'Thantlang' => '09091',
                'Tedim' => '09101',
            ],
            10 => [
                'Bhamo' => '01031',
                'Chipwi' => '01041',
                'Hpakant' => '01051',
                'Injangyang' => '01061',
                'Kamaing' => '01071',
                'Kanbalu' => '01081',
                'Khaunglanhpu' => '01091',
                'Machanbaw' => '01101',
                'Mansi' => '01111',
                'Mogaung' => '01121',
                'Momauk' => '01131',
                'Myitkyina' => '01011',
                'Putao' => '01141',
                'Shwegu' => '01151',
                'Sumprabum' => '01161',
                'Tanai' => '01171',
                'Tsawlaw' => '01181',
                'Waingmaw' => '01191',
            ],
            11 => [
                'Bawlakhe' => '08011',
                'Demoso' => '08021',
                'Hpasawng' => '08031',
                'Hpruso' => '08041',
                'Loikaw' => '08051',
                'Mese' => '08061',
                'Shadaw' => '08071',
            ],
            12 => [
                'Hlaingbwe' => '12031',
                'Hpapun (Kamamaung)' => '12041',
                'Hpa-An' => '12011',
                'Kawkareik' => '12021',
                'Kyain Seikgyi' => '12051',
                'Myawaddy' => '12061',
                'Thandaunggyi' => '12071',
            ],
            13 => [
                'Bilin' => '13031',
                'Chaungzon' => '13041',
                'Kyaikto' => '13051',
                'Mawlamyine' => '13011',
                'Mudon' => '13021',
                'Paung' => '13061',
                'Thanbyuzayat' => '13071',
                'Thaton' => '13081',
                'Ye' => '13091',
                'Kyaikmaraw' => '13101',
            ],
            14 => [
                'Ann' => '07051',
                'Buthidaung' => '07061',
                'Gwa' => '07071',
                'Kyaukphyu' => '07081',
                'Kyauktaw' => '07091',
                'Maungdaw' => '07101',
                'Minbya' => '07111',
                'Mrauk U' => '07121',
                'Myebon' => '07131',
                'Pauktaw' => '07141',
                'Ponnagyun' => '07151',
                'Ramree' => '07161',
                'Rathedaung' => '07171',
                'Sittwe' => '07011',
                'Thandwe' => '07181',
                'Toungup' => '07191',
                'Munaung' => '07201',
            ],
            15 => [
                'Hopong' => '06011',
                'Hseni' => '06021',
                'Hsipaw' => '06031',
                'Kalaw' => '06041',
                'Kengtung' => '06051',
                'Kyaukme' => '06061',
                'Kunlong' => '06071',
                'Kutkai' => '06081',
                'Kyethi' => '06091',
                'Lashio' => '06101',
                'Langkho' => '06111',
                'Laukkaing' => '06121',
                'Loilen' => '06131',
                'Mabein' => '06141',
                'Maingkaing' => '06151',
                'Maingkwan' => '06161',
                'Maingyang' => '06171',
                'Matman' => '06181',
                'Mawkmai' => '06191',
                'Mongkhet' => '06201',
                'Mongla' => '06211',
                'Mongmit' => '06221',
                'Mongnai' => '06231',
                'Mongpan' => '06241',
                'Mongping' => '06251',
                'Mongton' => '06261',
                'Monghpyak' => '06271',
                'Muse' => '06281',
                'Namhsan' => '06291',
                'Namkham' => '06301',
                'Namtu' => '06311',
                'Nansang' => '06321',
                'Nyaungshwe' => '06331',
                'Panglong' => '06341',
                'Pangsang (Panghsang)' => '06351',
                'Pekon' => '06361',
                'Pinlaung' => '06371',
                'Tachileik' => '06381',
                'Tangyan' => '06391',
                'Taunggyi' => '06401',
                'Thibaw' => '06411',
                'Yaksawk' => '06421',
                'Ywangan' => '06431',
                'Mongmao' => '06441',
                'Mongyawng' => '06451',
                'Hopang' => '06461',
                'Laukkai' => '06471',
                'Konkyan' => '06481',
                'Monghpyak' => '06491',
                'Mongyang' => '06501',
                'Mong Yawng' => '06511',
                'Namhkan' => '06521',
            ]
        ];
        foreach ($townships_and_zip_codes as $state_id => $townships) {
            foreach ($townships as $name => $zip_code) {
                Township::updateOrCreate(
                    [
                        'name' => $name,
                        'state_or_region_id' => $state_id
                    ],
                    ['zip_code' => $zip_code],
                );
            }
        }

        User::factory(5)
            // ->has(UserAddress::factory()->count(1), "user_addresses")
            ->has(Cart::factory()
                ->has(CartItem::factory()->count(5), "cart_items")
                ->count(1))
            // ->has(Order::factory()
            //     // ->has(OrderItem::factory()->count(5), "orderItems")
            //     ->count(3), "orders")
            ->has(WishList::factory()
                ->has(WishListItem::factory()->count(5), "wish_list_items")
                ->count(1), "wish_list")
            ->create();
    }
}
