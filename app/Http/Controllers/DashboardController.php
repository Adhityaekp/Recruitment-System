// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
public function showDashboard()
{
// Mengambil data nama admin, bisa dari database atau session
// Contoh, menggunakan data statis:
$userName = 'Admin Name'; // Anda bisa mengganti ini dengan data dinamis

// Mengirim data ke view
return view('dashboard', compact('userName'));
}
}