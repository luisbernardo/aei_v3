<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Curso;

/**
 * CursoSearch represents the model behind the search form about `app\models\Curso`.
 */
class CursoSearch extends Curso
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_CURSO', 'FK_ID_ENTIDADE', 'GRAU', 'ECTS', 'DURACAO', 'ESTADO'], 'integer'],
            [['NOME', 'SIGLA', 'REGIME', 'LOCAL', 'DESCRICAO', 'SAIDAS'], 'safe'],
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
        $query = Curso::find();

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
            'ID_CURSO' => $this->ID_CURSO,
            'FK_ID_ENTIDADE' => $this->FK_ID_ENTIDADE,
            'GRAU' => $this->GRAU,
            'ECTS' => $this->ECTS,
            'DURACAO' => $this->DURACAO,
            'ESTADO' => $this->ESTADO,
        ]);

        $query->andFilterWhere(['like', 'NOME', $this->NOME])
            ->andFilterWhere(['like', 'SIGLA', $this->SIGLA])
            ->andFilterWhere(['like', 'REGIME', $this->REGIME])
            ->andFilterWhere(['like', 'LOCAL', $this->LOCAL])
            ->andFilterWhere(['like', 'DESCRICAO', $this->DESCRICAO])
            ->andFilterWhere(['like', 'SAIDAS', $this->SAIDAS]);

        return $dataProvider;
    }
}
