<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BusinessCardOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'business_card_id',
        'order_number',
        'paper_stock',
        'corner_style',
        'text_color',
        'background_color',
        'quantity',
        'upload_files',
        'options_data',
        'base_price',
        'total_price',
        'status',
        'notes',
        'payment_intent_id'
    ];

    protected $casts = [
        'upload_files' => 'array',
        'options_data' => 'array',
        'base_price' => 'decimal:2',
        'total_price' => 'decimal:2',
    ];

    /**
     * Get the user that owns the order.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the business card that this order belongs to.
     */
    public function businessCard(): BelongsTo
    {
        return $this->belongsTo(BusinessCard::class);
    }

    /**
     * Generate unique order number
     */
    public static function generateOrderNumber()
    {
        do {
            $orderNumber = 'BC-' . date('Y') . '-' . str_pad(rand(1, 999999), 6, '0', STR_PAD_LEFT);
        } while (self::where('order_number', $orderNumber)->exists());
        
        return $orderNumber;
    }

    /**
     * Calculate total price based on quantity and options
     */
    public static function calculateTotal($quantity, $paperStock = null, $cornerStyle = null)
    {
        // Base pricing per 100 cards
        $basePrices = [
            'matte' => 25.00,
            'glossy' => 30.00,
            'premium' => 45.00,
            'kraft' => 35.00,
            'plastic' => 53.00,
        ];
        
        $basePrice = $basePrices[$paperStock] ?? 25.00;
        
        // Calculate quantity multiplier (bulk discounts)
        $quantityMultiplier = 1.0;
        if ($quantity <= 100) {
            $quantityMultiplier = $quantity / 100;
        } elseif ($quantity <= 500) {
            $quantityMultiplier = ($quantity / 100) * 0.8; // 20% discount
        } elseif ($quantity <= 1000) {
            $quantityMultiplier = ($quantity / 100) * 0.7; // 30% discount
        } elseif ($quantity <= 2000) {
            $quantityMultiplier = ($quantity / 100) * 0.6; // 40% discount
        } elseif ($quantity <= 5000) {
            $quantityMultiplier = ($quantity / 100) * 0.5; // 50% discount
        } else {
            $quantityMultiplier = ($quantity / 100) * 0.4; // 60% discount for large orders
        }
        
        $totalPrice = $basePrice * $quantityMultiplier;
        
        // Add rounded corner cost
        if ($cornerStyle === 'rounded') {
            $totalPrice += $quantity * 0.02; // $0.02 per card for rounded corners
        }
        
        return round($totalPrice, 2);
    }
}