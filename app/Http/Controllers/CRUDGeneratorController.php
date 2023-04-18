<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Highlight\Highlighter;

class CRUDGeneratorController extends Controller
{
    public function generate(Request $request) {
        if($request->ajax()) {
            $highlighter = new Highlighter();
            $route ="//use App\Http\Controllers\\". $request->input('model') . "Controller;
Route::resources([
    '" . Str::snake($request->input('model'), "-")  . "'=>" . $request->input('model') ."Controller::class
]);";
            $controller = "namespace App\Http\Controllers;
            
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\UserModel;
use Throwable;

class UserModelController extends Controller
{
    public function index()
    {
        \$data['title'] = 'Daftar User Model';
        \$data['user_model'] = UserModel::all();
        return view('user-model.index', \$data);
    }

    public function create()
    {
        \$data['title'] = 'Tambah User Model';
        return view('user-model.create', \$data);
    }

    public function store(Request \$request)
    {
        try {
            DB::beginTransaction();
            \$validator = Validator::make(\$request->all(),[
                'judul'=>'required',
            ]);

            if(\$validator->fails()){
                return redirect()->back()->withErrors(\$validator->errors())->withInput(\$request->all());
            }
            \$data = \$validator->validated();

            UserModel::create(\$data);
            DB::commit();
            return redirect()->route('user-model.index')->with('success', 'Data Berhasil Ditambahkan');
        } catch (Throwable \$e) {
            DB::rollback();
            Log::debug('UserModelController store() ' . \$e->getMessage());
            return redirect()->back()->with('error', \$e->getMessage());
        }
    }

    public function show(\$id)
    {
        \$data['title'] = 'Detail User Model';
        \$data['user_model'] = UserModel::find(\$id);
        return view('user-model.show', \$data);
    }

    public function edit(\$id)
    {
        \$data['title'] = 'Edit User Model';
        \$data['user_model'] = UserModel::find(\$id);
        return view('user-model.edit', \$data);
    }

    public function update(Request \$request, \$id)
    {
        try {
            DB::beginTransaction();
            \$validator = Validator::make(\$request->all(),[
                'judul'=>'required',
            ]);

            if(\$validator->fails()){
                return redirect()->back()->withErrors(\$validator->errors())->withInput(\$request->all());
            }
            \$data = \$validator->validated();

            UserModel::find(\$id)->update(\$data);
            DB::commit();
            return redirect()->route('user-model.index')->with('success', 'Data Berhasil Diedit');
        } catch (Throwable \$e) {
            DB::rollback();
            Log::debug('UserModelController update() ' . \$e->getMessage());
            return redirect()->back()->with('error', \$e->getMessage());
        }
    }

    public function destroy(\$id)
    {
        try {
            DB::beginTransaction();
            UserModel::find(\$id)->delete();
            DB::commit();
            return redirect()->route('user-model.index')->with('success', 'Data Berhasil Dihapus');
        } catch (Throwable \$e) {
            DB::rollback();
            Log::debug('UserModelController destroy() ' . \$e->getMessage());
            return redirect()->back()->with('error', \$e->getMessage());
        }
    }
}";

$model = "<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class e7c2w4AjcS extends Model
{
    use HasFactory;
    protected \$guarded = ['id'];
    protected \$table = 'e7c2w4_ajc_s';
}
";

$migration = "use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_model', function (Blueprint \$table) {
            \$table->id();
            \$table->string('judul');
            \$table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_model');
    }
};";

$index = "@if (session('success'))
<div class=\"alert alert-success pb-0\" role=\"alert\">
    <h4 class=\"alert-heading\">Berhasil !</h4>
    <p>{{ session('success') }}</p>
</div>
@endif
<div class=\"card\">
<div class=\"card-body\">
    <div class=\"d-flex justify-content-lg-end mb-3\">
        <a class=\"btn btn-success\" href=\"{{ route('user-model.create') }}\">Tambah User Model</a>
    </div>
    <div class=\"table-responsive\">
        <table class=\"table table-hover table-bordered\" id=\"my_table\">
            <thead class=\"bg-light\">
                <tr>
                    <th class=\"text-nowrap\" style=\"width:50px\">No</th>
                    <th class=\"text-nowrap\">Judul</th>
                    <th class=\"text-nowrap\" style=\"width: 100px\">Tindakan</th>
                </tr>
            </thead>
            <tbody>
                @foreach (\$user_model as \$item)
                    <tr>
                        <td class=\"text-nowrap\">{{ \$loop->iteration }}</td>
                        <td class=\"text-nowrap\">{{ \$item->judul }}</td>
                        <td class=\"text-nowrap\">
                            <div class=\"d-flex\">
                                <a href=\"{{ route('user-model.edit',\$item->id) }}\" class=\"btn btn-warning me-2\">Edit</a>
                                <form action=\"{{ route('user-model.destroy',\$item->id) }}\" method=\"post\" id=\"delete_form{{ \$item->id }}\">
                                    @csrf
                                    @method('delete')
                                    <button type=\"button\" class=\"btn btn-danger\" onclick=\"delete_item('delete_form{{ \$item->id }}')\">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
<script>
function delete_item(form) {
    let cf = confirm('Yakin Menghapus Data ?')
    if (cf) {
        document.getElementById(form).submit();
    }
}
</script>";
$create = "@if (session('error'))
<div class=\"alert alert-danger pb-0\" role=\"alert\">
    <h4 class=\"alert-heading\">Terjadi Masalah</h4>
    <p>{{ session('error') }}</p>
</div>
@endif
<form action=\"{{ route('e7c2w4-ajc-s.store') }}\" method=\"post\">
@csrf
<div class=\"card\">
    <div class=\"card-body\">
        <div class=\"row row-cols-1 row-cols-lg-2\">
                            
            <div class=\"col\">
                <div class=\"mb-3\">
                    <label for=\"hAHPBsRuGo\" class=\"form-label\">2QRTtgqH0K</label>
                    <input type=\"number\" class=\"form-control @error('hAHPBsRuGo') is-invalid @enderror\" name=\"hAHPBsRuGo\" id=\"hAHPBsRuGo\" placeholder=\"Masukkan 2QRTtgqH0K\" value=\"{{ old('hAHPBsRuGo') }}\">
                    @error('hAHPBsRuGo')<span class=\"text-danger d-block\">{{ \$message }}</span>@enderror
                </div>
            </div>

        </div>
        <div class=\"d-flex justify-content-end\">
            <button class=\"btn btn-primary\">Simpan</button>
        </div>
    </div>
</div>
</form>";
$edit = "test";

            $response = [
                'data' => [
                    'command' => 'php artisan make:model ' . $request->input('model') . 'Model -mcr',
                    'route' => $route,
                    'controller' => $highlighter->highlight('php', $controller)->value,
                    'model' => $highlighter->highlight('php', $model)->value,
                    'migration' => $highlighter->highlight('php', $migration)->value,
                    'index' => $highlighter->highlight('html', $index)->value,
                    'create' => $highlighter->highlight('html', $create)->value,
                    'edit' => $highlighter->highlight('html', $edit)->value,
                ]
            ];
            return response()->json($response);
        }
    }
}
