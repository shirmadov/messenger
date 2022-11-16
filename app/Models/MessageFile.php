<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageFile extends Model
{
    use HasFactory;
    protected $table = 'message_files';
    protected $fillable = [
        'message_id',
        'document_name',
        'document_path',
        'document_type',
    ];
}
