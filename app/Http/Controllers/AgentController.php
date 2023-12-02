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
    		'full_name' => 'required|regex:/^[\pL\s\-]+$/u',
    		'email' => 'required|email|unique:users',
    		'mobile_number' => 'required|unique:users,mobile_number|digits:10',
    		'pan_number' => 'required|unique:users,pan_number|regex:/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/',
    		'aadhar_number' => 'required|unique:users,aadhar_number|digits:12|numeric',
    		'password' => 'required|min:12',
    		'address' => 'required',
    		'pincode' => 'required|numeric|min:6',
    		'city' => 'required',
            'state' => 'required',
            'street' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'bank_name' => 'required',
            'accountant_name' => 'required',
            'account_number' => 'required|unique:users,account_number',
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
    if($data)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://otpsms.vision360solutions.in/api/sendhttp.php?authkey=410879AuOeVzmDiTYQ65670f68P1&mobiles='.$request->mobile_number.'&message=Hi%20there!%20To%20activate%20your%20account%2C%20simply%20click%20this%20link%3A%20https%3A%2F%2Fbit.ly%2FVITSLP_3%20Thank%20you!%20-%20VISIONINDIA&sender=VITSLP&route=4&country=91&DLT_TE_ID=1707170123675790840',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'Cookie: PHPSESSID=dptkg2kd3rq1jost1gfq6mq9v3'
        ),
      ));

        $response = curl_exec($curl);

        curl_close($curl);
    }
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
        if($data->is_active == 0)
        {
            return redirect()->back()->withErrors(['agent_id'=>'Agent account disabled by admin'])->withInput();
        } 
        if(\Hash::check($request->password, $data->password)) 
        {
            \Auth::login($data);
            return redirect('customers');  
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
public function update(Request $request)
{
    $request->validate([
        'full_name' => 'required',
        'email' => 'required|email|unique:users,email,'.$request->id.'',
        'mobile_number' => 'required|unique:users,mobile_number,'.$request->id.'|digits:10',
        'pan_number' => 'required|regex:/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/',
        'aadhar_number' => 'required|digits:12',
        'visible_password' => 'required|min:8',
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
        'dob.required' => 'The date of birth field is required.',
        'visible_password.required' => 'The password field is required.'
    ]);

    $data =User::find($request->id);
    $data->role_id = 2;
    $data->full_name = $request->full_name;
    $data->gender = $request->gender ?? null;
    $data->dob = $request->dob;
    $data->email = $request->email;
    $data->mobile_number = $request->mobile_number;
    $data->pan_number = $request->pan_number;
    $data->aadhar_number = $request->aadhar_number;
    $data->password = \Hash::make($request->visible_password);
    $data->visible_password = $request->visible_password;
    $data->street = $request->street;
    $data->address = $request->address;
    $data->pincode = $request->pincode;
    $data->city = $request->city;
    $data->state = $request->state;
    $data->bank_name = $request->bank_name;
    $data->accountant_name = $request->accountant_name;
    $data->account_number = $request->account_number;
    $data->ifsc_code = $request->ifsc_code;
    $data->save();
    return redirect('agents/edit/'.$data->id)->with('success','Agent details updated successfully');
}

}
