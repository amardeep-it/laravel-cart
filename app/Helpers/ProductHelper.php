<?php
declare(strict_types=1);

namespace App\Helpers;

class ProductHelper
{
    private const PRODUCT_LIST = [
        'plants0001' => [
            'id' => 1,
            'name' => 'Ugaoo Philodendron Broken Heart Indoor Plant with Self Watering Pot - Monstera Adansonii',
            'description' => '<p>One of the most popular houseplants, this easy growing plant with its heart-shaped leaves that have holes in the leaf blade is a crowd favourite. Quick to grow with delicate trailing vines that can be styled for every space, the Philodendron broken heart will add an instant tropical feel and charm to your space.</p><p>One of the most popular houseplants, this easy growing plant with its heart-shaped leaves that have holes in the leaf blade is a crowd favourite. Quick to grow with delicate trailing vines that can be styled for every space, the Philodendron broken heart will add an instant tropical feel and charm to your space.</p>',
            'imageURL' => '610hQdYVcdL._SX679_.jpg',
            'price' => '449.00',
            'tax' => '6',
        ],
        'plants0002' => [
            'id' => 2,
            'name' => 'Ugaoo Good Luck Indoor Plants For Home With Pot - Jade Plant & Money Plant Variegated',
            'description' => 'Combination of Money Plant Variegated and Jade Plant. According to Feng Shui Jade bring fortune, health, wealth, abundance and prosperity to your home or office. The jade plant is a beautiful succulent and is considered very auspicious. The Jade plant is thought to activate financial energies. The succulent\'s vibrant green leaves are symbolic of growth and renewal...',
            'imageURL' => '71IpCWuq6ML._SX679_.jpg',
            'price' => '599.00',
            'tax' => '9',
        ],
        'plants0003' => [
            'id' => 3,
            'name' => 'Nurturing Green Air Purifying Live Indoor ZZ Plant in White Fiber Pot (Size: Small; 6+ Stems)',
            'description' => '<p>About The Plant : Also known as Zamioculcas Zamiifolia, this houseplant is so easy to maintain & tolerates low light. It has dark green leaves giving it attractive. It makes an excellent home & office plant.</p>',
            'imageURL' => '71x311i9AWL._SY879_.jpg',
            'price' => '449.00',
            'tax' => '12',
        ],
        'plants0004' => [
            'id' => 4,
            'name' => 'UGAOO Boxwood Buxus Natural Live Indoor Plant with Pot',
            'description' => '<p>Line up the outdoor seating with Boxwood Buxus trimmed to perfect spheres, planted in cement pots. They also make for great additions to covered patios in pedestal planters. Use them as borders in your outdoor gardens or to line the driveway or aisles.</p>',
            'imageURL' => '61NBItQCmuL._SL1200_.jpg',
            'price' => '449.00',
            'tax' => '15',
        ],
        'plants0005' => [
            'id' => 5,
            'name' => 'Ugaoo Stromanthe Triostar Plant with Self Watering Pot - Medium',
            'description' => '<p>Stromanthe Triostar with its beautiful leaves and its ability to thrive in low light is a perfect plant for home decor.</p>',
            'imageURL' => '61JM33oe4QL._SL1500_.jpg',
            'price' => '300.00',
            'tax' => '18',
        ],
    ];

    public static function getProducts(): array
    {
        return self::PRODUCT_LIST;
    }

    public static function getProduct(string $sku): array
    {
        if (array_key_exists($sku,self::PRODUCT_LIST)) {
            return [
                'name' => self::PRODUCT_LIST[$sku]['name'],
                'price' => self::PRODUCT_LIST[$sku]['price'],
                'tax' => self::PRODUCT_LIST[$sku]['tax'],
            ];
        }

        return [];
    }

    public static function getProductDetails(string $sku): array
    {
        if (array_key_exists($sku,self::PRODUCT_LIST)) {
            return self::PRODUCT_LIST[$sku];
        }

        return [];
    }
}
