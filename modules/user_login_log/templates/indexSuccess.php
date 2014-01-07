<?php use_helper('I18N', 'Date') ?>
<?php include_partial('user_login_log/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('user_login_log/List', array(), 'messages') ?></h1>

  <?php include_partial('user_login_log/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('user_login_log/list_header', array('pager' => $pager)) ?>
  </div>

  <div id="sf_admin_content">
    <ul class="sf_admin_actions">
      <?php include_partial('user_login_log/list_actions', array('helper' => $helper)) ?>
    </ul>
  </div>

  <div id="sf_admin_content">
    <form action="<?php echo url_for('user_login_log_collection', array('action' => 'batch')) ?>" method="post">
    <?php include_partial('user_login_log/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    
    </form>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('user_login_log/list_footer', array('pager' => $pager)) ?>
  </div>
  
    <div id="sf_admin_bar">
    <?php include_partial('user_login_log/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
  </div>
</div>
