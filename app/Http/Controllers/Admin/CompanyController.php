<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Session;
use App\Models\Company;
use App\Http\Requests\CompanyRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title='Company List';
        $page_description='All company list';
        $companyList = Company::latest()->get();
        return view("admin.company.companylist",compact('page_title','page_description', 'companyList' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Add company';
        $page_description = 'Add company here';
        return view('admin/company/addcompany', compact('page_title', 'page_description'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        // dd($request->all());
         // try {
            /*$validated = $request->validate([
                'title' => 'required|max:255', 
                // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);*/
            $company = new Company;
            $company->name = $request->title;
            $company->email = $request->email;
            $company->website = $request->url;
                $ext = date("Hisd");
                if ($request->hasFile('image')) {
                    $companyImage = $request->file('image');
                    $companyImageName = $ext.'_'.$companyImage->getClientOriginalName();
                    // dd($companyImageName);
                    $companyImagePath = "uploads/company/".date('Y').'/'.date('m');
                    // $companyImagePath = storage_path()."app/public/logo";
                    $companyImageSave = $companyImagePath.'/'.$companyImageName;
                    $companyImage->move($companyImagePath,$companyImageName);
                }
                if (isset($companyImageSave) && $companyImageSave != '') {
                    $company->logo = $companyImageSave;
                }
            $company->save();
            Session::flash('message', 'Successfully added!');
            // return route('user.index');
            return redirect(route('company.index'));
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
        $page_title='Company view';
        $page_description='Company view';

        $empData = Company::where('id', $id)->first();
       
        if($empData != null){
            
            $data = [
                'company' => $empData,
            ];
            
            return view('admin/company/showcompany', compact('page_title', 'page_description','data'));
        }
        else{
            Session::flash('error_msg', 'Your data is not found');
            return redirect(route('company.index'));
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
        $page_title='Edit company';
        $page_description='edit company information';
        $company = Company::find($id);
        return view('admin/company/editCompany' , compact('page_title','page_description','company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        // dd($request->all());
        // try {
            /*$validated = $request->validate([
                'title' => 'required|max:255', 
                // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);*/
            $company = Company::find($id);
            $company->name = $request->title;
            $company->email = $request->email;
            $company->website = $request->url;
                
                $ext = date("Hisd");
                if ($request->hasFile('image')) {
                    
                    if ($company->images != null || $company->images != '') {
                        $destinationPath = $company->images;
                        $fileExists = file_exists($destinationPath);
                        if ($fileExists) {
                            unlink($destinationPath);
                        }
                    }

                    $companyImage = $request->file('image');
                    $companyImageName = $ext.'_'.$companyImage->getClientOriginalName();
                    // dd($companyImageName);
                    $companyImagePath = "uploads/Company/".date('Y').'/'.date('m');
                    // $companyImagePath = storage_path()."/app/public/logo";
                    $companyImageSave = $companyImagePath.'/'.$companyImageName;
                    $companyImage->move($companyImagePath,$companyImageName);
                }
                if (isset($companyImageSave) && $companyImageSave != '') {
                    $company->logo = $companyImageSave;
                }
            $company->save();
            Session::flash('message', 'Successfully added!');
            // return route('user.index');
            return redirect(route('company.index'));
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
        $Delete = Company::findOrFail($id);
        if ($Delete->images != null || $Delete->images != '') {
            $destinationPath = $Delete->images;
            $fileExists = file_exists($destinationPath);
            if ($fileExists) {
                unlink($destinationPath);
            }
        }
        $Delete->delete();
        
        return response()->json(['message' => 'Successfully delete!']);
    }
}
