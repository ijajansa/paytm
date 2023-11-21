<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\User;
use App\Models\Customer;

class AgentController extends Controller
{
    public function all(Request $request)
    {
    	if($request->ajax())
    	{
    		$data = User::where('role_id',2)->orderBy('id','ASC');
    		return DataTables::of($data)
    		->addColumn('status',function($data){
    			if($data->is_active ==1)
    			{
    				return '<button onclick="changeStatus('.$data->id.')" class="btn btn-success btn-sm">Active</button>';
    			}
    			else
    			{
    				return '<button onclick="changeStatus('.$data->id.')" class="btn btn-danger btn-sm">Inactive</button>';
    			}
    		})
    		->addColumn('action',function($data){
    			return '<a href="'.url('agents/edit').'/'.$data->id.'"><button class="btn btn-primary btn-sm"><i class="icon ni ni-edit"></i>&nbsp;View</button></a>';
    		})
    		->rawColumns(['status','action'])->make(true);
    	}

    	return view('agents.all');
    }

    public function add()
    {
    	return view('agents.add');
    }

    public function insert(Request $request)
    {

    	$request->validate([
    		'full_name' => 'required',
    		'email' => 'required|email|unique:users',
    		'mobile_number' => 'required|unique:users,mobile_number|digits:10',
    		'pan_number' => 'required|regex:/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/',
    		'aadhar_number' => 'required|digits:12',
    		'password' => 'required|min:8',
    		'address' => 'required',
    		'pincode' => 'required',
    		'city' => 'required',
            'state' => 'required',
            'street' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'bank_name' => 'required',
            'accountant_name' => 'required',
            'account_number' => 'required',
            'ifsc_code' => 'required'
        ],[
            'dob.required' => 'The date of birth field is required.'
        ]);

    	$data = new User();
    	$data->role_id = 2;
    	$data->full_name = $request->full_name;
    	$data->gender = $request->gender ?? null;
    	$data->dob = $request->dob;
    	$data->email = $request->email;
    	$data->mobile_number = $request->mobile_number;
    	$data->pan_number = $request->pan_number;
    	$data->aadhar_number = $request->aadhar_number;
    	$data->password = \Hash::make($request->password);
    	$data->visible_password = $request->password;
    	$data->street = $request->street;
    	$data->address = $request->address;
    	$data->pincode = $request->pincode;
    	$data->city = $request->city;
    	$data->state = $request->state;
        $data->bank_name = $request->bank_name;
        $data->accountant_name = $request->accountant_name;
        $data->account_number = $request->account_number;
        $data->ifsc_code = $request->ifsc_code;

        $check = User::where('role_id',2)->count();
        if($check>=0 && $check <=9)
        {
            $agentId = "VI000".$check + 1;
        }
        elseif($check>9 && $check <=99)
        {
           $agentId = "VI00".$check + 1; 
       }
       elseif($check>99 && $check <=999)
       {
           $agentId = "VI0".$check + 1; 
       }
       elseif($check>999)
       {
        $agentId = "VI".$check + 1;
    }
    $data->agent_id = $agentId;
    $data->save();
    return redirect()->back()->with('success','Agent registered successfully');

}

public function insertCustomer(Request $request)
{

    $request->validate([
        'customer_name' => 'required',
        'mobile_number' => 'required|unique:customers,mobile_number|digits:10',
        'agent_id' => 'required|exists:users,agent_id'
    ],[
        'mobile_number.required' => 'The customer mobile number field is required.'
    ]);

    $data = new Customer();
    $data->name = $request->customer_name;
    $data->mobile_number = $request->mobile_number;

    $user = User::where('agent_id',$request->agent_id)->first();
    $data->agent_id = $user->id;
    $data->save();
    return redirect()->back()->with('success','Customer added successfully');

}

public function loginAgent(Request $request)
{
    $request->validate([
        'agent_id' => 'required|exists:users,agent_id',
        'password' => 'required'
    ]);

    $data = User::where('agent_id',$request->agent_id)->first();
    if($data)
    {
        if(\Hash::check($request->password, $data->password)) 
        {
            \Auth::login($data);
            return redirect('customers');  
        }
        else if($data->is_active ==0)
        {
            return redirect()->back()->withErrors(['agent_id'=>'Agent account disabled by admin'])->withInput();
        } 
        else 
        {
            return redirect()->back()->withErrors(['agent_id'=>'Password does not match with record'])->withInput();
        }
    }
}

public function status($id)
{
    $data = User::find($id);
    if($data)
    {
        if($data->is_active ==1)
            $data->is_active = 0;
        else
            $data->is_active = 1;
        $data->save();
        return redirect()->back()->with('success','Agent status updated successfully');

    }
        return redirect()->back()->with('error','Something went wrong');
}

public function edit($id)
{
    $data = User::find($id);
    if($data)
    {
        return view('agents.edit',compact('data'));

    }
        return redirect()->back()->with('error','Something went wrong');
}

}
