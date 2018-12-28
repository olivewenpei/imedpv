<!-- This Login Page was applied layout which located in template/layout/login.ctp -->
<?php $this->assign('title', 'iMedPV'); ?>
<?= $this->Form->create('login',['class'=>'login']) ?>
<img src="/img/logo-2.png" class="logo">
<?= $this->Form->control('email',['type'=>'user','label'=>['id'=>'user', 'text'=>'E-mail']]) ?>
<?= $this->Form->control('password',['type'=>'password','label'=>['id'=>'user','text'=>'Password']]) ?>
<?= $this->Form->button('Login',['type'=>'submit','class'=>'btn btn-primary']) ?>
<?= $this->Form->end() ?>
		