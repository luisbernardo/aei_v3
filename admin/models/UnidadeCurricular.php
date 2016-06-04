<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unidade_curricular".
 *
 * @property integer $ID_UNIDADE_CURRICULAR
 * @property integer $ID_CURSO
 * @property string $NOME
 * @property integer $ECTS
 * @property integer $ANO
 * @property string $SIGLA
 * @property integer $ESTADO
 *
 * @property CoberturaAtosUc[] $coberturaAtosUcs
 * @property Curso $iDCURSO
 */
class UnidadeCurricular extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unidade_curricular';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_UNIDADE_CURRICULAR', 'ID_CURSO', 'NOME', 'ECTS', 'ANO', 'SIGLA', 'ESTADO'], 'required'],
            [['ID_UNIDADE_CURRICULAR', 'ID_CURSO', 'ECTS', 'ANO', 'ESTADO'], 'integer'],
            [['NOME'], 'string', 'max' => 255],
            [['SIGLA'], 'string', 'max' => 10],
            [['ID_CURSO'], 'exist', 'skipOnError' => true, 'targetClass' => Curso::className(), 'targetAttribute' => ['ID_CURSO' => 'ID_CURSO']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_UNIDADE_CURRICULAR' => 'ID Unidade Curricular',
            'ID_CURSO' => 'Curso',
            'NOME' => 'Nome',
            'ECTS' => 'ECTS',
            'ANO' => 'Ano',
            'SIGLA' => 'Sigla',
            'ESTADO' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoberturaAtosUcs()
    {
        return $this->hasMany(CoberturaAtosUc::className(), ['ID_UC' => 'ID_UNIDADE_CURRICULAR']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDCURSO()
    {
        return $this->hasOne(Curso::className(), ['ID_CURSO' => 'ID_CURSO']);
    }
}
