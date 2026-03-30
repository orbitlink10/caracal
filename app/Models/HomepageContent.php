<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageContent extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'topbar_text',
        'brand_name',
        'brand_sub',
        'phone_number',
        'quote_email',
        'hero_badge',
        'hero_title',
        'hero_description',
        'hero_image_url',
        'destination_intro',
        'destination_cards',
        'safari_cards',
        'contact_title',
        'contact_text',
        'updated_by',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'destination_cards' => 'array',
            'safari_cards' => 'array',
        ];
    }

    /**
     * Return the single homepage content record, creating it with defaults if missing.
     */
    public static function current(): self
    {
        $content = static::query()->first();

        if ($content === null) {
            return static::create(static::defaults());
        }

        return $content;
    }

    /**
     * Default homepage content values.
     *
     * @return array<string, mixed>
     */
    public static function defaults(): array
    {
        return [
            'topbar_text' => 'Compare handpicked Kenya safari packages with local planners, 4x4 guides and flexible departures.',
            'brand_name' => 'Caracal Expenditions',
            'brand_sub' => 'Compare East African Safari Tours',
            'phone_number' => '+254 733 649 245',
            'quote_email' => 'hello@caracal.ke',
            'hero_badge' => 'Locally planned 4x4 wildlife journeys',
            'hero_title' => 'Handpicked Kenya safari itineraries for every travel style.',
            'hero_description' => 'Kenya is home to sweeping savannah grasslands, Rift Valley lakes, big cat country and classic Big Five game drives. Compare mid-range, luxury and budget routes planned by local experts and choose the package that matches your comfort level, timing and starting point.',
            'hero_image_url' => 'https://images.pexels.com/photos/4577793/pexels-photo-4577793.jpeg?auto=compress&cs=tinysrgb&w=1600',
            'destination_intro' => 'Use the shortlist to compare prices, lodge styles, operators and starting cities before requesting a custom quote.',
            'destination_cards' => [
                [
                    'title' => '7-Day Great Migration Mid-Range Safari',
                    'subtitle' => 'Migration season favorite',
                    'image_url' => 'https://images.pexels.com/photos/4577793/pexels-photo-4577793.jpeg?auto=compress&cs=tinysrgb&w=1400',
                    'offer_label' => 'Best Seller',
                    'duration_days' => 7,
                    'country' => 'Kenya',
                    'start_location' => 'Nairobi',
                    'tour_type' => 'Private tour',
                    'comfort' => 'Mid-range',
                    'accommodation' => 'Lodge & Tented Camp',
                    'group_size_note' => 'Max 6 guests',
                    'price_from' => 3136,
                    'price_to' => 3304,
                    'visits' => 'Nairobi, Amboseli, Lake Naivasha, Lake Nakuru, Maasai Mara',
                    'operator_name' => 'Osnet Tours & Travel',
                    'operator_logo_url' => '',
                    'operator_rating' => 4.8,
                    'review_count' => 41,
                ],
                [
                    'title' => '7-Day Classic Kenya Luxury Jeep Safari',
                    'subtitle' => 'Private lodge-and-camp circuit',
                    'image_url' => 'https://images.pexels.com/photos/226445/pexels-photo-226445.jpeg?auto=compress&cs=tinysrgb&w=1400',
                    'offer_label' => 'Top Rated',
                    'duration_days' => 7,
                    'country' => 'Kenya',
                    'start_location' => 'Nairobi',
                    'tour_type' => 'Private tour',
                    'comfort' => 'Luxury',
                    'accommodation' => 'Lodge & Tented Camp',
                    'group_size_note' => 'Private 4x4 Jeep',
                    'price_from' => 2279,
                    'price_to' => 3315,
                    'visits' => 'Nairobi, Maasai Mara, Lake Nakuru, Lake Naivasha, Amboseli',
                    'operator_name' => 'Ramble Africa Safaris',
                    'operator_logo_url' => '',
                    'operator_rating' => 4.9,
                    'review_count' => 38,
                ],
                [
                    'title' => '5-Day Nakuru, Naivasha and Mara Budget Safari',
                    'subtitle' => 'Shared departure with strong value',
                    'image_url' => 'https://images.pexels.com/photos/750539/pexels-photo-750539.jpeg?auto=compress&cs=tinysrgb&w=1400',
                    'offer_label' => 'Budget Pick',
                    'duration_days' => 5,
                    'country' => 'Kenya',
                    'start_location' => 'Nairobi',
                    'tour_type' => 'Shared tour',
                    'comfort' => 'Budget',
                    'accommodation' => 'Tented Camp & Hotel',
                    'group_size_note' => 'Max 7 guests per vehicle',
                    'price_from' => 560,
                    'price_to' => 661,
                    'visits' => 'Nairobi, Lake Nakuru, Lake Naivasha, Maasai Mara',
                    'operator_name' => 'Axis Africa Expedition & Safaris',
                    'operator_logo_url' => '',
                    'operator_rating' => 5.0,
                    'review_count' => 126,
                ],
                [
                    'title' => '7-Day Kings of the Savanna Luxury Safari',
                    'subtitle' => 'Big Five lodges with scenic drives',
                    'image_url' => 'https://images.pexels.com/photos/66898/elephant-cub-tsavo-kenya-66898.jpeg?auto=compress&cs=tinysrgb&w=1400',
                    'offer_label' => 'Best Seller',
                    'duration_days' => 7,
                    'country' => 'Kenya',
                    'start_location' => 'Nairobi',
                    'tour_type' => 'Private tour',
                    'comfort' => 'Luxury',
                    'accommodation' => 'Lodge & Tented Camp',
                    'group_size_note' => 'Private departure',
                    'price_from' => 3573,
                    'price_to' => 5141,
                    'visits' => 'Nairobi, Maasai Mara, Lake Nakuru, Amboseli',
                    'operator_name' => 'Spirit of Kenya',
                    'operator_logo_url' => '',
                    'operator_rating' => 5.0,
                    'review_count' => 651,
                ],
            ],
            'safari_cards' => [
                [
                    'title' => '7-Day Wild Wonders of Kenya Luxury Safari',
                    'subtitle' => 'Designer lodges and big-cat country',
                    'image_url' => 'https://images.pexels.com/photos/4577793/pexels-photo-4577793.jpeg?auto=compress&cs=tinysrgb&w=1400',
                    'offer_label' => 'Luxury+',
                    'duration_days' => 7,
                    'country' => 'Kenya',
                    'start_location' => 'Mombasa',
                    'tour_type' => 'Private tour',
                    'comfort' => 'Luxury+',
                    'accommodation' => 'Luxury Lodge & Tented Camp',
                    'group_size_note' => 'Private fly-in option',
                    'price_from' => 2706,
                    'price_to' => 3768,
                    'visits' => 'Mombasa, Amboseli, Lake Naivasha, Lake Nakuru, Maasai Mara, Nairobi',
                    'operator_name' => 'Extra Miles Unique Adventures',
                    'operator_logo_url' => '',
                    'operator_rating' => 4.7,
                    'review_count' => 158,
                ],
                [
                    'title' => '7-Day Roaring Kenya Mid-Range Safari',
                    'subtitle' => 'Balanced pace with strong game viewing',
                    'image_url' => 'https://images.pexels.com/photos/750539/pexels-photo-750539.jpeg?auto=compress&cs=tinysrgb&w=1400',
                    'offer_label' => 'Top Rated',
                    'duration_days' => 7,
                    'country' => 'Kenya',
                    'start_location' => 'Malindi',
                    'tour_type' => 'Private tour',
                    'comfort' => 'Mid-range',
                    'accommodation' => 'Lodge & Tented Camp',
                    'group_size_note' => 'Window-seat guarantee',
                    'price_from' => 2070,
                    'price_to' => 2840,
                    'visits' => 'Malindi, Maasai Mara, Lake Nakuru, Amboseli, Nairobi',
                    'operator_name' => 'Spirit of Kenya',
                    'operator_logo_url' => '',
                    'operator_rating' => 5.0,
                    'review_count' => 651,
                ],
                [
                    'title' => '6-Day Budget Mara, Nakuru and Amboseli Circuit',
                    'subtitle' => 'Shared departure for first-time safari travelers',
                    'image_url' => 'https://images.pexels.com/photos/226445/pexels-photo-226445.jpeg?auto=compress&cs=tinysrgb&w=1400',
                    'offer_label' => 'Value',
                    'duration_days' => 6,
                    'country' => 'Kenya',
                    'start_location' => 'Nairobi',
                    'tour_type' => 'Shared tour',
                    'comfort' => 'Budget',
                    'accommodation' => 'Tented Camp & Hotel',
                    'group_size_note' => 'Max 8 guests per vehicle',
                    'price_from' => 950,
                    'price_to' => 1150,
                    'visits' => 'Nairobi, Maasai Mara, Nakuru, Amboseli, Nairobi',
                    'operator_name' => 'Axis Africa Expedition & Safaris',
                    'operator_logo_url' => '',
                    'operator_rating' => 5.0,
                    'review_count' => 2793,
                ],
                [
                    'title' => '5-Day Coast to Savannah Fly-In Safari',
                    'subtitle' => 'Beach start with a fast wildlife escape',
                    'image_url' => 'https://images.pexels.com/photos/66898/elephant-cub-tsavo-kenya-66898.jpeg?auto=compress&cs=tinysrgb&w=1400',
                    'offer_label' => 'Fly-In',
                    'duration_days' => 5,
                    'country' => 'Kenya',
                    'start_location' => 'Diani Beach',
                    'tour_type' => 'Private tour',
                    'comfort' => 'Luxury',
                    'accommodation' => 'Boutique Camp & Lodge',
                    'group_size_note' => 'Ideal for couples',
                    'price_from' => 1880,
                    'price_to' => 2490,
                    'visits' => 'Diani Beach, Tsavo East, Amboseli, Nairobi',
                    'operator_name' => 'Pavillion Safaris and Tours',
                    'operator_logo_url' => '',
                    'operator_rating' => 5.0,
                    'review_count' => 140,
                ],
            ],
            'contact_title' => 'Ready for your custom safari quote?',
            'contact_text' => 'Share your travel month and group size. We reply within one business day.',
        ];
    }
}

