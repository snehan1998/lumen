<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\EmployeeRepository;
use App\Transformers\EmployeeTransformer;
use App\Transformers\UserTransformer;
//use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use Laravel\Lumen\Routing\Controller as BaseController;
use League\Fractal\Resource\Collection;

class EmployeeController extends BaseController {

    protected $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function index()
    {
        $employees = $this->employeeRepository->getemployee();

        $manager = new Manager();
        $resource = new Collection($employees, new EmployeeTransformer());

        return response()->json($manager->createData($resource)->toArray());
    }

    public function findById($id)
    {
        $employees = $this->employeeRepository->getemployeeById($id);

        $manager = new Manager();
        $resource = new Collection($employees, new EmployeeTransformer());

        return response()->json($manager->createData($resource)->toArray());
    }

    public function store(Request $request)
    {
       /* $userData = $request->input('user');
        $employeeData = $request->input('employee');

        $user = $this->employeeRepository->addEmployee($userData, $employeeData);

        return fractal($user, new UserTransformer())->parseIncludes(['employee'])
            ->merge(fractal($user->employee, new EmployeeTransformer())->toArray())
            ->toArray();*/
        $dataa = $request->all();
        $employee = $this->employeeRepository->addEmployee($dataa);

        return response()->json($employee, 201);
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'ecode' => 'required',
            'desigation' => 'required',
            'qualification' => 'required',
        ]);

        $employee = $this->employeeRepository->updateEmployee($id, $data);

        return response()->json($employee, 200);
    }
    public function destroy($id)
    {
        $this->employeeRepository->deleteEmployee($id);
        return response()->json(['message' => 'Employee deleted successfully'], 200);
    }
}
