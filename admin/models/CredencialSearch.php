<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Credencial;

/**
 * CredencialSearch represents the model behind the search form about `app\models\Credencial`.
 */
class CredencialSearch extends Credencial
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IDCREDENCIAL', 'ESTADO'], 'integer'],
            [['PASSWORD_ADMINISTRACAO', 'USERNAME_ADMINISTRACAO'], 'safe'],
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
        $query = Credencial::find();

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
            'IDCREDENCIAL' => $this->IDCREDENCIAL,
            'ESTADO' => $this->ESTADO,
        ]);

        $query->andFilterWhere(['like', 'PASSWORD_ADMINISTRACAO', $this->PASSWORD_ADMINISTRACAO])
            ->andFilterWhere(['like', 'USERNAME_ADMINISTRACAO', $this->USERNAME_ADMINISTRACAO]);

        return $dataProvider;
    }
}
