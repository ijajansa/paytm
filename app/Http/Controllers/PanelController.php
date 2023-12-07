<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoanApplication;
use App\Models\LoanMaster;
use App\Models\User;
use Auth;


class PanelController extends Controller
{
    public function loadLoanPage(Request $request)
    {
    	if(!isset($request->type))
    	{
            $data = LoanMaster::where('is_active',1)->withCount('leads')->orderBy('name','ASC')->get();
            $applications = LoanApplication::leftJoin('loan_masters','loan_masters.id','loan_applications.type')->join('users','users.id','loan_applications.agent_id')->orderBy('loan_applications.created_at','DESC');
            if(Auth::user()->role_id==2)
            {
                $arr=[];
                $ids = User::where('agent_id',Auth::user()->id)->pluck('id');
                array_push($arr,Auth::user()->id);
                foreach($ids as $id)
                {
                    array_push($arr,$id);
                }
                $applications = $applications->whereIn('loan_applications.agent_id',$arr);
            }
            else
            {
                $applications = $applications->where('loan_applications.agent_id',Auth::user()->id);
            }
            $applications = $applications->limit(10)->select('loan_applications.*','loan_masters.name as loan_name','users.first_name as agent_first','users.last_name as agent_last')->get();
	    	return view('front.loan-page',compact('data','applications'));
    	}
    	else
    	{
            $data = LoanMaster::find($request->type);
    		return view('front.add-loan',compact('data'));
    	}
    }
    public function updateDSA(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'mobile_number' => 'required|digits:10',
            'whatsapp_number' => 'required|digits:10',
            'pan_number' => 'required|regex:/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/',
            'aadhar_number' => 'required|digits:12|numeric',
            'gst_type' => 'required',
            'gst_number' => 'required',
            'address' => 'required',
            'pincode' => 'required|numeric|digits:6',
            'city' => 'required|regex:/^[a-zA-Z]+$/u',
            'state' => 'required|regex:/^[a-zA-Z]+$/u',
            'country' => 'required|regex:/^[a-zA-Z]+$/u',
            'office_address' => 'required',
            'office_pincode' => 'required|numeric|digits:6',
            'office_city' => 'required|regex:/^[a-zA-Z]+$/u',
            'office_state' => 'required|regex:/^[a-zA-Z]+$/u',
            'office_country' => 'required|regex:/^[a-zA-Z]+$/u',
            'account_type' => 'required',
            'account_name' => 'required',
            'bank_name' => 'required',
            'ifsc_code' => 'required',
            'account_number' => 'required'
        ]);

        $record = User::find($request->id);
        if($record)
        {
            $record->first_name = $request->first_name;
            $record->middle_name = $request->middle_name;
            $record->last_name = $request->last_name;
            $record->mobile_number = $request->mobile_number;
            $record->whatsapp_number = $request->whatsapp_number;
            $record->pan_number = $request->pan_number;
            $record->aadhar_number = $request->aadhar_number;
            $record->gst_type = $request->gst_type;
            $record->gst_number = $request->gst_number;
            $record->address = $request->address;
            $record->pincode = $request->pincode;
            $record->city = $request->city;
            $record->state = $request->state;
            $record->country = $request->country;
            $record->office_address = $request->office_address;
            $record->office_pincode = $request->office_pincode;
            $record->office_city = $request->office_city;
            $record->office_state = $request->office_state;
            $record->office_country = $request->office_country;
            $record->account_type = $request->account_type;
            $record->account_name = $request->account_name;
            $record->bank_name = $request->bank_name;
            $record->ifsc_code = $request->ifsc_code;
            $record->account_number = $request->account_number;
            $record->save();

            return redirect()->back()->with('success','User details updated successfully');
        }
            return redirect()->back()->with('error','Something went wrong');
        

    }


    public function uploadLoan(Request $request)
    {
    	$request->validate([
    		'requested_amount' => 'required|min:50000|numeric',
    		'type' => 'required',
    		'first_name' => 'required',
    		'middle_name' => 'nullable',
    		'last_name' => 'required',
    		'email' => 'required|email',
    		'mobile_number' => 'required|digits:10',
    		'pan_number' => 'required|regex:/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/',
    		'requested_duration' => 'required',
    		'dob' => 'required',
    		'employment_type' => 'required',
    		'company_name' => 'required',
    		'company_type' => 'required',
    		'income_salary' => 'required',
    		'residence_pincode' => 'required',
    		'permanent_pincode' => 'required',
    		'loan_mode' => 'required'
    	],[
    		'dob.required' => 'The date of birth field is required.'
    	]);
    	$data = $request->all();
    	unset($data['_token']);
    	$data['agent_id'] = \Auth::user()->id ?? 0;

    	$record = LoanApplication::create($data);

    	return redirect('view-loan/'.$record->id)->with('success','Loan Application Uploaded Successfully');
    }

    public function viewLoanLead($id)
    {
        $data = LoanApplication::where('loan_applications.id',$id)->join('loan_masters','loan_masters.id','loan_applications.type')->select('loan_applications.*','loan_masters.name as loan_name')->first();
        return view('front.loan-view',compact('data'));
    }
    public function loadChangePasswordPage()
    {
        return view('loan-masters.add');
    }

    public function changePassword(Request $request)
    {
        $id = Auth::user()->id;

        $request->validate([
            'email' => 'required|unique:users,email,'.$id
        ]);
        $data = User::find($id);
        $data->full_name = $request->full_name;
        $data->email = $request->email;
        if($request->password!=null)
        {
            $data->password = \Hash::make($request->password);
            $data->visible_password = $request->password;
        }
        $data->save();
        
        if($request->password!=null)
        {
            Auth::logout();
            return redirect('/');
        }
        return redirect()->back()->with('success','Username and password changed successfully');
    }
}
