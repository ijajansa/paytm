<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\User;
use App\Models\LoanApplication;
use App\Models\LoanMaster;

class LoanApplicationController extends Controller
{
    public function all(Request $request)
    {
    	if($request->ajax())
    	{
	    	$data = LoanApplication::orderBy('loan_applications.id','DESC')->join('users','users.id','loan_applications.agent_id');
            if($request->name!=null)
            {
                $data = $data->where(function($query) use ($request){
                    $query->where('loan_applications.first_name','like','%'.$request->name.'%')->orWhere('loan_applications.middle_name','like','%'.$request->name.'%')->orWhere('loan_applications.last_name','like','%'.$request->name.'%')->orWhere('loan_applications.dob','like','%'.$request->name.'%')->orWhere('loan_applications.email','like','%'.$request->name.'%')->orWhere('loan_applications.mobile_number','like','%'.$request->name.'%')->orWhere('loan_applications.requested_amount','like','%'.$request->name.'%');
                });
            }
            if($request->type!=null)
            {
                $data = $data->where('type',$request->type);
            }
            
            $data = $data->select('loan_applications.*','users.first_name as agent_first','users.last_name as agent_last');
    		return DataTables::of($data)
    		->addColumn('full_name',function($data){
    			return $data->first_name." ".$data->middle_name." ".$data->last_name;
    		})
    		->addColumn('status',function($data){
    			if($data->status !=1)
    			{
    				return '<button class="btn btn-success btn-sm">Processing</button>';
    			}
    			else
    			{
    				return '<button class="btn btn-danger btn-sm">Pending</button>';
    			}
    		})
    		->addColumn('action',function($data){
    			return '<button class="btn btn-primary btn-sm"><i class="icon ni ni-edit"></i>&nbsp;View</button>';
    		})
    		->addColumn('agent_name',function($data){
    			return $data->agent_first.' '.$data->agent_last;
    		})
    		->rawColumns(['full_name','agent_name','status','action'])->make(true);    		
    	}

    	$types = LoanMaster::where('is_active',1)->orderBy('name','ASC')->get();
    	return view('loan-applications.all',compact('types'));

    }

}
