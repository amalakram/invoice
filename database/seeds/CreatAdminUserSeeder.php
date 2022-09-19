<?php
use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class CreatAdminUserSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
    
         $user = User::create([
        'name' => 'Admin', 
        'email' => 'amalakrammohidat@gmail.com',
        'password' => bcrypt('123456'),
        'roles_name' => ["owner"],
        'Status' => 'Enabled',
        ]);
  
        $role = Role::create(['name' => 'owner']);
   
        $permissions = Permission::pluck('id','id')->all();
  
        $role->syncPermissions($permissions);
   
        $user->assignRole([$role->id]);


}
}