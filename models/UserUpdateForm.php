<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\base\InvalidParamException;
use app\models\User;

/**
 * UserAdd form
 */
class UserUpdateForm extends Model
{
    public $id;
    public $username;
    public $email;
    public $status;
    
    private $_user;
    
    public function __construct($id, $config = [])
    {
        if (!$id) {
            throw new InvalidParamException('Must specified ID.');
        }
        
        $this->_user = User::findIdentity($id);
        
        if (!$this->_user) {
            throw new InvalidParamException('No User found');
        }
        $this->id = $this->_user->id;
        $this->username = $this->_user->username;
        $this->email = $this->_user->email;
        $this->status = $this->_user->status;
        
        parent::__construct($config);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            
            ['status', 'required'],
            ['status', 'integer'],
        ];
    }
    
    public function update()
    {
        $user = $this->_user;
        $user->username = $this->username;
        $user->email = $this->email;
        $user->status = $this->status;
        
        return $user->save();
    }
}
