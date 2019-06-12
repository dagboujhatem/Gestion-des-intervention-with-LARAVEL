<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Support\Facades\Storage; 

class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the User.
     *
     * @param UserDataTable $userDataTable
     * @return Response
     */
    public function index(UserDataTable $userDataTable)
    {
        return $userDataTable->render('users.index');
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
         // test sur le mot de passe 
        if($request->password)
        {   // l'utilisateur donne son password
            // alors décrypter le password
            $request->merge(['password' => bcrypt($request->password)]);
        }
        // end test password

        $input = $request->all();

        $user = $this->userRepository->create($input);

        // begin photo section 
        //redifine 'disks => [ 'public' => ['root'=> public_path(),]
        // in conf/filesystem.php
        if($request->file('photo'))
        {
            $path = Storage::disk('public')->put('avatars',$request->file('photo')); 
            $user->fill(['photo'=> asset($path)])->save();
        }
        // end photo section 

        Flash::success('Utilisateur enregistré avec succès.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('Utilisateur non trouvé.');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('Utilisateur non trouvé.');

            return redirect(route('users.index'));
        }

        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified User in storage.
     *
     * @param  int              $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('Utilisateur non trouvé.');

            return redirect(route('users.index'));
        }
        // test sur le mot de passe 
        if($request->password)
        {   // l'utilisateur donne son password
            // alors valider et décrypter le password
            // validation of user password
            $validatedData = $request->validate([ 
            'password' => 'required|confirmed|min:6',
            ]);
            $request->merge(['password' => bcrypt($request->password)]);
        }else
        {
            // l'utilisateur ne donne pas son password
            $request->merge(['password' => $user->password]);
        }
        // end test password

        // get  photo name 
        $last_photo = $user->photo;

        $user = $this->userRepository->update($request->all(), $id);

         // begin photo section  
        if($request->file('photo'))
        {
            $path = Storage::disk('public')->put('avatars',$request->file('photo')); 
            $user->fill(['photo'=> asset($path)])->save();

            //delete old image 
                $exists = Storage::disk('public')->exists('avatars',$last_photo);

                if($exists)
                {   
                    $file = basename($last_photo);  
                   // dd($file);
                    Storage::disk('public')->delete('avatars/'.$file);
                }
            // end delete old image
        }
        // end photo section 
        // end update user 
        Flash::success('Utilisateur mis à jour avec succès.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('Utilisateur non trouvé.');

            return redirect(route('users.index'));
        }

        //delete old photo 
        $exists = Storage::disk('public')->exists('avatars',$user->photo);

        if($exists)
        {   
            $file = basename($user->photo);  
            Storage::disk('public')->delete('avatars/'.$file);
        }
        // end delete old photo

        $this->userRepository->delete($id);

        Flash::success('Utilisateur supprimé avec succès.');

        return redirect(route('users.index'));
    }
}
