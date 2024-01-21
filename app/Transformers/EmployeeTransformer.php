<?php
namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Employee;

class EmployeeTransformer extends TransformerAbstract
{

    public function transform(Employee $employee)
    {
        if ($employee instanceof Employee) {
            return [
                'id' => $employee->id,
                'ecode' => $employee->ecode,
                'desigation' => $employee->desigation,
                'qualification' => $employee->qualification,
            ];
        } else if(is_array($employee)) {
            return $employee;
        }
    }
}
