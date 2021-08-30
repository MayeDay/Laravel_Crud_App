<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Exception;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
  
  public function index(){
    $employees = DB::table('employees')->get();

        return view($employees);
    }

    public function getEmployee(){
      $employees = Employee::all();
      return view('welcome',['employees' => $employees]);
    }

    public function getEmployeeId($id){
      $employee = Employee::find($id);

      if(is_null($employee)){
        return response()->json(['message' => 'Employee Not Found'], 404);

      }
      return response()->json($employee::find($id), 200);
    }
    

    public function addEmployee(Request $request){

      try{
      $employee = Employee::create($request->all());

      }catch(Exception $e){
        return redirect("/");

      }

      return redirect("/");

    }


    public function updateEmployee($id, Request $request){
      $employee = Employee::find($id);

      if(is_null($employee)){
        return response()->json(['message' => 'Employee Not Found'], 404);
      }

      $employee->update($request->all());

      return redirect("/");

    }

    public function deleteEmployee( $id){

      $employee = Employee::find($id);
      if(is_null($employee)){
        return response()->json(['message' => 'Employee Not Found'], 404);
      }

      $employee->delete();
      return redirect("/");

    }
}
