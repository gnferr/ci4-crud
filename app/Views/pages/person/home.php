<?php $this->extend('layout/template') ?>

<?php $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-md-12 my-3">
            <div class="card">
                <div class="card-header">
                    <h3>List Person<a class="btn btn-primary float-end" data-bs-target="#AddPerson" data-bs-toggle="modal"><i class="fa fa-plus"></i></a></h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="text-center view-person">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="AddPerson" tabindex="-1" aria-labelledby="addPersonLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPersonLabel">Add Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nim Mahasiswa</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="nim_mhs" placeholder="Nim Mahasiswa" aria-label="Store Code">
                                <div class="input-group-append">
                                    <button id="search" class="btn btn-primary" type="button">Search</button>
                                </div>
                            </div>
                            <small id="store-alert"></small>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <!-- <div class="form-group">
                            <label for="external_nim_mahasiswa">External Nim Mahasiswa <b class="text-danger">*</b></label>
                            <input id="external_nim_mahasiswa" type="text" class="form-control" name="external_nim_mahasiswa">
                        </div> -->
                        <div class="form-group">
                            <label for="store_name">Nama Mahasiswa <b class="text-danger">*</b></label>
                            <input id="store_name" type="text" class="form-control" name="store_name">
                        </div>
                        <div class="form-group">
                            <label for="address"> Program Studi <b class="text-danger">*</b></label>
                            <input id="address" type="text" class="form-control" name="address">
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <div class="form-group">
                            <label for="city">Tahun Masuk <b class="text-danger">*</b></label>
                            <input id="city" type="text" class="form-control" name="city">
                        </div>
                        <div class="form-group">
                            <label for="org_code">Tempat Lahir <b class="text-danger">*</b></label>
                            <input id="org_code" type="text" class="form-control" name="org_code">
                        </div>

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button id="save" type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
<script>
    function personData() {
        $.ajax({
            url: "<?= base_url('person/getPerson'); ?>",
            dataType: "json",
            success: function(response) {
                $('.view-person').html(response.data)
            }
        })
    }
    $(document).ready(function() {
        personData();
    })
</script>
<?php $this->endSection() ?>