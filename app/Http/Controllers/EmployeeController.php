<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('admin.index',[
            "employees" => Employee::orderBy('id', 'asc')->paginate(10)
        ]);
    }

    public function AddEmployee()
    {
        Session::put('userRole', false);
        //check role
        if(Auth::user()->role != "manager")
        {
            Session::put('userRole', true);
        }

        return view('admin.AddEmployee');
    }

    public function AddEmployeePost(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
        ]);

        try {

            //check if firstname and lastname is already taken
            $employeeCheck = Employee::where('first_name', $request->first_name)
                                        ->where('last_name', $request->last_name)
                                        ->count();
            if($employeeCheck > 0){
                return redirect()->route('addemployee')->with('error', 'Duplicate Employee!')->withInput();
            }

            //insert data
            $employee = new Employee();

            $employee->first_name = $request->first_name;
            $employee->last_name = $request->last_name;

            //check role
            if(Session::get('userRole'))
            {
                // i make this fixed so that it cannot be editable in the inspect element if the role is not manager!
                $employee->position = Auth::user()->role;
            }else {
                $employee->position = $request->position;
            }

            $employee->save();

            return redirect()->route('addemployee')->with('message', 'Employee Added!');

        } catch (\Exception $e) {
            return $e->getMessage();
        }


    }

    public function EditEmployee($id)
    {
        //check for id in the URL
        if(!$id)
        {
            return redirect()->back();
        }

        try {

            //check id from URL
            $employee = Employee::find($id);
            if($employee)
            {
                Session::put('userRole', false);
                //check role
                if(Auth::user()->role != "manager")
                {
                    if(Auth::user()->role == $employee->position)
                    {
                        Session::put('userRole', true);
                    }else{
                        return redirect()->back()->with('warning', 'Cannot edit other role!');
                    }
                }

                return view('admin.EditEmployee',[
                    "id" => $id,
                    "employee" => $employee
                ]);
            }else
            {
                return redirect()->back();
            }

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function EditEmployeePost(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
        ]);

        try {

            //check id then update
            $employee = Employee::find($id);

            $employee->first_name = $request->first_name;
            $employee->last_name = $request->last_name;

            //check role
            if(Session::get('userRole'))
            {
                // i make this fixed so that it cannot be editable in the inspect element if the role is not manager!
                $employee->position = Auth::user()->role;
            }else {
                $employee->position = $request->position;
            }

            $employee->save();

            return redirect()->route('editemployee', ["id" => $id])->with('message', 'Employee Updated!');

        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public function DeleteEmployeePost(Request $request)
    {
        $request->validate([
            'delete' => 'required|integer'
        ]);

        try {

            Session::put('userRole', false);

            $employee = Employee::find($request->delete);
            //check role and allowed only same role tobe deleted
            if(Auth::user()->role != "manager")
            {
                if(Auth::user()->role == $employee->position)
                {
                    $employee->delete();
                }else{
                    return redirect()->back()->with('warning', 'Cannot delete other role!');
                }
            }else
            {
                $employee->delete();
            }

            return redirect()->route('admin')->with('message', 'Employee Deleted!');

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
