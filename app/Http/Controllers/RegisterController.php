<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Kreait\Firebase\Contract\Auth as FirebaseAuth;
use App\Repositories\User\UserRepository;
use App\Models\Admin;


class RegisterController extends Controller
{
    protected $firebaseAuth;

    protected $userRepository;


    public function __construct(FirebaseAuth $firebaseAuth, UserRepository $userRepository) {
        $this->firebaseAuth = $firebaseAuth;
        $this->userRepository = $userRepository;
    }

    public function show() {
        return view('register');
    }

    public function register(RegisterRequest $request) {
//         $verificationCode = $request->input('verification_code');
//         $phoneNumber = $request->session()->get('phone_number');
//         try {
//             // Xác minh mã OTP qua Firebase
//             $user = $firebaseAuth->verifyPasswordlessUser($phoneNumber, $verificationCode);
//             dd($user);
    
//             // Nếu xác minh thành công, $user sẽ chứa thông tin về người dùng đã xác minh
//             // Điều gì xảy ra tiếp theo là quyết định của bạn, ví dụ, bạn có thể thêm thông tin người dùng vào cơ sở dữ liệu hoặc thực hiện các thao tác khác.
            
//             // Xử lý xác minh thành công
//         } catch (\Kreait\Firebase\Exception\Auth\InvalidCode $e) {
//             // Xử lý xác minh thất bại - mã xác minh không hợp lệ
//         } catch (\Kreait\Firebase\Exception\Auth\ExpiredOobCode $e) {
//             // Xử lý xác minh thất bại - mã xác minh đã hết hạn
//         } catch (\Kreait\Firebase\Exception\FirebaseException $e) {
//             // Xử lý xác minh thất bại - lỗi Firebase khác
//         }

    $admin = new Admin();
    dd(1);
    $checkExist = $admin::findOrfail($request->email);
    dd($checkExist);



    }

//     public function sendVerificationCode(Request $request)
// {
//     $phoneNumber = $request->phone_number; // Số điện thoại cần xác minh
//     $recaptchaToken = null; // Nếu sử dụng reCAPTCHA, cung cấp recaptchaToken
//     try {
//         // Gửi yêu cầu xác thực mã OTP qua số điện thoại
//         $this->firebaseAuth->signInWithPhoneNumber($phoneNumber, $recaptchaToken);
//         session()->flash('success', 'Đăng ký thành công.');
//         // Xử lý thành công - mã xác minh đã được gửi đi
//     } catch (\Kreait\Firebase\Exception\FirebaseException $e) {
//         session()->flash('error', 'Có lỗi xảy ra trong quá trình đăng ký.');
//     }

//     return redirect()->route('/register');
// }
}