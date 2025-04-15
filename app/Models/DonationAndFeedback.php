<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationAndFeedback extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'donation_and_feedbacks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'donation_amount',
        'payment_method',
        'proof_of_payment',
        'developer_message',
        'feedback_content',
        'feedback_type',
    ];

    /**
     * Get the user that owns the donation or feedback.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
