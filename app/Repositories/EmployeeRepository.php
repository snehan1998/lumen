<?php
namespace App\Repositories;

use App\Models\Employee;
use App\Models\User;
use App\Transformers\EmployeeTransformer;

class EmployeeRepository
{
    public function getemployee()
    {
        return Employee::all();
    }
    public function getemployeeById($id)
    {
        $employees = Employee::find($id);
        return fractal($employees, new EmployeeTransformer())->toArray();
    }
    public function addEmployee($employeeData)
    {
       // return $userData;
     //   $user = User::create($userData);
    //  if (isset($employeeData['user_id'])) {
    //     return $employeeData['user_id'];
    // } else {
    //     return 'User ID not found in $employeeData';
    // }


            $employee = new Employee;
        $employee->user_id = $employeeData['user_id'];
        $employee->ecode = $employeeData['ecode'];
        $employee->desigation = $employeeData['desigation'];
        $employee->qualification = $employeeData['qualification'];
        $employee->save();

        return $employee;
    }
    public function updateEmployee($id, $data)
    {
        $employee = Employee::find($id);

        if (!$employee) {
        }

        $employee->update([
            'ecode' => $data['ecode'],
            'desigation' => $data['desigation'],
            'qualification' => $data['qualification'],
        ]);

        return fractal($employee, new EmployeeTransformer())->toArray();
    }
    public function deleteEmployee($id)
    {
        $employee = Employee::find($id);
        if (!$employee) {
        }
        $employee->delete();
        return ['message' => 'Employee deleted successfully'];
    }

}
