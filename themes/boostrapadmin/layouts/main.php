<?php 
use yii\helpers\Url;
use yii\helpers\Html;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>SIB R-ZIS UGM</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="<?php echo $this->theme->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo $this->theme->baseUrl; ?>/css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="<?php echo $this->theme->baseUrl; ?>/css/font-awesome.css" rel="stylesheet">
<link href="<?php echo $this->theme->baseUrl; ?>/css/style.css" rel="stylesheet">
<link href="<?php echo $this->theme->baseUrl; ?>/css/pages/dashboard.css" rel="stylesheet">
<link href="<?php echo $this->theme->baseUrl; ?>/datepicker/css/datepicker.css" rel="stylesheet">

<script src="<?php echo $this->theme->baseUrl; ?>/js/jquery-1.7.2.min.js"></script> 
<script src="<?php echo $this->theme->baseUrl; ?>/js/bootstrap.js"></script>
<script src="<?php echo $this->theme->baseUrl; ?>/datepicker/js/bootstrap-datepicker.js"></script>
</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="<?php echo Url::home() ?>">SIB R-ZIS UGM</a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i><?php echo Yii::$app->user->identity->email?><b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;">Profile</a></li>
              <li>
                <?php 
                $url = urldecode(Url::toRoute(['site/logout']));
                echo Html::a('logout', $url);
                ?>
              </li>
            </ul>
          </li>
        </ul>
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li class="active"><a href="<?= Url::to(['user/index']); ?>"><i class="icon-user"></i><span>Profil</span> </a> </li>
         <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-pencil"></i><span>Daftar</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
          <?php 
          $Session = Yii::$app->session;
          $status = $Session->get('status');
          if ($status == 1): 
          ?>            
            <li><a href="<?= Url::to(['daftar/perpanjangan']); ?>">Perpanjangan</a></li>
          <?php else : ?>
            <li><a href="<?= Url::to(['daftar/baru']); ?>">Baru</a></li>
          <?php endif ?>
          </ul>
        </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-check"></i><span>Status</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?= Url::to(['registrasi/index']); ?>">Status Pendaftaran</a></li>
            <li><a href="<?= Url::to(['statuskegiatan/index']); ?>">Kegiatan PTH</a></li>
            <li><a href="<?= Url::to(['pth/index']); ?>">PTH</a></li>
          </ul>
        </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-bullhorn"></i><span>Informasi</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?= Url::to(['informasi-wawancara/index']); ?>">Wawancara</a></li>
            <li><a href="<?= Url::to(['informasi-penerima/index']); ?>">Penerima</a></li>
            <li><?= Html::a('RZIS-UGM','http://rumahzis.ugm.ac.id/'); ?></li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
    <div class="container">      
        <?php echo $content; ?>           
    </div>
<div class="footer navbar-fixed-bottom">
  <div class="footer-inner">
    <div class="container">
      <div class="row">
        <div class="span12"> &copy; 2016 <a href="http://www.egrappler.com/">SIB R-ZIS UGM</a>. </div>
        <!-- /span12 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /footer-inner --> 
</div>
<!-- /footer --> 
<script>
  $(document).ready(function(){
        $('.datepicker').datepicker({
        format: 'dd-mm-yyyy'
        });

        });
</script>
</body>
</html>
