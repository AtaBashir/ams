<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

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
                'brandLabel' => Html::img('@web/images/logo.png', ['alt'=>Yii::$app->name]),
            		//img($asset->baseUrl . '/logo.png'),
            		//'Attendance Management System',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Home', 'url' => ['/site/index']],
                    ['label' => 'About', 'url' => ['/site/about']],
                    ['label' => 'Contact', 'url' => ['/site/contact']],


                		//Setup
                		Yii::$app->user->isGuest ?
                		'' :
                		Yii::$app->user->identity->usr_is_admin ?
                		['label' => 'Setup',	'url' => ['#'],
                				'items' => [
                						['label' => 'Campus', 'url' => ['/campus']],   
                						['label' => 'Course Type', 'url' => ['/course-type']],
                						['label' => 'Course', 'url' => ['/course']],
                						['label' => 'Subject', 'url' => ['/subject']],
                						['label' => 'Unit', 'url' => ['/unit']],
                						['label' => 'Teacher', 'url' => ['/teacher']],
                						['label' => 'Student', 'url' => ['/student']],
                						['label' => 'Class', 'url' => ['/clss']],
                						['label' => 'Enrolment', 'url' => ['/enrolment']],
                						['label' => 'Semester', 'url' => ['/semester']],
                						
                				],
                		]
                		: '',
                		
                		//Teacher Services
                		Yii::$app->user->isGuest ?
                		'' :
                		(Yii::$app->user->identity->usr_is_admin || Yii::$app->user->identity->usr_is_teacher)?
                		['label' => 'Teacher Services',	'url' => ['#'],
                				'items' => [
                						['label' => 'Attendance', 'url' => ['/attendance']],
                						['label' => 'Time Table', 'url' => ['/timetable']],
                						['label' => 'Reports', 'url' => ['/reports']],
                				],
                		]
                		: '',
                		
                		//Student Services
                		Yii::$app->user->isGuest ?
                		'' :
                		(Yii::$app->user->identity->usr_is_admin || !Yii::$app->user->identity->usr_is_teacher)?
                		['label' => 'Student Services',	'url' => ['#'],
                				'items' => [
                						['label' => 'Time Table', 'url' => ['/timetable']],
                						['label' => 'Reports', 'url' => ['/reports']],
                				],
                		]
                		: '',                		
                		
                		//User Management
                		Yii::$app->user->isGuest ?
                		'' :
                		Yii::$app->user->identity->usr_is_admin ?
                		['label' => 'User Management',	'url' => ['#'],
                				'items' => [
                						['label' => 'User (Admin)', 'url' => ['/user-admin']],
                		
                		
                						['label' => 'User (Teacher)', 'url' => ['/user-teacher']],
                						['label' => 'User (Student)', 'url' => ['/user-student']],
                				],
                		]
                		: '',
                		
                    Yii::$app->user->isGuest ?
					    
                        ['label' => 'Login', 'url' => ['/site/login']] :
                		
                		['label' =>  Yii::$app->user->identity->usr_id ,	'url' => ['#'],
                			'items' => [
                					['label' => 'Change Password',
                					'url' => ['/site/changepw']],
                       			 ['label' => 'Logout',
                      	      'url' => ['/site/logout'],
                     	       'linkOptions' => ['data-method' => 'post']],
            				],
                		],

            	],
            		
            		
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
            <p class="pull-left">&copy; 4SDev <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
