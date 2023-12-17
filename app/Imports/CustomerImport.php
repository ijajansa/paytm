<?php

namespace App\Imports;

use App\Models\CImport;
use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Row;
use Illuminate\Validation\ValidationException;



class CustomerImport implements ToModel,WithHeadingRow,OnEachRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $number = str_replace("X","",$row['referee_mobile_no']);
        $check = Customer::where('mobile_number','like','%'.$number.'%')->first();
        if($check)
        {
            if($row['status']=='COMPLETED' && $row['status2']=='Active')
                $payable = 1;
            else
                $payable = 0;
            return new CImport([
            'contact_number' => $check->mobile_number,
            'agent_name' => $row['agent_name'],
            'cpsa_name' => $row['cpsa_name'],
            'agent_contact_number' => $row['agent_mobile_no'],
            'status' => $row['status'],
            'status2' => $row['status2'],
            'user_type' => $row['user_type'],
            'referee_id' => $row['referee_id'],
            'is_payable' => $payable,
            'import_date' => date('Y-m-d'),
        ]);
        }

    }

    public function onRow(Row $row)
    {
        // Perform database validation before importing
        // $rowData = $row->toArray();
        // $isEmptyRow = empty(array_filter($rowData, 'strlen'));

        // if ($isEmptyRow) {
        //     return;
        // }
        // if (!$this->isValid($rowData)) {
        //     return;
        // }
    }

    // protected function isValid(array $rowData)
    // {
    //     $check = Customer::where('mobile_number',$rowData['mobile_number'])->first();
    //     if($check)
    //     {
    //         $check1 = CImport::where('contact_number',$rowData['mobile_number'])->first();
    //         if($check1)
    //         {   
    //             return false;
    //         }
    //         else
    //         {
    //             return true;
    //         }
    //     }
    // }

}
