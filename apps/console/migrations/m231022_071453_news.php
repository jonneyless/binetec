<?php

use admin\models\Menu;
use yii\db\Migration;

/**
 * Class m231022_071453_news
 */
class m231022_071453_news extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // https://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%news}}', [
            'id' => $this->bigPrimaryKey()->unsigned()->comment('新闻 ID'),
            'name' => $this->string(60)->notNull()->comment('名称'),
            'slug' => $this->string()->unique()->comment('识别字串'),
            'preview' => $this->string()->notNull()->defaultValue('')->comment('主图'),
            'content' => $this->text()->comment('内容'),
            'created_at' => $this->integer()->notNull()->defaultValue(0)->comment('发布时间'),
            'updated_at' => $this->integer()->notNull()->defaultValue(0)->comment('更新时间'),
            'status' => $this->smallInteger(1)->unsigned()->notNull()->defaultValue(0)->comment('状态'),
        ], $tableOptions . ' COMMENT="新闻"');

        $this->truncateTable(Menu::tableName());
        $this->execute("INSERT INTO `menu` (`id`, `parent_id`, `name`, `icon`, `child`, `parent_arr`, `child_arr`, `controller`, `action`, `params`, `auth_item`, `sort`, `status`) VALUES
(1, 0, '仪表盘', 'dashboard', 0, '0', '1', 'site', 'index', '', '', 0, 9),
(2, 0, '系统', 'cog', 1, '0', '2,3,4,5', '', '', '', '', 0, 9),
(3, 2, '角色', '', 0, '0,2', '3', 'role', '', '', '', 0, 9),
(4, 2, '权限', '', 0, '0,2', '4', 'auth', '', '', '', 0, 9),
(5, 2, '管理员', '', 0, '0,2', '5', 'admin', '', '', '', 0, 9),
(6, 0, '分类', 'object-group', 0, '0', '6', 'category', 'index', '', '', 0, 9),
(7, 0, '产品', 'cubes', 0, '0', '7', 'product', 'index', '', '', 0, 9),
(8, 0, '新闻', 'newspaper', 0, '0', '8', 'news', 'index', '', '', 0, 9);");
    }

    public function down()
    {
        $this->dropTable('{{%news}}');
    }
}
