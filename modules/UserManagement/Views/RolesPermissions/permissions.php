
<?php if (!empty($modules)): ?>
  <?php foreach ($modules as $module): ?>
    <?php foreach ($permission_types as $permission_type): ?>
      <?php foreach ($own_permissions as $permission): ?>
        <?php if ($permission['module_id'] == $module['module_id'] && $permission['permission_type'] == $permission_type['type_id']): ?>
          <span class="badge badge-pill badge-info"><?=ucwords(esc($permission['permission']))?></span>
        <?php endif; ?>
      <?php endforeach; ?>
    <?php endforeach; ?>
  <?php endforeach; ?>

<?php else: ?>
  This roles has no permissions
<?php endif; ?>
