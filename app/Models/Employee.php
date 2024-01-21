<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;
    protected $fillable = ['user_id','ecode', 'designation','qualification',];

    public function employeeRoles()
    {
        return $this->hasMany(EmployeeRole::class);
    }
}
