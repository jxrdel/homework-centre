<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidentReport extends Model
{
    use HasFactory;

    protected $table = 'IncidentReports';

    protected $fillable = [
        'ReporterName',
        'JobTitle',
        'ExtNo',
        'IncidentLocation',
        'TimeOfIncident',
        'IncidentDescription',
        'DateOfReport',
        'ReportPath'
    ];
}
