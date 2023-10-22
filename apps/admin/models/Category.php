<?php

namespace admin\models;

use common\libs\Utils;
use ijony\admin\enums\StatusEnum;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property int $id 分类 ID
 * @property int $parent_id 父级分类
 * @property string $name 名称
 * @property string|null $slug 识别字串
 * @property int $child 是否有子级
 * @property string $parent_arr 父级链
 * @property string|null $child_arr 子级群
 * @property int $sort 排序
 * @property int $status 状态
 *
 * @property Category $parent
 * @property Product[] $product
 */
class Category extends \common\models\Category
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['child', 'parent_id', 'parent_arr', 'sort'], 'default', 'value' => 0],
            ['status', 'default', 'value' => StatusEnum::STATUS_ACTIVE],
            ['status', 'in', 'range' => [StatusEnum::STATUS_INACTIVE, StatusEnum::STATUS_ACTIVE]],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'status' => '启用',
            'child' => '子分类',
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Category::class, ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasMany(Product::class, ['category_id' => 'id']);
    }

    /**
     * {@inheritdoc}
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

        if (!$this->slug) {
            $this->slug = Utils::genSlug($this->name);
        }

        return parent::beforeSave($insert);
    }

    /**
     * {@inheritdoc}
     */
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if($insert){ // 如果是插入操作，只更新父级分类的子集
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

            $this->child_arr = (string) $this->id;
            $this->parent_arr = (string) $this->parent_arr;
            $this->save();
        }else{ // 如果是更新操作，判断是否修改了父级分类，如果是就从原来的所有父级的子集中移除，并添加到新的所有父级的子集中
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

            // 如果更新了状态，同步到所有子级
            if(isset($changedAttributes['status'])){
                if($this->child != 0){
                    static::updateAll(['status' => $this->status], ['parent_id' => $this->id]);
                }
            }
        }

        // 如果更新了排序，更新所有父级的子集数据的排序
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

    /**
     * {@inheritdoc}
     */
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
     * @return array
     */
    public function getParentIds()
    {
        if (!$this->parent_arr) {
            return [0];
        }

        $parent_arr = explode(",", $this->parent_arr);

        return $parent_arr;
    }

    /**
     * @return array
     */
    public function getChildrenIds()
    {
        $child_arr = explode(",", $this->child_arr);

        return $child_arr;
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

        if ($exclude) {
            if (is_string($exclude)) {
                $exclude = explode(",", $exclude);
            }
            $query->andFilterWhere(['not in', 'id', (array) $exclude]);
        }

        $items = $query->all();

        if (!$items) {
            return [];
        }

        $data = [];

        if ($parent_id) {
            $data[$parent_id] = '请选择';
        } else {
            $data[0] = '请选择';
        }

        foreach ($items as $item) {
            $data[$item->id] = $item->name;
        }

        return $data;
    }

    /**
     * @return string
     */
    public function getParentButton()
    {
        if ($this->parent) {
            return Html::a($this->parent->name, ['category/index', 'Category[parent_id]' => $this->parent->parent_id]);
        }

        return '';
    }

    /**
     * @return string
     */
    public function getChildButton()
    {
        if ($this->child) {
            return Html::a($this->name, ['category/index', 'Category[parent_id]' => $this->id]);
        }

        return $this->name;
    }
}