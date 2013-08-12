<?php $this->start('pageTitle'); ?>
<h2><?php echo Inflector::humanize($this->request->action) . ' ' .  $singularHumanName; ?></h2>
<?php $this->end(); ?>

<?php
  $primaryKeyValue = $this->Form->value("{$modelClass}.{$primaryKey}");
  if (empty($primaryKeyValue) && !empty(${$singularVar})) {
    $primaryKeyValue =  ${$singularVar}[$modelClass][$primaryKey];
  }
?>

<div class="<?php echo $pluralVar; ?> form scaffold-view">
  <?php echo $this->Form->create(null, array('type' => 'delete')); ?>
    <?php echo $this->element('redirect_url'); ?>
    <p><?php echo  __d('cake', 'Are you sure you want to delete # %s?', $primaryKeyValue); ?></p>
    <div class="submit">
    <?php
      echo $this->Form->submit(__d('crud', 'Delete'), array('name' => '_delete', 'div' => false, 'class' => 'btn btn-delete'));
      echo "&nbsp;";
      echo $this->Form->submit(__d('crud', 'Cancel'), array('name' => '_cancel', 'div' => false, 'class' => 'btn btn-alt-option btn-save-cancel'));
      echo "&nbsp;";
    ?>
    </div>
  <?php echo $this->Form->end(); ?>
</div>