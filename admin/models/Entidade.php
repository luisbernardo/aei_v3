<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "entidade".
 *
 * @property integer $ID_ENTIDADE
 * @property string $NOME
 * @property string $WEBSITE
 * @property integer $ESTADO
 *
 * @property Curso[] $cursos
 */
class Entidade extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'entidade';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_ENTIDADE', 'NOME', 'WEBSITE', 'ESTADO'], 'required'],
            [['ID_ENTIDADE', 'ESTADO'], 'integer'],
            [['NOME', 'WEBSITE'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_ENTIDADE' => 'ID Entidade',
            'NOME' => 'Nome',
            'WEBSITE' => 'Website',
            'ESTADO' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCursos()
    {
        return $this->hasMany(Curso::className(), ['FK_ID_ENTIDADE' => 'ID_ENTIDADE']);
    }
}
