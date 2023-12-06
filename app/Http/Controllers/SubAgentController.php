<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\User;
use App\Models\Customer;
use Auth;

class SubAgentController extends Controller
{
    public function all(Request $request)
    {
    	if($request->ajax())
    	{
    		$data = Customer::orderBy('customers.id','ASC')->join('users','users.id','customers.agent_id');
            if($request->keyword!=null)
            {
                $data = $data->where(function($query) use ($request){
                    $query->where('customers.name','like','%'.$request->keyword.'%')
                    ->orWhere('customers.mobile_number','like','%'.$request->keyword.'%')
                    ->orWhere('users.agent_id','like','%'.$request->keyword.'%');
                    if(Auth::user()->role_id==1)
                    {
                        $query = $query->orWhere('users.full_name','like','%'.$request->keyword.'%');
                    }
                    $query = $query->orWhere('users.mobile_number','like','%'.$request->keyword.'%');
                });
            }
            if($request->agent_id!=null)
            {
                $data = $data->where('customers.agent_id',$request->agent_id);
            }
            if(Auth::user()->role_id!=1)
            {
                $data = $data->where('customers.agent_id',Auth::user()->id);
            }

            $data = $data->select('customers.*','users.agent_id','users.mobile_number as agent_number','users.full_name')->get();
    		return DataTables::of($data)
      //       ->addColumn('action',function($data){
    		// 	return '<button onclick="deleteRecord('.$data->id.')" class="btn btn-danger btn-sm"><i class="icon ni ni-trash"></i></button>';
    		// })
    		// ->rawColumns(['action'])
            ->make(true);
    	}
        
        $agents = User::where('role_id',2)->where('is_active',1)->orderBy('full_name','ASC')->get();
    	return view('sub-dsa.all',compact('agents'));
    }

    public function add()
    {
        $agents = User::where('role_id',2)->where('is_active',1)->orderBy('first_name','ASC')->orderBy('last_name','ASC')->get();
    	return view('sub-dsa.add',compact('agents'));
    }

    public function insert(Request $request)
    {
    	$request->validate([
    		'agent_id' => 'required',
    		'first_name' => 'required',
    		'middle_name' => 'nullable',
    		'last_name' => 'required',
    		'email' => 'required|email|unique:users',
    		'mobile_number' => 'required|unique:users,mobile_number|digits:10',
    		'whatsapp_number' => 'required',
    		'pan_number' => 'required|regex:/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/',
    		'aadhar_number' => 'required|digits:12',
    		'password' => 'required|min:8',
    		'gst_type' => 'required',
    		'gst_number' => 'nullable|regex:/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/',
    		'profile' => 'nullable|mimes:jpg,png,jpeg,svg',
    		'address' => 'required',
    		'pincode' => 'required',
    		'city' => 'required',
    		'state' => 'required',
    		'country' => 'required'

    	],[
    	    'agent_id.required' => 'The agent name field is required.'
    	    ]);
    	    
    	
    	$check = User::where('agent_id',$request->agent_id)->count();
    	if($check >= 5)
    	{
    	    return redirect()->back()->with('error',"Can't create more than 5 Sub DSA for DSA");
    	}

    	$data = new User();
    	$data->role_id = 3;
    	$data->first_name = $request->first_name;
    	$data->middle_name = $request->middle_name ?? null;
    	$data->last_name = $request->last_name;
    	$data->email = $request->email;
    	$data->mobile_number = $request->mobile_number;
    	$data->whatsapp_number = $request->whatsapp_number;
    	$data->pan_number = $request->pan_number;
    	$data->aadhar_number = $request->aadhar_number;
    	$data->password = \Hash::make($request->password);
    	$data->visible_password = $request->password;
    	$data->gst_type = $request->gst_type;
    	$data->gst_number = $request->gst_number;
    	$data->address = $request->address;
    	$data->pincode = $request->pincode;
    	$data->city = $request->city;
    	$data->state = $request->state;
    	$data->country = $request->country;
    	$data->agent_id = $request->agent_id;
    	if(isset($request->profile))
    	{
    		$data->profile = $request->file('profile')->store('profiles');
    	}
    	$data->save();

    	return redirect('sub-dsa')->with('success','Sub DSA registered successfully');
    }

    public function delete($id)
    {
        $data = Customer::where('id',$id)->delete();
        if($data)
        {
            return redirect()->back()->with('success','Customer deleted successfully');
        }
            return redirect()->back()->with('error','Something went wrong');

    }
}
