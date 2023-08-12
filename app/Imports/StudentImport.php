<?php

namespace App\Imports;

use App\Student;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return Model|null
    */
    public function model(array $row)
    {
        return new Student([
            'id' => data_get($row, 0),
            'code' => data_get($row, 1),
            'fullname' => data_get($row, 2),
            'dob' => data_get($row, 3),
            'gender' => data_get($row, 4),
            'schools_id' => data_get($row, 5),
            'chuong_trinh' => data_get($row, 6),
            'email' => data_get($row, 7),
            'parent_name' => data_get($row, 8),
            'parent_phone' => data_get($row, 9),
            'payment' => data_get($row, 10),
            'send_mail' => data_get($row, 11),
        ]);
    }
}
