<?php

namespace Sagmma\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use User;
use Auth;
use Role;
// use Image;
use Intervention\Image\ImageManagerStatic as Image;
use Charts;

class UsersController extends Controller
{
    public function index()
    {
        //Charts
        $chart = Charts::database(User::all(), 'donut', 'fusioncharts')
        ->title('Tipo de Utilizadores')
        ->dimensions(0, 300)
        ->responsive(false)
        ->groupBy('type', null, ['member' => 'Membros', 'emp' => 'Funcionários', 'trad' => 'Comerciantes', '' => 'Outros']);

        $chart1 = Charts::database(User::all(), 'area', 'highcharts')
        ->title('Total por Mês')
        ->elementLabel("Total Criado por mês")
        ->dimensions(0, 300)
        ->responsive(false)
        ->groupByMonth();

        $user=User::all();
        return view('_backend.users.show')->with('user', $user)->with('chart', $chart)->with('chart1', $chart1);
    }

    public function create()
    {
        return view('_backend.users.create');
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $user = User::findOrFail($id);

    }


    public function edit($id)
    {

        dd($id);
        return view('_backend.users.edit');

    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function profile()
    {
        $user = Auth::user();
        return view('_backend.users.profile')->with('user', $user);
    }

    public function update_profile(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time().'.'.$avatar->getClientOriginalExtension();
            $img = Image::make($avatar);
            $img->resize(300, 300);
            $img->save(public_path('/uploads/avatars/'.$filename));
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();

            return view('_backend.users.profile')->with('user', $user);

        }
    }
}
