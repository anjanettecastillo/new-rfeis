<?php if (session()->get('success_login')) : ?>
    <script type="text/javascript">
        alert_login_success('<?= session()->get('success_login') ?>');
    </script>
<?php endif; ?>

<?php if (isset($_SESSION['success'])) : ?>
    <script type="text/javascript">
        alert_success('<?= $_SESSION['success']; ?>');
    </script>
<?php endif; ?>

<?php if (isset($_SESSION['error'])) : ?>
    <script type="text/javascript">
        alert_error('<?= $_SESSION['error']; ?>');
    </script>
<?php endif; ?>