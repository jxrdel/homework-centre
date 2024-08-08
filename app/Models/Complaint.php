<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $table = 'Complaints';

    protected $fillable = [
        'DateOfComplaint',
        'VOSCRep',
        'FacilitiesManager',
        'HSRep',
        'ComplaintType',
        'ComplaintLocation',
        'ComplaintDetails',
        'AdditionalInfo',
        'VOSCRepDateReferred',
        'FacilitiesManagerDateReferred',
        'HSRepDateReferred',
        'ReporterName',
        'ReporterTelNo',
        'ReporterExt',
        'ReporterEmail'
    ];
}
