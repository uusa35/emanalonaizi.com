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
    public static $signupRules = [
        'username'=> 'required|unique:users,username|max:25',
        'password' => 'required|min:4|max:10'
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
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

    // a User hasMany Comments
    public function comments() {
        return $this->hasMany('Comment','user_id','id');
    }

}
