<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rich_model".
 *
 * @property integer $id
 * @property string $model_name
 * @property string $model_table_name
 * @property string $model_content
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 */
class RichModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rich_model';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['model_name'], 'string', 'max' => 50],
            [['model_table_name', 'model_content'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'model_name' => '模型名称',
            'model_table_name' => '模型表名称',
            'model_content' => '模型备注',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
            'created_by' => '添加人',
            'updated_by' => '修改人',
        ];
    }
}
