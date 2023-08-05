<?php

namespace App\Http\Controllers;

use App\Helper\StudentLogin;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected StudentLogin $student;

    const UNAUTHORIZED      = 'unauthorized';
    const BAD_REQUEST       = 'bad_request';
    const NOT_FOUND         = 'not_found';
    const FORBIDDEN         = 'forbidden';
    const INTERNAL_SERVER   = 'internal_server';

    public function __construct(StudentLogin $student)
    {
        $this->student = $student;
    }

    public function response($data)
    {
        return response()->json([
            'data' => $data
        ]);
    }

    public function responses($datas)
    {
        return response()->json([
            'data' => $datas,
        ]);
    }

    public function responsesPagination($pagination)
    {
        return response()->json([
            'data' => $pagination,
            'pagination' =>  (object) [
                'current_page' => $pagination->currentPage(),
                'has_more_pages' => $pagination->hasMorePages(),
                'limit' => $pagination->perPage(),
                'total' => $pagination->total()
            ]
        ]);
    }

    public function responseSuccess()
    {
        return response()->json([
            'data' => [
                'success' => true
            ]
        ], 201);
    }

    public function responseError($type, $message = null, $code = null, $data = [])
    {
        $errors = [
            'unauthorized'      => 401,
            'not_found'         => 404,
            'forbidden'         => 403,
            'bad_request'       => 400,
            'internal_server'   => 500
        ];

        $messages = [
            'unauthorized'      => 'Unauthorized',
            'not_found'         => 'Not Found',
            'forbidden'         => 'Forbidden',
            'bad_request'       => 'Bad Request',
            'internal_server'   => 'Internal Server Error'
        ];

        return response()->json([
            'error' => [
                'message' => $message ? $message : $messages[$type],
                'code'    => $code ? $code : $errors[$type],
                'data'    => $data
            ],
        ], $errors[$type]);
    }

    public function  internalServerError($message)
    {
        return $this->responseError('internal_server', $message);
    }

    public function validateCheck($fields, $rules)
    {
        return Validator::make($fields, $rules);
    }

    protected function uuid()
    {
        return Str::orderedUuid();
    }

    public function isNull($data, $result = ''): mixed
    {
        return $data ?: $result;
    }

    public function isUpdateNull($data, $update): string
    {
        return $data ?: $update;
    }
}
