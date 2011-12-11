<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
<?php include_http_metas() ?>
<?php include_metas() ?>
<?php include_title() ?>
<?php include_stylesheets() ?>
<?php if (Doctrine::getTable('SnsConfig')->get('customizing_css')): ?>
<link rel="stylesheet" type="text/css" href="<?php echo url_for('@customizing_css') ?>" />
<link rel="stylesheet" type="text/css" media="screen" href="/web/sfJqueryReloadedPlugin/css/jQueryPlugin.css">
<?php endif; ?>
<?php echo $op_config->get('pc_html_head') ?>
<?php include_javascripts() ?>
<script src="/web/sfJqueryReloadedPlugin/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="/web/sfJqueryReloadedPlugin/js/plugins/jquery.contactable.packed.js" type="text/javascript"></script>
<script src="/web/sfJqueryReloadedPlugin/js/plugins/jquery.validate.pack.js" type="text/javascript"></script>
<script src="/web/sfJqueryReloadedPlugin/js/plugins/mobilyslider.js" type="text/javascript"></script>
<script src="/web/sfJqueryReloadedPlugin/js/plugins/jquery.autopager.js" type="text/javascript"></script>
<script src="/web/sfJqueryReloadedPlugin/js/plugins/shadowbox.js" type="text/javascript"></script>
<script language='JavaScript' type='text/javascript'>
    jQuery.noConflict();
</script>
</head>


<body id="<?php printf('page_%s_%s', $view->getModuleName(), $view->getActionName()) ?>" class="<?php echo opToolkit::isSecurePage() ? 'secure_page' : 'insecure_page' ?>">
<?php echo $op_config->get('pc_html_top2') ?>
<div id="Body">
<?php echo $op_config->get('pc_html_top') ?>
<div id="Container">

<div id="Header">
<div id="HeaderContainer">
<h1><?php echo link_to($op_config['sns_name'], '@homepage') ?></h1>


<!-- Loginform -->
<?php if ($sf_user->isSNSMember()): ?>
<?php echo op_banner('top_after') ?>
<?php else: ?>
<?php echo op_banner('top_before') ?>
<div id="MailAddressLogin" class="loginForm">
<form action="/web/member/login/authMode/MailAddress" method="post"> 
<table>
<tr>
<td><label for="authMailAddress_mail_address"><font color=white><?php echo __('Mail address') ?></font></label></td>
<td><label for="authMailAddress_password"><font color=white><?php echo __('Password') ?></font></label></td>
</tr>
<tr>
<td><input type="text" name="authMailAddress[mail_address]" size="35" id="authMailAddress_mail_address" placeholder="<?php echo __('Mail address') ?>">  </td>
<td><input type="password" name="authMailAddress[password]" size="35" id="authMailAddress_password" placeholder="<?php echo __('Password') ?>">  </td>
<td><input type="submit" class="input_submit" value="<?php echo __('Login') ?>"></td>
</tr>
<tr>
<td><input type="checkbox" name="authMailAddress[is_remember_me]" id="authMailAddress_is_remember_me"><input value="member/login" type="hidden" name="authMailAddress[next_uri]" id="authMailAddress_next_uri"><label for="authMailAddress_is_remember_me"><font color=white>&nbsp;<?php echo __('Remember me') ?></font></label></td>
<td><span class="password_query"><a href="/web/opAuthMailAddress/helpLoginError"><?php echo __('Can not access your account?') ?></a></span></td>
</tr>
</table>
</form>
</div>
<?php endif ?>
</div>

<?php include_partial('global/header') ?>

</div><!-- HeaderContainer -->
</div><!-- Header -->


<?php echo $op_config->get('pc_html_top') ?>
<div id="blankbox">
<div id="blankContainer">
<div id="sideBanner">
<?php include_component('default', 'sideBannerGadgets'); ?>
</div><!-- sideBanner -->
</div><!-- blankContainer -->
</div><!-- blankbox -->


<div id="Contents">
<div id="ContentsContainer">

<div id="localNav">
<?php
$context = sfContext::getInstance();
$module = $context->getActionStack()->getLastEntry()->getModuleName();
$localNavOptions = array(
  'is_secure' => opToolkit::isSecurePage(),
  'type'      => sfConfig::get('sf_nav_type', sfConfig::get('mod_'.$module.'_default_nav', 'default')),
  'culture'   => $context->getUser()->getCulture(),
);
if ('default' !== $localNavOptions['type'])
{
  $localNavOptions['nav_id'] = sfConfig::get('sf_nav_id', $context->getRequest()->getParameter('id'));
}
include_component('default', 'localNav', $localNavOptions);
?>
</div><!-- localNav -->

<div id="Layout<?php echo $layout ?>" class="Layout">

<?php if ($sf_user->hasFlash('error')): ?>
<?php op_include_parts('alertBox', 'flashError', array('body' => __($sf_user->getFlash('error'), $sf_data->getRaw('sf_user')->getFlash('error_params', array())))) ?>
<?php endif; ?>
<?php if ($sf_user->hasFlash('notice')): ?>
<?php op_include_parts('alertBox', 'flashNotice', array('body' => __($sf_user->getFlash('notice'), $sf_data->getRaw('sf_user')->getFlash('notice_params', array())))) ?>
<?php endif; ?>

<?php if (has_slot('op_top')): ?>
<div id="Top">
<?php include_slot('op_top') ?>
</div><!-- Top -->
<?php endif; ?>

<?php if (has_slot('op_sidemenu')): ?>
<div id="Left">
<?php include_slot('op_sidemenu') ?>
</div><!-- Left -->
<?php endif; ?>

<div id="Center">
<?php echo $sf_content ?>
</div><!-- Center -->

<?php if (has_slot('op_bottom')): ?>
<div id="Bottom">
<?php include_slot('op_bottom') ?>
</div><!-- Bottom -->
<?php endif; ?>

</div><!-- Layout -->

</div><!-- ContentsContainer -->
</div><!-- Contents -->

<div class="color"> 
</div>
<div id="Footer">
<div id="FooterContainer">
<?php include_partial('global/footer') ?>
</div><!-- FooterContainer -->
</div><!-- Footer -->

<?php echo $op_config->get('pc_html_bottom2') ?>
</div><!-- Container -->
<?php echo $op_config->get('pc_html_bottom') ?>
</div><!-- Body -->
</body>
</html>
