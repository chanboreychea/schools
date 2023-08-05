<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function studentRegister(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'first_name' => ['required', 'min:2', 'max:100'],
            'last_name' => ['required', 'min:2', 'max:100'],
            'email' => 'required|email',
            'phone_number' => ['required', 'regex:/^(0[1-9]{2,2})[0-9]{6,7}$/', Rule::unique('Students', 'phoneNumber')],
            'password' => 'required',
            'password_confirmation' => ['required', 'same:password'],
            'gender' => ['required', 'regex:/^(m|f){1}$/'],
            'date_of_birth' => ['required'],
            'address' => ['required', 'min:2', 'max:255']
        ]);

        if ($validation->fails()) {
            return $this->responseError(self::BAD_REQUEST, $validation->errors()->messages());
        }

        DB::table('students')->insert([
            'firstName' => $request->first_name,
            'lastName' => $request->last_name,
            'email' => $request->email,
            'phoneNumber' => $request->phone_number,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'dateOfBirth' => $request->date_of_birth,
            'address' => $request->address,
            'accessToken' => Str::random(60)
        ]);

        return $this->responseSuccess();
    }

    public function login(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'phone_number' => ['required', 'regex:/^(0[1-9]{2,2})[0-9]{6,7}$/'],
            'password' => 'required',
        ]);

        if ($validation->fails()) {
            return $this->responseError(self::BAD_REQUEST, $validation->errors()->messages());
        }

        // DB::table('students')->where([
        //     'phoneNumber' => $request->phone_number
        // ])->update([
        //     'accessToken' => Str::random(60)
        // ]);

        $student = DB::table('Students')->where([
            'phoneNumber' => $request->phone_number
        ])->select(
            'id',
            'firstName',
            'lastName',
            'email',
            'phoneNumber',
            'address',
            'accessToken',
            'password'
        )->first();

        if (!$student) {
            return $this->responseError(self::NOT_FOUND, 'Your account doesn\'t exist');
        }

        if (Hash::check($request->password, $student->password)) {
            unset($student->password);
            return $this->response($student);
        }
        return $this->responseError(self::BAD_REQUEST, "Your credentials did not match.");
    }

    public function logout(Request $request)
    {
        DB::table('students')->where('accessToken', $request->bearerToken())
            ->update([
                'accessToken' => Str::random(60)
            ]);
    }
}
