<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;
?>
<!DOCTYPE html>
<html lang="en">
  
 <head>
    <meta charset="utf-8">
    <title>Register - SIB R-ZIS UGM</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
<link href="<?php echo $this->theme->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->theme->baseUrl; ?>/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

<link href="<?php echo $this->theme->baseUrl; ?>/css/font-awesome.css" rel="stylesheet">
    
<link href="<?php echo $this->theme->baseUrl; ?>/css/style.css" rel="stylesheet" type="text/css">
<link href="<?php echo $this->theme->baseUrl; ?>/css/pages/signin.css" rel="stylesheet" type="text/css">

</head>

<body>
	
	<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<a class="brand" href="<?= Url::to(['user/index']); ?>">
				SIB R-ZIS UGM				
			</a>		
			
			<div class="nav-collapse">
				<ul class="nav pull-right">

					<li class="">                       
                        <a href="<?= Url::to(['site/register']); ?>" class="">
                              <h3>Register</h3>
                        </a>
                        
                    </li>
                    <li class="">                       
                        <a href="<?= Url::to(['site/login']); ?>" class="">
                              <h3>Login</h3>
                        </a>
                        
                    </li>
				</ul>
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->



<div class="account-container register">
	
	<div class="content clearfix">

	<?php $form = ActiveForm::begin([
        'id' => 'login-form',
    ]); ?>
		
		
			<h1>Register</h1>			
			
			<div class="login-fields">
				
				<div class="field">
					<label for="email">Email Address:</label>
					 <?= $form->field($model, 'email')->textInput(['class'=>'login','placeholder'=>'Email'])->label(false); ?>	
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Password:</label>
					<?= $form->field($model, 'password')->passwordInput(['class'=>'login','placeholder'=>'Password'])->label(false); ?>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="confirm_password">Confirm Password:</label>
					<?= $form->field($model, 'confirm_password')->passwordInput(['class'=>'login','placeholder'=>'Confirm Password'])->label(false);  ?>
				</div> <!-- /field -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
									
				<?= Html::submitButton('Register', ['class' => 'button btn btn-primary btn-large', 'name' => 'login-button']) ?>
				
			</div> <!-- .actions -->
		 <?php ActiveForm::end(); ?>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->


<!-- Text Under Box -->
<div class="login-extra">
	Already have an account? <a href="<?= Url::to(['site/login']); ?>">Login to your account</a>
</div> <!-- /login-extra -->


<script src="<?php echo $this->theme->baseUrl; ?>/js/jquery-1.7.2.min.js"></script>
<script src="<?php echo $this->theme->baseUrl; ?>/js/bootstrap.js"></script>

<script src="<?php echo $this->theme->baseUrl; ?>/js/signin.js"></script>

</body>

 </html>
