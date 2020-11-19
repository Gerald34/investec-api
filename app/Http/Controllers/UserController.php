<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\User as UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\Accounts;

class UserController extends Controller {

    /**
     * Admin signin
     * @param Request $request
     * @return object
     * @throws ValidationException
     */
    public function login(Request $request): object {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');
        $token = Auth::attempt($credentials);
        if (!$token) {
            return response()->json(['error' => true, 'message' => 'unauthorized access', 'token' => $token], 200);
        }

        $user = UserModel::where('email', $credentials['email'])->first();
        return ($user->role === 1)
            ? $this->returnToken($token)
            : response()->json(['error' => true, 'message' => 'Permission denied']);
    }

    /**
     * Get all users and assigned account numbers
     */
    public function getAll(): array {
        $users = User::all();
        if (empty($users)) {
            return ['error' => true, 'message' => 'Users not found'];
        }

        $collection = [];
        foreach($users as $user) {
            $collection[] = [
                'id' => $user->id,
                'names' => $user->first_name . ' ' . $user->last_name,
                'email' => $user->email,
                'role' => $user->role,
                'account' => $this->_getAccountDetails($user->id)
            ];
        }
        return $collection;
    }

    /**
     * Get user account details
     * @param string $id
     * @return object
     */
    private function _getAccountDetails(string $id) {
        $account = Accounts::select('account_number', 'status')->where('id', $id)->first();
        return (!empty($account)) ? $account : null;
    }
}
