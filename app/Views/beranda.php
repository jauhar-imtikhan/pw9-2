<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Beranda</h2>
                <h5 class="text-white op-7 mb-2">Halaman Beranda Informasi Sistem</h5>
            </div>
        </div>
    </div>
</div>

<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-3">
            <div class="card card-success">
                <div class="card-header">
                    <div class="card-title">Jumlah Total Buku </div>
                </div>
                <div class="card-body pb-0">
                    <div class="mb-4 mt-2">
                        <h1><?= $jmlbuku['Jumlah'] ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-info" data-jenis="bytahun" style="cursor: pointer;" data-nilai="<?= $maxtahun['Tahun_Terbit'] ?>" onclick="rekap_dashboard(this)">
                <div class="card-header">
                    <div class="card-title">Tahun Penerbitan Terbanyak</div>
                </div>
                <div class="card-body pb-0">
                    <div class="mb-4 mt-2">
                        <h1><?= $maxtahun['Tahun_Terbit'] . " (" . $maxtahun['Jumlah'] . " Buku )" ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-warning" data-jenis="bypenerbit" style="cursor: pointer;" data-nilai="<?= $maxpenerbit->Penerbit ?>" onclick="rekap_dashboard(this)">
                <div class="card-header">
                    <div class="card-title">Penerbit Terbanyak</div>
                </div>
                <div class="card-body pb-0">
                    <div class="mb-4 mt-2">
                        <h1><?= $maxpenerbit->Penerbit ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-danger" onclick="rekap_dashboard(this)" data-jenis="byrak" style="cursor: pointer;" data-nilai="<?= $maxrak['Rak'] ?>">
                <div class="card-header">
                    <div class="card-title">Rak Penampung Terbanyak</div>
                </div>
                <div class="card-body pb-0">
                    <div class="mb-4 mt-2">
                        <h1>Blok <?= $maxrak['Rak'] ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="blokjudul" style="font-size: 20px;"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="blokhasil" style="font-size: 17px;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>


<script>
    $("#mnberanda").addClass("active");

    function rekap_dashboard(el) {

        let jenis = $(el).data('jenis');
        let nilai = $(el).data('nilai');

        let judul = "";
        if (jenis == "" || nilai == "") {
            swal({
                title: 'Gagal',
                text: 'Rekap Tidak Terdeteksi!',
                icon: 'error'
            })
            return;
        }
        $.getJSON(
            `<?= BASEURLKU; ?>rekapdashboard/${jenis}/${nilai}`,
            function(res) {
                if (res) {
                    let data = "";
                    let daftar = ["success", "primary", "info", "warning", "secondary", "danger", "default"];
                    $.each(res, function(i, obj) {
                        let color = Math.floor(Math.random() * 7);
                        data += `<div class="alert alert-${daftar[color]}  role="alert">${obj.Judul}</div>`
                    })
                    $("#blokhasil").html(data);
                    if (jenis == 'bytahun') {
                        judul = "Rekap Buku Berdasarkan Tahun " + nilai
                    } else if (jenis == 'bypenerbit') {
                        judul = "Rekap Buku Berdasarkan Penerbit " + nilai
                    } else {
                        judul = "Rekap Buku Berdasarkan Rak " + nilai
                    }

                    $("#blokjudul").text(judul)
                    $("#modalDetail").modal('show')
                } else {
                    swal({
                        title: 'Gagal',
                        text: 'Data Tidak Di Temukan!',
                        icon: 'error'
                    })
                    $("#blokhasil").html("")
                }
            }
        )
    }
</script>