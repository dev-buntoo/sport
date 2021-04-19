<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
        'view_member','create_member','edit_member',
        'delete_member','view_payroll','edit_payroll',
        'view_appointments','edit_appointments','manage_documents',
        'view_roles','edit_roles','view_report'
    ];
}
