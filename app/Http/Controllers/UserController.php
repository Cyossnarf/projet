<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserUpdate2Request;
use App\Http\Requests\UserUpdate3Request;

use App\Gestion\UserRepository;

class UserController extends Controller
{
	
	protected $userRepository;
	
	protected $nbrPerPage = 5;
	
	public function __construct(UserRepository $userRepository)
	{
		$this->userRepository = $userRepository;

		$this->middleware('auth');
		$this->middleware('admin', ['except' => ['edit2', 'update2', 'edit3', 'update3']]);
	}
	
    public function index()
	{
		$users = $this->userRepository->getPaginate($this->nbrPerPage);
		$links = $users->render();

		return view('index', compact('users', 'links'));
	}

	public function create()
	{
		return view('create');
	}

	public function store(UserCreateRequest $request)
	{
		$this->setAdmin($request);
		
		$user = $this->userRepository->store($request->all());

		return redirect('admin/user')->withOk("L'utilisateur " . $user->ID_Prac . " a été créé.");
	}

	public function show($id)
	{
		$user = $this->userRepository->getById($id);

		return view('show',  compact('user'));
	}

	public function edit($id)
	{
		$user = $this->userRepository->getById($id);

		return view('edit',  compact('user'));
	}

	public function edit2()
	{
		$user = Auth::user();

		return view('edit2',  compact('user'));
	}

	public function edit3()
	{
		$user = Auth::user();

		return view('edit3',  compact('user'));
	}

	public function update(UserUpdateRequest $request, $id)
	{
		$fields = $request->all();

		// Si l'administrateur laisse le champ vide, le mot de passe de l'utilisateur
		// n'est pas modifié
		if ($fields['password'] == '') { unset($fields['password']); }
		
		$this->setAdmin($request);
		$this->userRepository->update($id, $fields);
		
		return redirect('admin/user')->withOk("L'utilisateur " . $request->input('ID_Prac') . " a été modifié.");
	}

	public function update2(UserUpdate2Request $request)
	{
		$fields = $request->all();
		$id = Auth::user()->ID_Prac;

		$this->userRepository->update($id, $fields);
		
		return redirect('informations');
	}

	public function update3(UserUpdate3Request $request)
	{
		$fields = $request->all();
		$user = Auth::user();
		$id = $user->ID_Prac;

		if (Hash::check($fields['password_old'], $user->password)) {
			unset($fields['password_old']);
			$this->userRepository->update($id, $fields);
			return redirect('informations');
		} else {
			return redirect('logout');
		}
	}

	public function destroy($id)
	{
		$this->userRepository->destroy($id);

		return back();
	}
	
	private function setAdmin($request)
	{
		if(!$request->has('admin'))
		{
			$request->merge(['admin' => 0]);
		}		
	}
}
