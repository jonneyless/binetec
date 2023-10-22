<?php

namespace admin\models;

use ijony\admin\enums\StatusEnum;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%admin_role}}".
 *
 * @property int $id 角色 ID
 * @property string $name 名称
 * @property string $description 说明
 * @property string|null $auth 权限
 * @property string|null $route 路由
 * @property int $status 状态
 *
 * @property array $authArr write-only
 * @property array $routeArr write-only
 */
class AdminRole extends \common\models\AdminRole
{

    public $authArr = [];
    public $routeArr = [];

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['auth', 'route'], 'default', 'value' => ''],
            ['status', 'default', 'value' => StatusEnum::STATUS_ACTIVE],
            ['status', 'in', 'range' => StatusEnum::getValues('status')],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function afterFind()
    {
        parent::afterFind();

        $this->authArr = $this->auth ? explode(",", $this->auth) : [];
        $this->routeArr = $this->route ? explode(",", $this->route) : [];
    }

    /**
     * @return bool
     */
    public function parseAuth()
    {
        if($this->auth){
            $routes = AdminAuth::find()->select('route')->where([
                'or',
                ['in', 'key', $this->auth],
                ['in', 'parent', $this->auth],
            ])->column();

            $routes = join(",", $routes);
            $routes = explode(",", $routes);
            $routes = array_unique($routes);

            $forAll = [];
            foreach($routes as $route){
                $route = explode("/", $route);
                $action = array_pop($route);
                $controller = join("/", $route);

                if($action == '*'){
                    $forAll[$controller] = $controller;
                }
            }

            foreach($routes as $index => $route){
                $route = explode("/", $route);
                $action = array_pop($route);
                $controller = join("/", $route);

                if(isset($forAll[$controller]) && $action != '*'){
                    unset($routes[$index]);
                }
            }

            $this->route = join(",", $routes);
            $this->auth = join(",", $this->auth);
        }else{
            $this->route = '';
            $this->auth = '';
        }

        return true;
    }

    /**
     * @return array
     */
    public function getAuth()
    {
        return $this->authArr;
    }

    /**
     * @return array
     */
    public function getRoute()
    {
        $data = [];

        foreach($this->routeArr as $route){
            $route = explode("/", $route);
            $action = array_pop($route);
            $controller = join("/", $route);

            if($action == "*"){
                $data[$controller] = $action;
            }else{
                if(isset($data[$controller]) && $data[$controller] == '*'){
                    continue;
                }

                $data[$controller][] = $action;
            }
        }

        return $data;
    }
}
