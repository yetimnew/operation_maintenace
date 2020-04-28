
<?php
use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;
use App\User;
use App\Post;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
  public function run()
    {
        $this->call(PermissionTableSeeder::class);
        $this->call(RolesTableSeedeer::class);
        $this->call(UsersTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
     
    }
}