<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'PTSI1516 - AEI',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],        
    ]);
    if(!Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Dados Estáticos',
                'items' => [ 
                           ['label' => 'Carregar', 'url' => ['/site/dadosestaticos']],
                           ['label' => 'Descarregar', 'url' => ['/site/descarregardados']]
                       ]
            ];
        $menuItems[] = ['label' => 'Cobertura',
                'items' => [ 
                           ['label' => 'Carregar', 'url' => ['/site/cobertura']],
                           ['label' => 'Descarregar', 'url' => ['/site/descarregarcobertura']]
                       ]
            ];
        $menuItems[] = ['label' => 'Credenciais',
                'items' => [
                                ['label' => 'Criar', 'url' => ['/credencial/create']],
                                ['label' => 'Visualizar', 'url' => ['/credencial/index']]
                            ]
            ];
        $menuItems[] = ['label' => 'Entidades',
                'items' => [
                                ['label' => 'Criar', 'url' => ['/entidade/create']],
                                ['label' => 'Visualizar', 'url' => ['/entidade/index']]
                            ]
            ];
        $menuItems[] = ['label' => 'Cursos',
                'items' => [
                                ['label' => 'Criar', 'url' => ['/curso/create']],
                                ['label' => 'Visualizar', 'url' => ['/curso/index']]
                            ]
            ];
        $menuItems[] = ['label' => 'Unidades Curriculares',
                'items' => [
                                ['label' => 'Criar', 'url' => ['/unidade-curricular/create']],
                                ['label' => 'Visualizar', 'url' => ['/unidade-curricular/index']]
                            ]
            ];
        $menuItems[] = ['label' => 'Atos de Profissão',
                'items' => [
                                ['label' => 'Criar', 'url' => ['/ato-profissao/create']],
                                ['label' => 'Visualizar', 'url' => ['/ato-profissao/index']]
                            ]
            ];
        $menuItems[] = [
                    'label' => 'Logout',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
    } else {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; PTSI1516 - AEI <?= date('Y') ?></p> 
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
