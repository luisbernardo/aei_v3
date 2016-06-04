<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UnidadeCurricular;

/**
 * UnidadeCurricularSearch represents the model behind the search form about `app\models\UnidadeCurricular`.
 */
class UnidadeCurricularSearch extends UnidadeCurricular
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_UNIDADE_CURRICULAR', 'ID_CURSO', 'ECTS', 'ANO', 'ESTADO'], 'integer'],
            [['NOME', 'SIGLA'], 'safe'],
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
        $query = UnidadeCurricular::find();

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
            'ID_UNIDADE_CURRICULAR' => $this->ID_UNIDADE_CURRICULAR,
            'ID_CURSO' => $this->ID_CURSO,
            'ECTS' => $this->ECTS,
            'ANO' => $this->ANO,
            'ESTADO' => $this->ESTADO,
        ]);

        $query->andFilterWhere(['like', 'NOME', $this->NOME])
            ->andFilterWhere(['like', 'SIGLA', $this->SIGLA]);

        return $dataProvider;
    }
}
