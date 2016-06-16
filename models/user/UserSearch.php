<?php

namespace app\models\user;

use dektrium\user\Finder;
use yii\data\ActiveDataProvider;
use Yii;

class UserSearch extends \dektrium\user\models\Usersearch{

	/* @var string */
	public $type;

	/** @var string */
    public $username;

    /** @var string */
    public $email;

    /** @var int */
    public $created_at;

    /** @var string */
    public $registration_ip;

    /** @var Finder */
    protected $finder;
	
	public function __construct(Finder $finder, $config = [])
	{
		$this->finder = $finder;
		parent::__construct($finder, $config);
	}

	public function rules()
	{
		return [
			'fieldsSafe' => [['username', 'email', 'registration_ip', 'created_at', 'type'], 'safe'],
			'createdDefault' => ['created_at', 'default', 'value' => null],
			'typePattern' => ['type', 'match', 'pattern' => '/^(admin|manager|partner)$/']
		];
	}

	public function attributeLabels()
	{
		return [
			'username'			=> Yii::t('user', 'Username'),
			'email'				=> Yii::t('user', 'Email'),
			'created_at'		=> Yii::t('user', 'Registration time'),
			'registration_ip'	=> Yii::t('user', 'Registration ip'),
			'type'				=> Yii::t('app',  'Account type')
		];
	}

	public function search($params)
	{
		$query = $this->finder->getUserQuery();

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		if ($this->created_at !== null) {
			$date = strtotime($this->created_at);
			$query->andFilterWhere(['between', 'created_at', $date, $date + 3600 * 24]);
		}

		$query->andFilterWhere(['type' => $this->type]);

		$query->andFilterWhere(['like', 'username', $this->username])
			->andFilterWhere(['like', 'email', $this->email])
			->andFilterWhere(['registration_ip' => $this->registration_ip]);

		return $dataProvider;
	}
}