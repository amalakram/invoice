<?php
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{


$permissions = [

        'Invoices',
        'Invoice List',
        'Invoice_Paid',
        'Invoice_UnPaid',
        'Invoice_Partial',
        'invoice archive',


        'Quotation',
        'Quotation List',
        'Petty Cash',
        'Petty Cash list',
        'Petty Cash Archive',


       'Reports',
        'Invoice Reports',
        'Quotation Reports',
        'Employees Reports',
        'pettycach Reports',


        'Employees',
        'Employees list',
        'Employees Attendance',
        'Employees Overtime',
        'Employees Payroll',


        'Customers',
        'print invoice',
        'Customers list',
       

        'users',
        'Users list',
        'Permission Users',
        'Add permissions',
        'Show permissions',
        'Delete permissions',
        'Update permissions',

        'products',
        'Category list',
        'products list',
        

        ];



foreach ($permissions as $permission) {

Permission::create(['name' => $permission]);
}


}
}
