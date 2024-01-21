<?php
namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\EmployeeRole;

class EmployeeRoleTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['employee', 'role'];

    public function transform(EmployeeRole $employeeRole)
    {
        return [
            'id' => $employeeRole->id,
            'employee_id' => $employeeRole->employee_id,
            'role_id' => $employeeRole->role_id
        ];
    }

    public function includeEmployee(EmployeeRole $employeeRole)
    {
        $employee = $employeeRole->employee;
        return $this->item($employee, new EmployeeTransformer());
    }

    public function includeRole(EmployeeRole $employeeRole)
    {
        $role = $employeeRole->role;
        return $this->item($role, new RoleTransformer());
    }
}
