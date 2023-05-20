<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Data Buku</h2>
                <h5 class="text-white op-7 mb-2">Halaman Pengelolaan Buku</h5>
            </div>
        </div>
    </div>
</div>

<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#tambahData">
                            Tambah Data
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display table table-striped table-hover" id="tblku">
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal Tambah-->
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-size: 20px;">Tambah Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group col-md-12">
                    <label>Kode Buku</label>
                    <input type="text" id="txtkode" class="form-control ftambah" autocomplete="off">
                </div>
                <div class="form-group col-md-12">
                    <label>Judul</label>
                    <input type="text" id="txtjudul" class="form-control ftambah" autocomplete="off">
                </div>
                <div class="form-group col-md-12">
                    <label>ISBN</label>
                    <input type="text" id="txtISBN" class="form-control ftambah" autocomplete="off">
                </div>
                <div class="form-group col-md-12">
                    <label>Pengarang</label>
                    <select id="txtpengarang" class="form-control ">
                        <option value="">Pilih Salah Satu</option>
                        <?php if (is_array($dtpengarang)) {
                            if (count($dtpengarang) > 0) {
                                foreach ($dtpengarang as $k) {
                                    $id = $k['ID_Pengarang'];
                                    $nama = $k['Nama_Pengarang'];
                                    echo "<option value='$id'>$nama</option>";
                                }
                            }
                        } ?>
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label>Penerbit</label>
                    <select id="txtpenerbit" class="form-control ">
                        <option value="">Pilih Salah Satu</option>
                        <?php if (is_array($dtpenerbit)) {
                            if (count($dtpenerbit) > 0) {
                                foreach ($dtpenerbit as $k) {
                                    $id = $k['ID_Penerbit'];
                                    $nama = $k['Nama_Penerbit'];
                                    echo "<option value='$id'>$nama</option>";
                                }
                            }
                        } ?>
                    </select>
                </div>
                <div class="row form-group">
                    <div class="form-group col-md-6">
                        <label>Tahun Terbit</label>
                        <input type="text" id="txttahun" class="form-control ftambah" maxlength="4" autocomplete="off">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Rak</label>
                        <input type="text" id="txtrak" class="form-control ftambah" autocomplete="off">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="reset_tambah_data()" data-dismiss="modal">Reset</button>
                <button type="button" onclick="TambahData()" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Tambah -->

<!-- Modal Read-->
<div class="modal fade" id="readData" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-size: 20px;">Tambah Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group col-md-12">
                    <label>Kode Buku</label>
                    <input type="text" id="txtkodee" class="form-control fupdate" readonly>
                </div>
                <div class="form-group col-md-12">
                    <label>Judul</label>
                    <input type="text" id="txtjudule" class="form-control fupdate" autocomplete="off">
                </div>
                <div class="form-group col-md-12">
                    <label>ISBN</label>
                    <input type="text" id="txtISBNe" class="form-control fupdate" autocomplete="off">
                </div>
                <div class="form-group col-md-12">
                    <label>Pengarang</label>
                    <select id="txtpengarange" class="form-control fupdate">
                        <option value="">Pilih Salah Satu</option>
                        <?php if (is_array($dtpengarang)) {
                            if (count($dtpengarang) > 0) {
                                foreach ($dtpengarang as $k) {
                                    $id = $k['ID_Pengarang'];
                                    $nama = $k['Nama_Pengarang'];
                                    echo "<option value='$id'>$nama</option>";
                                }
                            }
                        } ?>
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label>Penerbit</label>
                    <select id="txtpenerbite" class="form-control fupdate">
                        <option value="">Pilih Salah Satu</option>
                        <?php if (is_array($dtpenerbit)) {
                            if (count($dtpenerbit) > 0) {
                                foreach ($dtpenerbit as $k) {
                                    $id = $k['ID_Penerbit'];
                                    $nama = $k['Nama_Penerbit'];
                                    echo "<option value='$id'>$nama</option>";
                                }
                            }
                        } ?>
                    </select>
                </div>
                <div class="row form-group">
                    <div class="form-group col-md-6">
                        <label>Tahun Terbit</label>
                        <input type="text" id="txttahune" class="form-control fupdate" maxlength="4" autocomplete="off">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Rak</label>
                        <input type="text" id="txtrake" class="form-control fupdate" autocomplete="off">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="deleteBook()">Hapus</button>
                <button type="button" class="btn btn-secondary" onclick="reset_update_data()" data-dismiss="modal">Batal</button>
                <button type="button" " class=" btn btn-primary" onclick="update_data()">Update</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Read -->

<script>
    $(document).ready(function() {
        $('#txtISBN').keyup(function() {
            var text = $(this).val();
            var formattedText = formatText(text);
            $(this).val(formattedText);
        });

        function formatText(text) {
            // Menghapus semua karakter "-" yang ada sebelum memformat ulang
            text = text.replace(/-/g, '');

            // Menambahkan karakter "-" setiap 3 karakter menggunakan regex dan replace
            text = text.replace(/(\d{3})/g, '$1-');
            return text;
        }
    });

    $("#mndata").addClass("active");
    let table = $('#tblku').DataTable({
        responsive: true,
        "ajax": {
            "type": "GET",
            "url": "<?= BASEURLKU ?>getBook",
            "timeout": 0,
            "dataSrc": 'data'
        },
        "sAjaxDataProp": "",
        "width": "100%",
        "order": [
            [0, "asc"]
        ],
        "aoColumns": [{
                "mData": null,
                "title": "KODE BUKU",
                "width": "10%",
                "render": function(data, row, type, meta) {
                    return data.Kode_Buku;
                }
            },
            {
                "mData": null,
                "title": "JUDUL",
                "width": "15%",
                "render": function(data, row, type, meta) {
                    return data.Judul;
                }
            },
            {
                "mData": null,
                "title": "PENGARANG",
                "width": "10%",
                "render": function(data, row, type, meta) {
                    return data.Nama_Pengarang;
                }
            },
            {
                "mData": null,
                "title": "PENERBIT",
                "width": "10%",
                "render": function(data, row, type, meta) {
                    return data.Nama_Penerbit;
                }
            },
            {
                "mData": null,
                "title": "TAHUN",
                "width": "8%",
                "render": function(data, row, type, meta) {
                    return data.Tahun_Terbit;
                }
            },
            {
                "mData": null,
                "title": "ISBN",
                "width": "20%",
                "render": function(data, row, type, meta) {
                    return data.ISBN;
                }
            },
            {
                "mData": null,
                "title": "RAK",
                "width": "10%",
                "render": function(data, row, type, meta) {
                    return data.Rak;
                }
            },
            {
                "mData": null,
                "title": "OPERASI",
                "width": "18%",
                "class": "text-center",
                "sortable": false,
                "render": function(data, row, type, meta) {
                    let btn = '';
                    let d = data.Kode_Buku;
                    btn += "<button style='font-size: 15px;' class='btn btn-primary ' id='kelola' onclick='filter(" + d + ")'  title='Kelola'>Kelola</button> ";


                    return btn;
                }
            }
        ]
    });

    function reset_tambah_data() {
        $('.ftambah').val("");
        $('#txtpenerbit').val("").change();
        $('#txtpengarang').val("").change();
    }

    function reset_update_data() {
        $('.fupdate').val("");
        $('#txtpenerbite').val("").change();
        $('#txtpengarange').val("").change();
    }

    function update_data() {
        let kode = $("#txtkodee").val();
        let judul = $("#txtjudule").val();
        let isbn = $("#txtISBNe").val();
        let pengarang = $("#txtpengarange").val();
        let penerbit = $("#txtpenerbite").val();
        let tahun = $("#txttahune").val();
        let rak = $("#txtrake").val()
        if (kode == "" || judul == "" || isbn == "" || pengarang == "" || pengarang == "" || penerbit == "" || tahun == "" || rak == "") {
            swal({
                title: 'Gagal',
                text: 'Ada Isian Yang Masih Kosong!',
                icon: 'error'
            })
            return;
        }
        $.ajax({
            url: '<?= BASEURLKU; ?>updatedata',
            method: 'POST',
            data: {
                kodex: kode,
                judulx: judul,
                isbnx: isbn,
                pengarangx: pengarang,
                penerbitx: penerbit,
                tahunx: tahun,
                rakx: rak
            },
            cache: false,
            success: function(res) {
                let data = JSON.parse(res);
                if (data.kode == "1") {
                    swal({
                        title: 'Berhasil',
                        text: data.pesan,
                        icon: 'success',
                    });
                    reset_update_data();
                    table.ajax.reload();
                    $('#readData').modal('hide');
                } else {
                    swal({
                        title: 'Gagal',
                        text: data.pesan,
                        icon: 'error'
                    });
                }
            },
            error: function() {
                swal({
                    title: 'Gagal',
                    text: 'Koneksi Ke Controller Gagal!',
                    icon: 'error'
                });
            }
        })
    }

    function filter(es) {
        let kode = es;
        console.log(kode);
        if (kode == "") {
            swal({
                title: 'Gagal',
                text: 'Data Tidak Terdeteksi!',
                icon: 'error'
            })
            return;
        }
        $.ajax({
            url: '<?= BASEURLKU; ?>upBook',
            data: {
                kodex: kode
            },
            method: 'POST',
            cache: false,
            success: function(res) {
                let data = JSON.parse(res)
                if (data.kode == "1") {
                    $("#txtkodee").val(kode);
                    $("#txtjudule").val(data.judul);
                    $("#txtISBNe").val(data.isbn);
                    $("#txtpengarange").val(data.pengarang).change();
                    $("#txtpenerbite").val(data.penerbit).change();
                    $("#txttahune").val(data.tahun);
                    $("#txtrake").val(data.rak);
                    $('#readData').modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                } else {
                    swal({
                        title: 'Gagal',
                        text: data.pesan,
                        icon: 'error'
                    });
                }
            },
            error: function() {
                swal({
                    title: 'Gagal',
                    text: 'Koneksi Ke Controller Gagal!',
                    icon: 'error'
                });
            }
        })

    }

    function TambahData() {

        let kode = $("#txtkode").val();
        let judul = $("#txtjudul").val();
        let isbn = $("#txtISBN").val();
        let pengarang = $("#txtpengarang").val();
        let penerbit = $("#txtpenerbit").val();
        let tahun = $("#txttahun").val();
        let rak = $("#txtrak").val()
        if (kode == "" || judul == "" || isbn == "" || pengarang == "" || pengarang == "" || penerbit == "" || tahun == "" || rak == "") {
            swal({
                title: 'Gagal',
                text: 'Ada Isian Yang Masih Kosong!',
                icon: 'error'
            })
            return;
        }
        $.ajax({
            url: '<?= BASEURLKU; ?>addbook',
            method: 'POST',
            data: {
                kodex: kode,
                judulx: judul,
                isbnx: isbn,
                pengarangx: pengarang,
                penerbitx: penerbit,
                tahunx: tahun,
                rakx: rak
            },
            cache: false,
            success: function(res) {
                let data = JSON.parse(res);


                if (data.kode == "1") {
                    swal({
                        title: 'Berhasil',
                        text: data.pesan,
                        icon: 'success',
                    });
                    reset_tambah_data();
                    table.ajax.reload();
                } else {
                    swal({
                        title: 'Gagal',
                        text: data.pesan,
                        icon: 'error'
                    });
                }
            },
            error: function() {
                swal({
                    title: 'Gagal',
                    text: 'Koneksi Ke Controller Gagal!',
                    icon: 'error'
                });
            }
        })
    }

    function deleteBook() {
        let id = $("#txtkodee").val();
        if (id == "") {
            swal({
                title: 'Gagal',
                text: 'Kode Buku Masih Kosong!',
                icon: 'error'
            });
            return
        }
        swal({
            title: 'Konfirmasi!',
            text: 'Apakah Anda Yakin Ingin Menghapus Data Buku Ini?',
            icon: 'warning',
            buttons: {
                confirm: {
                    text: 'Ya',
                    className: 'btn btn-primary'
                },
                cancel: {
                    visible: true,
                    text: 'Tidak',
                    className: 'btn btn-danger'
                }
            }
        }).then((hapus) => {
            if (hapus) {
                $.ajax({
                    url: '<?= BASEURLKU; ?>delbook',
                    method: 'POST',
                    data: {
                        kodex: id
                    },
                    cache: false,
                    success: function(res) {
                        let data = JSON.parse(res)
                        if (data.kode == '1') {
                            swal({
                                title: 'Berhasil',
                                text: data.pesan,
                                icon: 'success'
                            })
                            reset_update_data();
                            table.ajax.reload();
                            $("#readData").modal('hide');
                        } else {
                            swal({
                                title: 'Gagal',
                                text: data.pesan,
                                icon: 'error'
                            });
                        }
                    },
                    error: function() {
                        swal({
                            title: 'Gagal',
                            text: 'Koneksi Ke Controller Gagal!',
                            icon: 'error'
                        });
                    }
                })
            }
        })
    }
</script>