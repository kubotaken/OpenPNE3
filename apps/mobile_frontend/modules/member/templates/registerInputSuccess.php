<?php op_include_form('registerForm', $form, array(
  'url'    => url_for('member/registerInput?token='.$token),
  'button' => __('Register'),
  'align'  => 'center' 
)) ?>
