<?php

namespace admin\models;

use ijony\admin\enums\StatusEnum;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
 * This is the model class for table "{{%menu}}".
 *
 * @property int $id 菜单 ID
 * @property int $parent_id 父级
 * @property string $name 名称
 * @property string $icon 图标
 * @property int $child 有子级
 * @property string $parent_arr 父级链
 * @property string|null $child_arr 子级群
 * @property string $controller 控制器
 * @property string $action 方法
 * @property string $params 参数
 * @property string $auth_item 权限
 * @property int $sort 排序
 * @property int $status 状态
 */
class Menu extends \common\models\Menu
{

    private static $_routes;

    /**
     * @return array
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['child', 'parent_id', 'sort'], 'default', 'value' => 0],
            ['status', 'default', 'value' => StatusEnum::STATUS_ACTIVE],
            ['status', 'in', 'range' => StatusEnum::getValues('status')],
        ]);
    }

    /**
     * @param bool $insert
     *
     * @return bool
     */
    public function beforeSave($insert)
    {
        if(!$insert){
            if(count(explode(",", $this->child_arr)) > 1){
                $this->child = 1;
            }else{
                $this->child = 0;
            }
        }

        return parent::beforeSave($insert);
    }

    /**
     * @param bool $insert
     * @param array $changedAttributes
     */
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if($insert){
            $this->child_arr = (string) $this->id;

            if($this->parent_id){
                $parent = static::findOne($this->parent_id);

                $parent->child_arr = $parent->child_arr . ',' . $this->id;
                $parent->save();

                $this->parent_arr = $parent->parent_arr . ',' . $this->parent_id;

                $parents = explode(",", $parent->parent_arr);
                foreach($parents as $parent_id){
                    if(!$parent_id) continue;

                    $parent = static::findOne($parent_id);
                    $parent->child_arr = $parent->child_arr . ',' . $this->id;
                    $parent->save();
                }
            }

            $this->save();
        }else{
            if(isset($changedAttributes['parent_id'])){
                $child_arr = explode(",", $this->child_arr);
                $old_parent_arr = $this->parent_arr;

                if($changedAttributes['parent_id']){
                    $parent_arr = explode(",", $this->parent_arr);
                    array_shift($parent_arr);

                    foreach($parent_arr as $parent_id){
                        $parent = static::findOne($parent_id);

                        $parent_child_arr = explode(",", $parent->child_arr);
                        $parent_child_arr = array_diff($parent_child_arr, $child_arr);
                        $parent_child_arr = join(",", $parent_child_arr);

                        $parent->child_arr = $parent_child_arr;
                        $parent->save();
                    }
                }

                if($this->parent_id){
                    $parent = static::findOne($this->parent_id);

                    $parent_child_arr = explode(",", $parent->child_arr);
                    $parent_child_arr = array_merge($parent_child_arr, $child_arr);
                    $parent_child_arr = join(",", $parent_child_arr);

                    $parent->child_arr = $parent_child_arr;
                    $parent->save();

                    $this->parent_arr = $parent->parent_arr . ',' . $this->parent_id;

                    $parents = explode(",", $parent->parent_arr);
                    foreach($parents as $parent_id){
                        if(!$parent_id) continue;

                        $parent = static::findOne($parent_id);

                        $parent_child_arr = explode(",", $parent->child_arr);
                        $parent_child_arr = array_merge($parent_child_arr, $child_arr);
                        $parent_child_arr = join(",", $parent_child_arr);

                        $parent->child_arr = $parent_child_arr;
                        $parent->save();
                    }
                }else{
                    $this->parent_arr = '0';
                }

                foreach($child_arr as $id){
                    if($id == $this->id) continue;

                    $child = static::findOne($id);
                    $child->parent_arr = str_replace($old_parent_arr, $this->parent_arr, $child->parent_arr);
                    $child->save();
                }

                $this->save();
            }

            if(isset($changedAttributes['status'])){
                if($this->child != 0){
                    static::updateAll(['status' => $this->status], ['parent_id' => $this->id]);
                }
            }
        }

        if(isset($changedAttributes['sort'])){
            if($this->parent_id){
                $parent = static::findOne($this->parent_id);
                $child_arr = $parent->id;
                $childs = static::find()->where(['parent_id' => $this->parent_id])->orderBy(['sort' => SORT_ASC])->all();
                foreach($childs as $child){
                    $child_arr .= "," . $child->child_arr;
                }
                $parent->child_arr = $child_arr;
                $parent->save();
            }
        }
    }

    public function afterDelete()
    {
        parent::afterDelete();

        $parent_arr = explode(",", $this->parent_arr);
        $child_arr = explode(",", $this->child_arr);

        array_shift($parent_arr);

        foreach($parent_arr as $parent_id){
            $parent = static::findOne($parent_id);

            $parent_child_arr = explode(",", $parent->child_arr);
            $parent_child_arr = array_diff($parent_child_arr, $child_arr);
            $parent_child_arr = join(",", $parent_child_arr);

            $parent->child_arr = $parent_child_arr;
            $parent->save();
        }

        static::deleteAll(['id' => $child_arr]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Menu::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubmenu()
    {
        return $this->hasMany(Menu::className(), ['parent_id' => 'id'])->orderBy(['sort' => SORT_ASC]);
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        if(substr($this->params, 0, 4) == 'http'){
            return $this->params;
        }

        if(!$this->controller){
            return 'javascript:void(0)';
        }

        $params[] = sprintf("%s/%s", $this->controller, $this->action);
        if($this->params){
            $params = array_merge($params, parse_str($this->params));
        }

        return Url::to($params);
    }

    /**
     * @return array
     */
    public function getParentIds()
    {
        if(!$this->parent_arr){
            return [0];
        }

        $parent_arr = explode(",", $this->parent_arr);

        return $parent_arr;
    }

    /**
     * @param $parent_id
     * @param array $exclude
     *
     * @return array
     */
    public static function getSelectData($parent_id, $exclude = [])
    {
        $query = static::find()->where([
            'parent_id' => $parent_id,
            'status' => StatusEnum::STATUS_ACTIVE,
        ]);

        if($exclude){
            if(is_array($exclude)){
                $exclude = explode(",", $exclude);
            }
            $query->andFilterWhere(['not in', 'id', (array) $exclude]);
        }

        $items = $query->all();

        if(!$items){
            return [];
        }

        $datas = [
            $parent_id => '请选择',
        ];

        foreach($items as $item){
            $datas[$item->id] = $item->name;
        }

        return $datas;
    }

    /**
     * @param $route
     *
     * @return array
     */
    public static function getMenus($route)
    {
        /* @var $items \common\models\Menu[] */
        $data = static::find()->where(['status' => StatusEnum::STATUS_ACTIVE])->indexBy('id')->orderBy(['sort' => SORT_ASC])->all();
        $return  = [];
        foreach($data as $datum){
            if($datum->parent_id == 0){
                $return[] = self::parseMenu($route, $datum, $data);
            }
        }
        return $return;
    }

    /**
     * @param $route    string
     * @param $datum     \common\models\Menu
     * @param $data    \common\models\Menu[]
     *
     * @return array
     */
    private static function parseMenu($route, $datum, $data)
    {
        $menu = [
            'name' => $datum->name,
            'url' => $datum->getUrl(),
            'active' => $datum->getIsActive($route),
            'icon' => $datum->icon,
            'show' => $datum->getIsShow(),
            'items' => [],
        ];

        if($datum->child == 1){
            $child_arr = explode(",", $datum->child_arr);
            $child_count = count($child_arr);

            for($i = 0; $i < $child_count; $i++){
                if(!isset($data[$child_arr[$i]])) continue;

                $submenu = $data[$child_arr[$i]];

                if($submenu->parent_id == $datum->id){
                    $submenu = self::parseMenu($route, $submenu, $data);

                    if($submenu['active'] == true){
                        $menu['active'] = true;
                    }
                    if($submenu['show'] == true){
                        $menu['show'] = true;
                    }
                    $menu['items'][] = $submenu;
                }
            }
        }

        if($menu['items']){
            $menu['url'] = 'javascript:void(0)';
        }

        return $menu;
    }

    /**
     * @param $route
     *
     * @return bool
     */
    public function getIsActive($route)
    {
        $routeArr = explode("/", $route);
        $action = array_pop($routeArr);
        $controller = join("/", $routeArr);

        if($this->auth_item){
            $auth_item = explode(",", $this->auth_item);
            return in_array($controller, $auth_item) || in_array($route, $auth_item);
        }

        if($this->parent_id == 0){
            return $this->controller == $controller;
        }

        if($this->action){
            return $this->controller . '/' . $this->action == $route;
        }

        return $this->controller == $controller;
    }

    /**
     * @return bool
     */
    public function getIsShow()
    {
        $routes = self::getAuthedRoute();

        if(!$routes){
            return true;
        }

        $routes['site'] = '*';

        if($this->auth_item){
            $auth_item = explode(",", $this->auth_item);
            foreach($auth_item as $item){
                if(isset($routes[$item])){
                    return true;
                }
            }
        }

        if(!isset($routes[$this->controller])){
            return false;
        }

        if($routes[$this->controller] == '*'){
            return true;
        }

        $action = $this->action;

        if(!$action){
            $action = 'view';
        }

        if(in_array($action, $routes[$this->controller])){
            return true;
        }

        return false;
    }

    /**
     * @return mixed
     */
    public static function getAuthedRoute()
    {
        if(self::$_routes === null){
            self::$_routes = Yii::$app->controller->authed_route;
        }

        return self::$_routes;
    }
}
