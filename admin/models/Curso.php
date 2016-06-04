<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "curso".
 *
 * @property integer $ID_CURSO
 * @property integer $FK_ID_ENTIDADE
 * @property string $NOME
 * @property string $SIGLA
 * @property integer $GRAU
 * @property integer $ECTS
 * @property integer $DURACAO
 * @property string $REGIME
 * @property string $LOCAL
 * @property string $DESCRICAO
 * @property string $SAIDAS
 * @property integer $ESTADO
 *
 * @property Entidade $fKIDENTIDADE
 * @property UnidadeCurricular[] $unidadeCurriculars
 */
class Curso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'curso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_CURSO', 'FK_ID_ENTIDADE', 'NOME', 'SIGLA', 'GRAU', 'ECTS', 'DURACAO', 'REGIME', 'LOCAL', 'DESCRICAO', 'SAIDAS', 'ESTADO'], 'required'],
            [['ID_CURSO', 'FK_ID_ENTIDADE', 'GRAU', 'ECTS', 'DURACAO', 'ESTADO'], 'integer'],
            [['DESCRICAO', 'SAIDAS'], 'string'],
            [['NOME', 'LOCAL'], 'string', 'max' => 255],
            [['SIGLA', 'REGIME'], 'string', 'max' => 10],
            [['FK_ID_ENTIDADE'], 'exist', 'skipOnError' => true, 'targetClass' => Entidade::className(), 'targetAttribute' => ['FK_ID_ENTIDADE' => 'ID_ENTIDADE']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_CURSO' => 'ID Curso',
            'FK_ID_ENTIDADE' => 'Entidade',
            'NOME' => 'Nome',
            'SIGLA' => 'Sigla',
            'GRAU' => 'Grau',
            'ECTS' => 'Ects',
            'DURACAO' => 'Duração',
            'REGIME' => 'Regime',
            'LOCAL' => 'Local',
            'DESCRICAO' => 'Descrição',
            'SAIDAS' => 'Saídas',
            'ESTADO' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFKIDENTIDADE()
    {
        return $this->hasOne(Entidade::className(), ['ID_ENTIDADE' => 'FK_ID_ENTIDADE']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnidadeCurriculars()
    {
        return $this->hasMany(UnidadeCurricular::className(), ['ID_CURSO' => 'ID_CURSO']);
    }
}
