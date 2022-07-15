<?php

namespace Src\Application\Services\Security;

use App\Http\Requests\Security\CreateUserRequest;
use App\Http\Requests\Security\UpdateUserRequest;
use Src\Application\Services\Service;
use Src\Infrastructure\Repositories\Security\UserRepository;

class UserService extends Service
{
      private $_userRepository;

      public function __construct()
      {
            $this->_userRepository = new UserRepository();
      }

      public function create(CreateUserRequest $request)
      {
            $result = $this->_userRepository->create($request);
            if ($result) {
                  return $this->responseCreated();
            } else {
                  return $this->responseBadRequest();
            }
      }
      public function update(UpdateUserRequest $request, int $id)
      {
            $result = $this->_userRepository->update($request, $id);
            if ($result) {
                  return $this->responseNoContent();
            } else {
                  return $this->responseBadRequest();
            }
      }
      public function getAll()
      {
            $users = $this->_userRepository->getAll();
            return $this->responseOk($users);
      }
      public function getOne(int $id)
      {
            $user = $this->_userRepository->getOne($id);
            return $this->responseOk($user);
      }
      public function deleteOne(int $id)
      {
            $result = $this->_userRepository->deleteOne($id);
            if ($result) {
                  return $this->responseNoContent();
            } else {
                  return $this->responseBadRequest();
            }
      }
}
