<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ato_profissao".
 *
 * @property integer $ID_ATO_PROFISSAO
 * @property integer $FK_ID_PAI
 * @property string $NUMERACAO_ATO
 * @property string $DESIGNACAO
 * @property string $DESCRICAO
 * @property integer $ESTADO
 * @property string $SIGLA
 *
 * @property AtoProfissao $fKIDPAI
 * @property AtoProfissao[] $atoProfissaos
 * @property CoberturaAtosUc[] $coberturaAtosUcs
 */
class AtoProfissao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ato_profissao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_ATO_PROFISSAO', 'NUMERACAO_ATO', 'DESIGNACAO', 'DESCRICAO', 'ESTADO'], 'required'],
            [['ID_ATO_PROFISSAO', 'FK_ID_PAI', 'ESTADO'], 'integer'],
            [['DESIGNACAO', 'DESCRICAO'], 'string'],
            [['NUMERACAO_ATO'], 'string', 'max' => 45],
            [['SIGLA'], 'string', 'max' => 10],
            [['FK_ID_PAI'], 'exist', 'skipOnError' => true, 'targetClass' => AtoProfissao::className(), 'targetAttribute' => ['FK_ID_PAI' => 'ID_ATO_PROFISSAO']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_ATO_PROFISSAO' => 'ID Ato de Profissão',
            'FK_ID_PAI' => 'ID Grupo Superior',
            'NUMERACAO_ATO' => 'Numeração do Ato',
            'DESIGNACAO' => 'Designação',
            'DESCRICAO' => 'Descrição',
            'ESTADO' => 'Estado',
            'SIGLA' => 'Sigla'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFKIDPAI()
    {
        return $this->hasOne(AtoProfissao::className(), ['ID_ATO_PROFISSAO' => 'FK_ID_PAI']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtoProfissaos()
    {
        return $this->hasMany(AtoProfissao::className(), ['FK_ID_PAI' => 'ID_ATO_PROFISSAO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoberturaAtosUcs()
    {
        return $this->hasMany(CoberturaAtosUc::className(), ['ID_ATO_PROFISSAO' => 'ID_ATO_PROFISSAO']);
    }
}
