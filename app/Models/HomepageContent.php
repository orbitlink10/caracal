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
            'topbar_text' => 'Explore Kenya, Tanzania, Uganda and Rwanda with private safari specialists.',
            'brand_name' => 'Caracal Safaris',
            'brand_sub' => 'Tours and Travels',
            'phone_number' => '+254 733 649 245',
            'quote_email' => 'hello@caracal.ke',
            'hero_badge' => 'Tailor-Made Wildlife Journeys',
            'hero_title' => 'Kendirita-style safari mood with stronger wildlife visuals.',
            'hero_description' => 'Plan your adventure with local experts, private 4x4 support, and handpicked camps for unforgettable game drives across East Africa.',
            'hero_image_url' => 'https://images.pexels.com/photos/4577793/pexels-photo-4577793.jpeg?auto=compress&cs=tinysrgb&w=1600',
            'destination_intro' => 'Leading safari packages with curated lodges and beach add-ons. Book premium routes and enjoy a high-impact East Africa experience with flexible itineraries.',
            'destination_cards' => [
                [
                    'title' => 'Seychelles',
                    'subtitle' => 'Beach Escape + Island Safari Extension',
                    'image_url' => 'https://images.pexels.com/photos/247431/pexels-photo-247431.jpeg?auto=compress&cs=tinysrgb&w=1200',
                    'offer_label' => '30% Off',
                ],
                [
                    'title' => 'Mauritius',
                    'subtitle' => 'Indian Ocean Retreat + Wildlife Drive',
                    'image_url' => 'https://images.pexels.com/photos/259411/pexels-photo-259411.jpeg?auto=compress&cs=tinysrgb&w=1200',
                    'offer_label' => '30% Off',
                ],
                [
                    'title' => 'Dubai',
                    'subtitle' => 'City and Desert Stopover Experience',
                    'image_url' => 'https://images.pexels.com/photos/1054655/pexels-photo-1054655.jpeg?auto=compress&cs=tinysrgb&w=1200',
                    'offer_label' => '30% Off',
                ],
                [
                    'title' => 'South Africa',
                    'subtitle' => 'Cape Coastline + Big Five Safari',
                    'image_url' => 'https://images.pexels.com/photos/3014019/pexels-photo-3014019.jpeg?auto=compress&cs=tinysrgb&w=1200',
                    'offer_label' => '30% Off',
                ],
            ],
            'safari_cards' => [
                [
                    'title' => 'Kenya Safaris',
                    'image_url' => 'https://images.pexels.com/photos/750539/pexels-photo-750539.jpeg?auto=compress&cs=tinysrgb&w=1400',
                ],
                [
                    'title' => 'Tanzania Safaris',
                    'image_url' => 'https://images.pexels.com/photos/226445/pexels-photo-226445.jpeg?auto=compress&cs=tinysrgb&w=1400',
                ],
                [
                    'title' => 'Rwanda Safaris',
                    'image_url' => 'https://images.pexels.com/photos/66898/elephant-cub-tsavo-kenya-66898.jpeg?auto=compress&cs=tinysrgb&w=1400',
                ],
            ],
            'contact_title' => 'Ready for your custom safari quote?',
            'contact_text' => 'Share your travel month and group size. We reply within one business day.',
        ];
    }
}

