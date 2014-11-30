<?php
namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

/**
 * UserAdd form
 */
class UserAddForm extends Model
{
    public $id;
    public $username;
    public $email;
    public $password;
    public $status;
    
    private $_user;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required', 'on' => 'create'],
            ['password', 'string', 'min' => 6],
            
            ['status', 'required'],
            ['status', 'integer'],
        ];
    }

    /**
     * Add user to database.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function create()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->status = $this->status;
            $user->generateAuthKey();
            $user->save();
            return $user;
        }

        return null;
    }
}
