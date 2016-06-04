<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AtoProfissao;

/**
 * AtoProfissaoSearch represents the model behind the search form about `app\models\AtoProfissao`.
 */
class AtoProfissaoSearch extends AtoProfissao
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_ATO_PROFISSAO', 'FK_ID_PAI', 'ESTADO'], 'integer'],
            [['NUMERACAO_ATO', 'DESIGNACAO', 'DESCRICAO'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = AtoProfissao::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ID_ATO_PROFISSAO' => $this->ID_ATO_PROFISSAO,
            'FK_ID_PAI' => $this->FK_ID_PAI,
            'ESTADO' => $this->ESTADO,
        ]);

        $query->andFilterWhere(['like', 'NUMERACAO_ATO', $this->NUMERACAO_ATO])
            ->andFilterWhere(['like', 'DESIGNACAO', $this->DESIGNACAO])
            ->andFilterWhere(['like', 'DESCRICAO', $this->DESCRICAO]);

        return $dataProvider;
    }
}
