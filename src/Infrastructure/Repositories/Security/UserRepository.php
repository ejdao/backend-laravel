<?php

namespace Src\Infrastructure\Repositories\Security;

use App\Http\Requests\Security\CreateUserRequest;
use App\Http\Requests\Security\UpdateUserRequest;
use Src\Infrastructure\Models\Security\User;
use Src\Infrastructure\Models\Security\Role;
use Src\Infrastructure\Repositories\Repository;
use Illuminate\Support\Facades\DB;
use Exception;

class UserRepository extends Repository
{
      public function create(CreateUserRequest $request)
      {
            $newUser['roleId'] = Role::where('code', $request->role)->first()->id;
            $newUser['names'] = $request->names;
            $newUser['lastnames'] = $request->lastnames;
            $newUser['phonenumber'] = $request->phonenumber;
            $newUser['address'] = $request->address;
            $newUser['email'] = $request->email;
            $newUser['password'] = bcrypt($request->password);
            $newUser['password_reset'] =  false;
            $newUser['active'] = true;
            DB::beginTransaction();
            try {
                  User::create($newUser);
                  DB::commit();
                  return true;
            } catch (Exception $ex) {
                  DB::rollBack();
                  return false;
            }
            return false;
      }
      public function update(UpdateUserRequest $request, $id)
      {
            $userToUpdate = $this->getOne($id);
            $userToUpdate->roleId = Role::where('code', $request->role)->first()->id;
            $userToUpdate->names = $request->names;
            $userToUpdate->lastnames = $request->lastnames;
            $userToUpdate->phonenumber = $request->phonenumber;
            $userToUpdate->address = $request->address;
            $userToUpdate->email = $request->email;
            $userToUpdate->active = $request->active;
            DB::beginTransaction();
            try {
                  $userToUpdate->save();
                  DB::commit();
                  return true;
            } catch (Exception $ex) {
                  DB::rollBack();
                  return false;
            }
      }
      public function getAll()
      {
            return  User::all();
      }
      public function getOne(int $id)
      {
            return User::findOrFail($id);
      }
      public function deleteOne(int $id)
      {
            $userToDelete = User::findOrFail($id);
            DB::beginTransaction();
            try {
                  $userToDelete->delete();
                  DB::commit();
                  return true;
            } catch (Exception $ex) {
                  DB::rollBack();
                  return false;
            }
      }
}
