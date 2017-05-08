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
use Carbon\Carbon;
use Hash;
use Validator;
use Caffeinated\Flash\Facades\Flash;

class UsersController extends Controller
{
    public function __construct()
    {
        Carbon::setlocale('pt');
    }
    public function index()
    {
        //Charts
        $chart = Charts::database(User::all(), 'donut', 'highcharts')
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
        $user = Auth::user()->load(['roles' => function ($query) {
            $query->orderBy('display_name', 'asc');
        }]);

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
            Flash::success('Imagem de Perfil Actualizada Com Sucesso');
            return redirect()->back()->with('user', $user);
            // return view('_backend.users.profile')->with('user', $user);

        }
    }

    public function updateUserPrifile(Request $request)
    {
        $rules = [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
        ];


        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            Flash::warning('Informações não atualizadas, Verifique os dados Introduzidos');
            // return redirect('user/profiles')->withErrors($validator);
            return redirect()->back()->withErrors($validator);
        }else {
            $user = new User;
            $user->where('id', '=', Auth::user()->id)
            ->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'phone' => $request->phone,
                'age' => $request->age,
                'state' => $request->state,
                'council' => $request->council,
                'parish' => $request->parish,
                'zone' => $request->zone,
            ]);

            Flash::success('Informações atualizada com sucesso');
            // return redirect('user/profiles');
            return redirect()->back();

        }
    }

    public function updatePassword(Request $request)
    {
        $rules = [
            'old_password' => 'exists:users,password',
            'new_password' => 'required|min:3|different:old_password|confirmed',
            'new_password_confirmation' => 'required',
        ];


        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            Flash::warning('Palavra passe não atualizada, Verifique os dados Introduzidos');
            return redirect('user/profiles')->withErrors($validator);
        }else {
            if (Hash::check($request->old_password, Auth::user()->password)) {
                $user = new User;
                $user->where('id', '=', Auth::user()->id)->update(['password' => bcrypt($request->new_password)]);

                Flash::success('Palavra passe atualizada com sucesso');
                return redirect()->back();
            }else {
                Flash::error('Palavra passe Introduzida está incorreta');
                return redirect()->back();
                // return redirect('user/profiles');
            }
        }

    }
}
