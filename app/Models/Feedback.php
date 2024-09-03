<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    
    protected $table = 'FeedbackForms'; // Table name

    protected $primaryKey = 'FeedbackFormID'; // Primary key column name

    protected $fillable = [
        'Compliments',
        'Complaints',
        'Suggestions',
        'ActivitySatisfaction',
        'OverallSatisfaction',
        'ChildSatisfaction',
        'ParentID'
    ];
}
