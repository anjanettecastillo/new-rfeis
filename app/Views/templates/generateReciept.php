<?= $this->extend('layout/main') ?>
<?= $this->section('content'); ?>

<!-- Wrap the content of your PDF inside a main tag -->
<main>
    <div class="container-fluid" style="border:1px dashed #000; height: 220pt;">
        <div class="row">
            <div class="col-md-12">
                <center>
                    <h4 class="mt-2">RFEIS Payment Voucher</h4>
                    <h5>(<?= ucwords($value['event_type']).' Event'; ?>)</h5>
                </center>
                <center>
                    <h1 style="font-size: 60pt;"><?= !$value['reservation_fee'] == 0 ? "PHP ". $value['reservation_fee'].'.00': 'FREE'?></h1>
                    <p><?=ucwords($value['event_name']).' ('.ucwords($value['facility_name']).')'?></p>
                    <p>Valid Until: <?=ucwords($value['reservation_date'])?></p>
                </center>
            </div>
        </div>
</main>
<?= $this->endsection('content'); ?>