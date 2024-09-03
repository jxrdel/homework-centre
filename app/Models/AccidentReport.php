<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccidentReport extends Model
{
    use HasFactory;

    protected $table = 'AccidentReports';

    protected $fillable = [
        'ChildName',
        'ChildAge',
        'AccidentLocation',
        'TimeOfAccident',
        'AccidentDescription',
        'InjuryDescription',
        'MedicalReport',
        'RemedialActions',
        'ParentNotified',
        'StaffOnDuty',
        'ReporterName',
        'JobTitle',
        'DateOfReport',
        'ReportPath',
    ];
}
