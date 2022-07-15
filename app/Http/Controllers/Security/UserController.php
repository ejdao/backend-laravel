<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use App\Http\Requests\Security\CreateUserRequest;
use App\Http\Requests\Security\UpdateUserRequest;
use Src\Application\Services\Security\UserService;

class UserController extends Controller
{
    private $_userService;

    public function __construct()
    {
        $this->middleware('admin')->except('getAll', 'getOne');
        $this->_userService = new UserService();
    }
    /**
     * Create a new user.
     * @OA\Post (
     *  path="/v1/user",
     *  tags={"users"},
     *  security={ {"bearer": {} }},
     *  @OA\RequestBody(
     *      @OA\MediaType(
     *          mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="role",
     *                          type="int"
     *                      ),
     *                      @OA\Property(
     *                          property="names",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="lastnames",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="phonenumber",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="address",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="email",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="password",
     *                          type="string"
     *                      ),
     *                 ),
     *                 example={
     *                      "role" : 1,
     *                      "names": "user",
     *                      "lastnames": "user",
     *                      "phonenumber": "3205395014",
     *                      "address": "cra 20 #30-30 Barrio El Manglar",
     *                      "email": "user",
     *                      "password": "123"
     *                  }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="successfully created",
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="unsuccess, Bad request",
     *      )
     *  )
     */
    public function create(CreateUserRequest $request)
    {
        return $this->_userService->create($request);
    }
    /**
     * Update a user.
     * @OA\Put (
     *     path="/v1/user/{id}",
     *     tags={"users"},
     *     security={ {"bearer": {} }},
     * @OA\Parameter(
     *     in="path",
     *     name="id",
     *     required=true,
     *     @OA\Schema(type="number")
     *    ),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="role",
     *                          type="int"
     *                      ),
     *                      @OA\Property(
     *                          property="names",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="lastnames",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="phonenumber",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="address",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="email",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="active",
     *                          type="boolean"
     *                      ),
     *                 ),
     *                 example={
     *                      "role" : 1,
     *                      "names": "user",
     *                      "lastnames": "user",
     *                      "phonenumber": "3205395014",
     *                      "address": "cra 20 #30-30 Barrio El Manglar",
     *                      "email": "user",
     *                      "active": true
     *                  }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="successfully updated",
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="unsuccess, Bad request",
     *      )
     *  )
     */
    public function update(UpdateUserRequest $request, int $id)
    {
        return $this->_userService->update($request, $id);
    }
    /**
     * Get all users.
     * @OA\Get(
     *     path="/v1/user",
     *     tags={"users"},
     * @OA\Response(
     *     response=200,
     *     description="success"
     *   )
     * )
     */
    public function getAll()
    {
        return $this->_userService->getAll();
    }
    /**
     * Get one user.
     * @OA\Get(
     *     path="/v1/user/{id}",
     *     tags={"users"},
     * @OA\Parameter(
     *     in="path",
     *     name="id",
     *     required=true,
     *     @OA\Schema(type="number")
     *    ),
     * @OA\Response(
     *     response=200,
     *     description="success"
     *   ),
     * )
     */
    public function getOne(int $id)
    {
        return $this->_userService->getOne($id);
    }
    /**
     * Delete one user.
     * @OA\Delete(
     *     path="/v1/user/{id}",
     *     tags={"users"},
     *     security={ {"bearer": {} }},
     * @OA\Parameter(
     *     in="path",
     *     name="id",
     *     required=true,
     *     @OA\Schema(type="number")
     *    ),
     * @OA\Response(
     *     response=204,
     *     description="Successfully deleted"
     *   ),
     * @OA\Response(
     *     response=404,
     *     description="No found"
     *   )
     * )
     */
    public function deleteOne(int $id)
    {
        return $this->_userService->deleteOne($id);
    }
}
