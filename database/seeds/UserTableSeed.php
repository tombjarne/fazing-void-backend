use Illuminate\Database\Seeder;
use App\User as User; 

class UserTableSeeder extends Seeder {
	public function run() {

		// Bereinige die Tabelle
		User::truncate();

		// Erstelle einen neuen Benutzer
		
		User::create( [’email’ => ’test@example.com’ ,
		’password’ => Hash::make( ’test123’ ) ,
		’name’ => ’testuser’ ,] );
	}
}