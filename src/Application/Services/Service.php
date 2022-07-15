<?php

namespace Src\Application\Services;

class Service
{

    public $guard = "api";

    /** The request was made correctly. */
    public function responseOk($data, string $message = 'Successful request')
    {
        return response()->json([
            'success' => true,
            'data' => $data,
            'message' => $message,
        ], 200);
    }
    /** The request was NOT successful. */
    public function responseFail(string $message = 'Unsuccessful request')
    {
        return response()->json([
            'success' => false,
            'data' => [],
            'message' => $message,
        ], 200);
    }
    /** The request was successful but does not return any value. */
    public function responseNoContent()
    {
        return response()->json([], 204);
    }
    /** The user is not authorized. */
    public function responseUnauthorized()
    {
        return response()->json(['message' => 'Unauthorized'], 401);
    }
    /** The user does not have the necessary permissions. */
    public function responseForbidden()
    {
        return response()->json(['message' => 'Forbidden'], 403);
    }
    /** Record not found. */
    public function responseNoFound()
    {
        return response()->json(['message' => 'No found'], 404);
    }
}
