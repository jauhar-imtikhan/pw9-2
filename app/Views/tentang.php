<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Tentang</h2>
                <h5 class="text-white op-7 mb-2">Halaman Tentang Informasi Sistem</h5>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card card-success">
                <div class="card-body pb-0">
                    <div class="mb-4 mt-2">
                        <h1>Sistem Operasi : <?= $os ?><br>
                            Mac Address : <?= $mac ?><br>
                            Serial : <?= $serial ?>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#mntentang").addClass("active")
</script>