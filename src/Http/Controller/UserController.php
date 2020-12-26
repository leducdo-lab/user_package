<?php

namespace TDP\User\Http\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\User;
use App\Address;
use App\Person;

use Illuminate\Support\Facades\Hash;
use Illuminate\Hashing\BcryptHasher;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function createPerson($email, $password, $is_admin) {
        $person = new Person();
        $person->email = $email;
        $person->password = Hash::make($password);
        $person->is_admin = $is_admin;
        $person->save();
    }

    public function getPersonId($email) {
        $id = Person::select('id')->where('email', $email)->get();
        return $id[0]->id;
    }

    public function getInfo_User(Request $req) {

        $user_id = $req->cookie('user_id');
        $user = DB::table('users')->select('users.id', 'email', 'phone', 'person_id', 'full_name')
                ->join('persons','persons.id','=','users.person_id')
                ->where('users.id',$user_id)
                ->get();

        $address = DB::table('address')->select('address_name')
                    ->where('user_id', $user[0]->id)
                    ->get();

        return view('user::info_user',
        [
            'user' => $user,
            'address' => $address
        ]);

    }

    public function getRegister_User() {
        return view('user::register');
    }

    public function ChangePassWord() {
        return view('user::change_password');
    }

    public function postChangePassWord(Request $req) {

        $this->validate($req,
        [
            'password_fu' => 'required|min:8',
            'password_new' => 'required|min:8|different:password_fu',
            're_password_new' => 'required|min:8|same:password_new'
        ],
        [
            'password_fu.required' => 'Vui lòng nhập mật khẩu cũ',
            'password_fu.min' => 'Mật khẩu ít nhất 8 ký tự',
            'password_new.min' => 'Mật khẩu ít nhất 8 ký tự',
            'password_new.required' =>'Vui lòng nhập mật khẩu mới',
            're_password_new.required' => 'Vui lòng nhập lại mật khẩu mới',
            're_password_new.min' => 'Mật khẩu ít nhất 8 ký tự',
            're_password_new.same' => 'Vui lòng nhập lại xác định mật khẩu'
        ]);

        if (!Hash::check($req->get('password_fu'), Auth::user()->password)) {
            return redirect()->back()->with(['error'=>'Mật khẩu cũ không đúng']);
        } else {
            $user = Person::find(Auth::user()->id);
            $user->password = (new BcryptHasher)->make($req->get('password_new'));

            if($user->save()) {
                return redirect()->route('home_1');
            }
        }

    }

    public function postRegister_User(Request $req) {

        $this->validate($req,
        [
            'email' =>'required|email|unique:persons,email',
            'password'=>'required|min:8|',
            'full_name' =>'required',
            'phone'=>'required',
            'address'=>'required'
        ],
        [
            'email.required'=> 'Vui lòng nhập email',
            'email.email'=> 'Email không đúng định dạng',
            'email.unique'=> 'Email đã tồn tại',
            'password.required'=> 'Vui lòng nhập mật khẩu',
            'password.min'=> 'Mật khẩu ngắn nhất là 8 ký tự',
            'full_name.required'=> 'Vui lòng nhập tên',
            'phone.required'=> 'Vui lòng nhập phone',
            'address' => 'Vui lòng nhập địa chỉ'
        ]);


        $this->createPerson($req->email, $req->password, false);
        $person_id = $this->getPersonId($req->email);

        $this->createUser($req->phone, $req->full_name, $person_id);

        $info_user = $this->getInfo($person_id);

        $this->createAddress($req->address, $info_user[0]->id);

        $name_cookie = cookie('name', $req->full_name, time() + 10000000);
        $id_cookie = cookie('user_id', $info_user[0]->id, time() + 10000000);

        return redirect()->route('home_1')
            ->with(['name'=>$info_user[0]->full_name])
            ->withCookie($name_cookie)
            ->withCookie($id_cookie);
    }

    public function createUser($phone, $full_name, $person_id) {
        $user = new User();

        $user->full_name = $full_name;
        $user->phone = $phone;
        $user->person_id = $person_id;
        $user->save();
    }

    public function createAddress($in_address, $user_id) {
        $address = new Address();
        // dd($user_id);
        $address->address_name = $in_address;
        $address->user_id = $user_id;
        $address->main = 1;
        $address->save();
    }

    public function getInfo($person_id) {
        $info_user = User::select('id', 'full_name')
                    ->where('person_id', $person_id)
                    ->get();
        return $info_user;
    }

    public function getLogin() {
        return view('user::login');
    }

    public function postLogin(Request $req) {

        $minutes = 1000000060;

        $this->validate( $req,
        [
            'email'=>'required|email',
            'password'=>'required|min:8'
        ],
        [
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Email không đúng định dạng',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Mật khẩu ít nhất 8 kí tự'
        ]);

        $credentials = array('email'=>$req->email, 'password'=>$req->password);


        if(Auth::attempt($credentials))
        {
            $person_id = $this->getPersonId($req->email);
            $user = User::where('person_id', '=', $person_id)->get();

            if(!empty($user[0])) {
                $_user = DB::table('users')
                    ->where('person_id', $person_id)
                    ->first();

                $name_cookie = cookie('name', $_user->full_name, time() +$minutes);
                $user_id_cookie = cookie('user_id', $_user->id, time() +$minutes);
                return redirect()->route('info_user')
                    ->withCookie($name_cookie)
                    ->withCookie($user_id_cookie);

            } else {
                $_admin = DB::table('admins')
                    ->join('persons', 'admins.person_id', '=', 'persons.id')
                    ->where('person_id','=',$person_id)
                    ->first();

                $email_cookie = cookie('email', $_admin->email, time() + $minutes);
                $main_admin = cookie('main_admin', ((boolean)$_admin->is_main_admin), time() +$minutes);
//                dd($main_admin);
                return redirect()->route('dashboard')
                    ->withCookie($email_cookie)
                    ->withCookie($main_admin);
            }
        }
        else
        {
            return redirect()->back()->with(['flag'=>'danger', 'message'=>'Đăng nhập không thành công']);
        }

    }

}
