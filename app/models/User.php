 <?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
    public $guarded = [''];
    // Rules
    public static $signupRules = [
        'first_name'    => 'required|min:3|max:100|alpha',
        'last_name'     => 'required|min:3|max:100|alpha',
        'username'      => 'required|unique:users,username|min:3|max:25',
        'password'      => 'required|min:4|alpha_num',
        'password_confirmation' => 'required|same:password',
        'mobile'        => 'numeric',
    ];
    public static $signinRules = [
        'username'=> 'required',
        'password' => 'required'
    ];
    public static $resetRules = [
        'old_password'          => 'required',
        'new_password'          => 'required|min:5',
        'password_confirmation' => 'required|same:new_password'
    ];
    public static $forgotPasswordRules = [
        'email'=> 'required|email',
    ];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */


    // a User hasMany Comments
    public function comments() {
        return $this->hasMany('Comment','user_id','id');
    }

}
