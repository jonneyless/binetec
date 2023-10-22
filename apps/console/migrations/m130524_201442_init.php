<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // https://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%admin}}', [
            'id' => $this->bigPrimaryKey()->unsigned()->comment('用户 ID'),
            'role_id' => $this->bigInteger()->unsigned()->notNull()->defaultValue(0)->comment('角色 ID'),
            'username' => $this->string(24)->notNull()->comment('用户名'),
            'password_hash' => $this->string(64)->notNull()->defaultValue('')->comment('登录密码'),
            'auth_key' => $this->string(32)->notNull()->defaultValue('')->comment('登录保持密钥'),
            'created_at' => $this->integer(10)->unsigned()->notNull()->defaultValue(0)->comment('注册时间'),
            'updated_at' => $this->integer(10)->unsigned()->notNull()->defaultValue(0)->comment('更新时间'),
            'signin_at' => $this->integer(10)->unsigned()->notNull()->defaultValue(0)->comment('登录时间'),
            'status' => $this->smallInteger(1)->unsigned()->notNull()->defaultValue(0)->comment('状态'),
        ], $tableOptions . " COMMENT='管理员'");

        $this->createTable('{{%admin_auth}}', [
            'key' => $this->string(30)->notNull()->comment('标识'),
            'name' => $this->string(60)->notNull()->comment('名称'),
            'parent' => $this->string(30)->notNull()->defaultValue('')->comment('父级'),
            'description' => $this->string()->notNull()->defaultValue('')->comment('说明'),
            'route' => $this->text()->notNull()->comment('路由'),
        ], $tableOptions . " COMMENT='管理角色'");

        $this->addPrimaryKey('Auth Key', '{{%admin_auth}}', 'key');

        $this->createTable('{{%admin_role}}', [
            'id' => $this->bigPrimaryKey()->unsigned()->comment('角色 ID'),
            'name' => $this->string(255)->notNull()->comment('名称'),
            'description' => $this->string(255)->notNull()->defaultValue('')->comment('说明'),
            'auth' => $this->text()->comment('权限'),
            'route' => $this->text()->comment('路由'),
            'status' => $this->smallInteger(1)->unsigned()->notNull()->defaultValue(0)->comment('状态'),
        ], $tableOptions . " COMMENT='管理角色'");

        $this->createTable('{{%menu}}', [
            'id' => $this->bigPrimaryKey()->unsigned()->comment('菜单 ID'),
            'parent_id' => $this->bigInteger(20)->notNull()->defaultValue(0)->comment('父级'),
            'name' => $this->string(30)->notNull()->comment('名称'),
            'icon' => $this->string(30)->notNull()->defaultValue('')->comment('图标'),
            'child' => $this->smallInteger(1)->unsigned()->notNull()->defaultValue(0)->comment('有子级'),
            'parent_arr' => $this->string()->notNull()->defaultValue(0)->comment('父级链'),
            'child_arr' => $this->text()->comment('子级群'),
            'controller' => $this->string(30)->notNull()->defaultValue('')->comment('控制器'),
            'action' => $this->string(30)->notNull()->defaultValue('')->comment('方法'),
            'params' => $this->string(255)->notNull()->defaultValue('')->comment('参数'),
            'auth_item' => $this->string(30)->notNull()->defaultValue('')->comment('权限'),
            'sort' => $this->bigInteger()->unsigned()->notNull()->defaultValue(0)->comment('排序'),
            'status' => $this->smallInteger(1)->notNull()->defaultValue(0)->comment('状态'),
        ], $tableOptions . " COMMENT='菜单'");

        $this->createTable('{{%config}}', [
            'key' => $this->string()->unique()->notNull()->comment('配置Key'),
            'value' => $this->string()->notNull()->comment('配置值'),
            'description' => $this->string()->notNull()->comment('描述'),
        ], $tableOptions . ' COMMENT="系统配置"');

        $this->addPrimaryKey('Set Key', '{{%config}}', 'key');

        $this->createTable('{{%category}}', [
            'id' => $this->bigPrimaryKey()->unsigned()->comment('分类 ID'),
            'parent_id' => $this->bigInteger()->unsigned()->notNull()->defaultValue(0)->comment('父级分类'),
            'name' => $this->string(60)->notNull()->comment('名称'),
            'slug' => $this->string()->unique()->comment('识别字串'),
            'child' => $this->smallInteger(1)->unsigned()->notNull()->defaultValue(0)->comment('是否有子级'),
            'parent_arr' => $this->string()->notNull()->defaultValue(0)->comment('父级链'),
            'child_arr' => $this->text()->comment('子级群'),
            'sort' => $this->bigInteger()->unsigned()->notNull()->defaultValue(0)->comment('排序'),
            'status' => $this->smallInteger(1)->unsigned()->notNull()->defaultValue(0)->comment('状态'),
        ], $tableOptions . ' COMMENT="分类"');

        $this->createTable('{{%product}}', [
            'id' => $this->bigPrimaryKey()->unsigned()->comment('产品 ID'),
            'category_id' => $this->bigInteger()->unsigned()->notNull()->comment('分类 ID'),
            'name' => $this->string(60)->notNull()->comment('名称'),
            'slug' => $this->string()->unique()->comment('识别字串'),
            'preview' => $this->string()->notNull()->defaultValue('')->comment('主图'),
            'features' => $this->string()->comment('特点'),
            'specification' => $this->text()->comment('规格'),
            'status' => $this->smallInteger(1)->unsigned()->notNull()->defaultValue(0)->comment('状态'),
        ], $tableOptions . ' COMMENT="产品"');

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
    }

    public function down()
    {
        $this->dropTable('{{%admin}}');
        $this->dropTable('{{%admin_auth}}');
        $this->dropTable('{{%admin_role}}');
        $this->dropTable('{{%menu}}');
        $this->dropTable('{{%config}}');
        $this->dropTable('{{%category}}');
        $this->dropTable('{{%product}}');
        $this->dropTable('{{%news}}');
    }
}
