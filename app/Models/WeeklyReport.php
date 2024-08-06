<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyReport extends Model
{
    use HasFactory;

    protected $table = 'WeeklyReports'; // Table name

    protected $primaryKey = 'WeeklyReportID'; // Primary key column name

    protected $fillable = [
        'StartDate',
        'EndDate',
        'Objectives',
        'ActivitiesCompleted',
        'Challenges'
    ];
}
