
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
        // $this->call(UserTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        // $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
     
    }
}