<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\User;
use App\Imports\CustomerImport;
use App\Exports\CustomerExport;
use App\Models\CImport;
use Excel;
use Auth;

class ImportController extends Controller
{
    public function all(Request $request)
    {
    	if($request->ajax())
    	{
    		$data = CImport::join('customers','customers.mobile_number','imports.contact_number')
    		->orderBy('imports.id','ASC')
    		->join('users','customers.agent_id','users.id');
            if(Auth::user()->role_id!=1)
            {
                $data = $data->where('customers.agent_id',Auth::user()->id);
            }
    		$data = $data->select('customers.name as full_name','imports.*','users.agent_id')
    		->get();
    		return DataTables::of($data)->
            addColumn('main_status',function($data){
                if($data->is_payable==1)
                {
                    $btn = '<button class="btn btn-sm btn-success">Payable</button>';
                }
                else
                {
                    $btn = '<button class="btn btn-sm btn-danger">Non Payable</button>';
                }
                return $btn;
            })
            ->addColumn('contact',function($data){
                if(\Auth::user()->role_id==1)
                {
                    $btn = $data->contact_number;
                }
                else
                {
                    $btn = 'XXXXX'.substr($data->contact_number, 5,5);
                }
                return $btn;
            })
            ->rawColumns(['main_status','contact'])
            ->make(true);
    	}
    	return view('imports.all');
    }

    public function add()
    {
    	return view('imports.add');
    }

    public function insert(Request $request)
    {
    	$file = $request->file('file');
        Excel::import(new CustomerImport, $file);
        return redirect('import-excel')->with('success', 'Data imported successfully!');
    }
    public function exportExcel(Request $request)
    {
    	$name = 'customers-'.date('Ymd').'.xlsx';
    	return Excel::download(new CustomerExport, $name);
    }
}
