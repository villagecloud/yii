<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $title
 * @property string $category
 * @property string $description
 * @property string $creation_date
 * @property string $due_date
 * @property string $attachment
 * @property int $manager_id
 *
 * @property Users $manager
 */
class Tasks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     *
     */

    //public const TEST_EVENT = 'Email sent';

    public static function tableName()
    {
        return 'tasks';
    }


    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['manager_id'], 'required'],
            [['manager_id'], 'integer'],
            [['title', 'category', 'description', 'creation_date', 'due_date', 'attachment'], 'string', 'max' => 255],
            [['manager_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['manager_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'category' => 'Category',
            'description' => 'Description',
            'creation_date' => 'Creation Date',
            'due_date' => 'Due Date',
            'attachment' => 'Attachment',
            //'manager_id' => 'Manager ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManager()
    {
        return $this->hasOne(Users::className(), ['id' => 'manager_id']);
    }
}
