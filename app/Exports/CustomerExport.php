<?php

namespace App\Exports;

use App\Models\CImport;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Auth;

class CustomerExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	$data = CImport::join('customers','customers.mobile_number','imports.contact_number')
    	->join('users','users.id','customers.agent_id');
        if(Auth::user()->role_id!=1)
        {
            $data = $data->where('customers.agent_id',Auth::user()->id);
        }
    	$data = $data->select('imports.cpsa_name','users.full_name','imports.agent_contact_number','users.agent_id','users.bank_name','users.accountant_name','users.account_number','users.ifsc_code','imports.status','imports.import_date','imports.status2','customers.mobile_number','imports.user_type','imports.referee_id',\DB::raw('(CASE WHEN imports.is_payable = 1 THEN "Payable" ELSE "Non-Payable" END) AS payable'))->get();
        return $data;
    }
    public function headings(): array
    {
    	return [
            'CPSA Name',
    		'Agent Name',
    		'Agent Mobile No',
    		'Agent ID',
            'Bank Name',
            'Account Holder Name',
            'Account Number',
            'IFSC Code',
            'Status',
            'Created Date',
            'Status 2',
            'Referee Mobile No (Customer)',
            'User Type',
            'Referee Id (Customer)',
            'Is Payable'
    	];
    }
}
