<?php

namespace App\Models;
use App\Models\Quiz;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'visible_password',
        'occupation',
        'address',
        'phone',
        'bio',
        'is_admin'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function storeUser($data){
        // add info that are not comming from the form to the data
        $data['visible_password']= $data['password'];
        $data['is_admin']=0;
        // finally encrypt the password coming from the form 
        $data['password']=bcrypt($data['password']);
        return User::create($data);
    }
    private $limit = 10;
    public function allUsers(){
        return User::latest()->paginate($this->limit);
    }
    public function quiz(){
        return $this->belongsToMany(Quiz::class);
    }
    public function findUser($id){
        return User::find($id);

    }
    public function updateUser($data,$id){
        $user = User::find($id);
        if($data['password']){
            $user->password = bcrypt($data['password']);
            $user->visible_password = $data['password'];
        }
        $user->name = $data['name'];
        $user->occupation = $data['occupation'];
        $user->address = $data['address'];
        $user->phone = $data['phone'];
        $user->save();
        return $user;
    }
    public function deleteUser($id){
        // to prevent log in user to delete themselves 
        if(auth()->user()== $id){
            return redirect()->back('message','You can not delete yourself');
        } else {
            return User::find($id)->delete();
        }
           
       
       
    }
}
