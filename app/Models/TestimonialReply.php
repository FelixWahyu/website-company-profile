<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TestimonialReply extends Model
{
    protected $fillable = [
        'testimonial_id',
        'user_id', // ID admin yang membalas
        'reply_comment',
    ];

    /**
     * Get the testimonial that this reply belongs to.
     */
    public function testimonial(): BelongsTo
    {
        return $this->belongsTo(Testimonial::class);
    }

    /**
     * Get the user (admin) that wrote the reply.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
