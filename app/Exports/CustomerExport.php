<?php

namespace App\Exports;

use App\Models\CImport;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class CustomerExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	return CImport::join('customers','customers.mobile_number','imports.contact_number')
    	->join('users','users.id','customers.agent_id')
    	->select('imports.cpsa_name','users.full_name','imports.agent_contact_number','users.agent_id','users.bank_name','users.accountant_name','users.account_number','users.ifsc_code','imports.status','imports.import_date','imports.status2','customers.mobile_number','imports.user_type','imports.referee_id')->get();
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
            'Referee Id (Customer)'
    	];
    }
}
