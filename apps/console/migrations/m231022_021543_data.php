<?php

use admin\models\Admin;
use admin\models\AdminRole;
use admin\models\Menu;
use yii\db\Migration;

/**
 * Class m231022_021543_data
 */
class m231022_021543_data extends Migration
{
    /**
     * @return bool|void
     * @throws \yii\base\Exception
     */
    public function up()
    {
        $role = new AdminRole();
        $role->name = '管理员';
        $role->description = '管理员';
        $role->auth = '';
        $role->route = '';
        $role->save();

        $model = new Admin;
        $model->role_id = $role->id;
        $model->username = 'admin';
        $model->password = '123456';
        $model->save();

        $this->execute("INSERT INTO `menu` (`id`, `parent_id`, `name`, `icon`, `child`, `parent_arr`, `child_arr`, `controller`, `action`, `params`, `auth_item`, `sort`, `status`) VALUES
(1, 0, '仪表盘', 'dashboard', 0, '0', '1', 'site', 'index', '', '', 0, 9),
(2, 0, '系统', 'cog', 1, '0', '2,3,4,5,6', '', '', '', '', 0, 9),
(3, 2, '角色', '', 0, '0,2', '3', 'role', '', '', '', 0, 9),
(4, 2, '权限', '', 0, '0,2', '4', 'auth', '', '', '', 0, 9),
(5, 2, '管理员', '', 0, '0,2', '5', 'admin', '', '', '', 0, 9),
(6, 2, '配置', '', 0, '0,2', '6', 'config', '', '', '', 0, 9),
(7, 0, '分类', 'object-group', 0, '0', '7', 'category', 'index', '', '', 0, 9),
(8, 0, '产品', 'cubes', 0, '0', '8', 'product', 'index', '', '', 0, 9),
(9, 0, '新闻', 'newspaper-o', 0, '0', '9', 'news', 'index', '', '', 0, 9);");
    }

    /**
     * @return bool|void
     */
    public function down()
    {
        $this->truncateTable(AdminRole::tableName());
        $this->truncateTable(Admin::tableName());
        $this->truncateTable(Menu::tableName());
    }
}
