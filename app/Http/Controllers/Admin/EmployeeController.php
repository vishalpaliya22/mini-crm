<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Employee;
use App\Models\Company;
use Carbon\Carbon;
use Session;
use App\Http\Requests\EmpRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title='Employee List';
        $page_description='All employee list';
        // $employeeList = Employee::company()->get();
        
        $employeeList = DB::table('companies AS cp')
            ->join('employees AS emp', 'emp.company_id', '=', 'cp.id')
            ->get(['cp.name as CompanyName', 'emp.id', 'emp.first_name', 'emp.last_name', 'emp.email', 'emp.phone_no']);
            
        return view("admin.employee.employeelist",compact('page_title','page_description', 'employeeList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Add Employee';
        $page_description = 'Add employee here';
        $companyList = Company::latest()->get();
        return view('admin/employee/addemployee', compact('page_title', 'page_description', 'companyList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpRequest $request)
    {
            // dd($request->all());
        // try {
           /* $validated = $request->validate([
                'FName' => 'required|max:255', 
                'LName' => 'required', 
            ]);*/
            $emp = new Employee;
            $emp->company_id = $request->CompanyName;
            $emp->first_name = $request->FName;
            $emp->last_name = $request->LName;
            $emp->email = $request->Email;
            $emp->phone_no = $request->phoneNumber;
            $emp->save();
            Session::flash('message', 'Successfully added!');
            return redirect(route('employee.index'));
        /*}
        catch(\Exception $ex) {
            $msg = $ex->getMessage();
            Session::flash('message', $msg);
            return redirect()->back();   
        }*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page_title='Employee view';
        $page_description='Employee view';

        // $empData = Employee::where('id', $id)->first();
        $empData = DB::table('companies AS cp')
            ->join('employees AS emp', 'emp.company_id', '=', 'cp.id')
            ->first(['cp.name as CompanyName', 'emp.id', 'emp.first_name', 'emp.last_name', 'emp.email', 'emp.phone_no']);
        
        if($empData != null){
            
            $data = [
                'employee' => $empData,
            ];
            
            return view('admin/employee/showemployee', compact('page_title', 'page_description','data'));
        }
        else{
            Session::flash('error_msg', 'Your data is not found');
            return redirect(route('employee.index'));
        }
         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_title='Edit eEmployee';
        $page_description='edit employee information';
        $employee = Employee::find($id);
        $companyList = Company::latest()->get();
        return view('admin/employee/editemployee' , compact('page_title','page_description','employee','companyList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmpRequest $request, $id)
    {
        // try {
            /*$validated = $request->validate([
                'FName' => 'required|max:255', 
                'LName' => 'required', 
            ]);*/
            $emp = Employee::find($id);
            $emp->company_id = $request->CompanyName;
            $emp->first_name = $request->FName;
            $emp->last_name = $request->LName;
            $emp->email = $request->Email;
            $emp->phone_no = $request->phoneNumber;
            $emp->save();
            Session::flash('message', 'Successfully added!');
            return redirect(route('employee.index'));
        /*}
        catch(\Exception $ex) {
            $msg = $ex->getMessage();
            Session::flash('message', $msg);
            return redirect()->back();   
        }*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Delete = Employee::findOrFail($id);
        $Delete->delete();
        // Employee::destroy($id); 
        return response()->json(['message' => 'Successfully delete!']);
    }
}
