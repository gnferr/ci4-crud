<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-md-12 my-3">
            <div class="card">
                <div class="card-header">
                    <h3>List Book<a class="btn btn-primary float-end" data-bs-target="#AddData" data-bs-toggle="modal"><i class="fa fa-plus"></i></a></h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="text-center view-data">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Add Data Modal -->
<div class="modal fade" id="AddData" tabindex="-1" aria-labelledby="AddDataLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddDataLabel">New Book</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('book/addBook', ['class' => 'form-tambah', 'id' => 'form-tambah']) ?>
                <?= csrf_field(); ?>
                <div class="mb-1">
                    <label for="title-input" class="col-form-label">Title:</label>
                    <input type="text" class="form-control" name="titleInput" id="title-input">
                    <div class="invalid-feedback error-title">
                    </div>
                </div>
                <div class="mb-1">
                    <label for="author-input" class="col-form-label">Author:</label>
                    <input type="text" class="form-control" id="author-input" name="authorInput">
                    <div class="invalid-feedback error-author">

                    </div>
                </div>
                <div class="mb-1">
                    <label for="publisher-input" class="col-form-label">Publisher:</label>
                    <input type="text" class="form-control" id="publisher-input" name="publisherInput">
                    <div class="invalid-feedback error-publisher">

                    </div>
                </div>
                <div class="mb-1">
                    <label for="cover-input" class="col-form-label">Cover:*</label>
                    <input type="file" class="form-control" id="cover-input" name="coverInput" placeholder="E.g https://pbs.twimg.com/media/Cjj3BctXIAEljbJ.jpg" required>
                </div>
                <div class="mb-1">
                    <label for="sipnosis-input" class="col-form-label">Sipnosis:</label>
                    <textarea class="form-control" placeholder="description..." id="sipnosis-input" style="height: 100px" name="sipnosisInput"></textarea>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-submit">Submit</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
<!-- batas  -->
<div class="modal fade" id="UpdateBuku" tabindex="-1" aria-labelledby="UpdateBukuLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="UpdateBukuLabel">Update Book</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <?= form_open('book/updateBook', ['class' => 'form-update']) ?>
                <?= csrf_field(); ?>
                <input type="hidden" name="id-book" id="id-book">
                <div class="mb-1">
                    <label for="title-book" class="col-form-label">Title:</label>
                    <input type="text" class="form-control" id="title-book" name="titleInput">
                    <div class="invalid-feedback error-title">

                    </div>
                </div>
                <div class="mb-1">
                    <label for="recipient-name" class="col-form-label">Author:</label>
                    <input type="text" class="form-control" id="author-book" name="authorInput">
                    <div class="invalid-feedback error-author">

                    </div>
                </div>
                <div class="mb-1">
                    <label for="recipient-name" class="col-form-label">Publisher:</label>
                    <input type="text" class="form-control" id="publisher-book" name="publisherInput">
                    <div class="invalid-feedback error-publisher">

                    </div>
                </div>
                <div class="mb-1">
                    <label for="cover-book" class="col-form-label">Cover:</label>
                    <input type="file" class="form-control" id="cover-book" name="coverInput" value="./upload">
                </div>
                <div class="mb-1">
                    <label for="sipnosis-book" class="col-form-label">Sipnosis:</label>
                    <textarea class="form-control" placeholder="description..." id="sipnosis-book" style="height: 100px" name="sipnosisInput"></textarea>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-update">Update</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="DetailBuku" tabindex="-1" aria-labelledby="DetailBukuLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DetailBukuLabel">Detail Book</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="upper">
                    <img src="" id="banner_pic">
                </div>
                <div class="user text-center">
                    <div class="profile">
                        <img src="" id="profile_pic" class="border" width="80">
                    </div>
                </div>
                <div class="d-flex flex-column justify-content-between">
                    <div class="mt-4 texto">
                        <div class="text-title">
                            <h4 class="mb-0"><span id="title"></span></h4>
                            <span class="text-muted d-block mb-2"><span id="writer"></span> | <span id="publisher"></span>
                        </div>
                        <div>
                            <span id="sipnosis"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#UpdateBuku">Edit</button> -->
            </div>
        </div>
    </div>
</div>

<script>
    function bookData() {
        $.ajax({
            url: "<?= base_url('book/getBook'); ?>",
            dataType: "json",
            success: function(response) {
                $('.view-data').html(response.data)
            }
        })
    }
    $(document).ready(function() {
        bookData();
    })
    $(document).ready(function() {
        $('.form-tambah').submit(function(e) {
            e.preventDefault();
            $.ajax({
                method: 'post',
                url: $(this).attr('action'),
                dataType: "json",
                data: new FormData(this),
                processData: false,
                contentType: false,
                // cache: false,
                beforeSend: function() {
                    $('.btn-submit').attr('disable', 'disabled')
                    $('.btn-submit').html("<i class='fa fa-spin fa-spinner'></i>")
                },
                complete: function() {
                    $('.btn-submit').removeAttr('disable')
                    $('.btn-submit').html("Submit")

                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.titleInput) {
                            $('#title-input').addClass('is-invalid');
                            $('.error-title').html(response.error.titleInput);
                        } else {
                            $('#title-input').removeClass('is-invalid');
                            $('.error-title').html('');
                        }
                        if (response.error.authorInput) {
                            $('#author-input').addClass('is-invalid');
                            $('.error-author').html(response.error.authorInput);
                        } else {
                            $('#author-input').removeClass('is-invalid');
                            $('.error-author').html('');
                        }
                        if (response.error.publisherInput) {
                            $('#publisher-input').addClass('is-invalid');
                            $('.error-publisher').html(response.error.publisherInput);
                        } else {
                            $('#publisher-input').removeClass('is-invalid');
                            $('.error-publisher').html('');
                        }

                    } else {
                        document.getElementById("form-tambah").reset();
                        Swal.fire(
                            'Good job!',
                            'Book Successfully added!',
                            'success'
                        )
                        $('#AddData').modal('hide');
                        bookData();

                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
                }
            });
            return false
        });
    });
    $(document).ready(function() {
        $('.form-update').submit(function(e) {
            e.preventDefault();
            $.ajax({
                method: "post",
                url: $(this).attr('action'),
                data: new FormData(this),
                processData: false,
                contentType: false,
                dataType: "json",
                beforeSend: function() {
                    $('.btn-submit').attr('disable', 'disabled')
                    $('.btn-submit').html("<i class='fa fa-spin fa-spinner'></i>")
                },
                complete: function() {
                    $('.btn-submit').removeAttr('disable')
                    $('.btn-submit').html("Submit")

                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.titleInput) {
                            $('#title-book').addClass('is-invalid');
                            $('.error-title').html(response.error.titleInput);
                        } else {
                            $('#title-book').removeClass('is-invalid');
                            $('.error-title').html('');
                        }
                        if (response.error.authorInput) {
                            $('#author-book').addClass('is-invalid');
                            $('.error-author').html(response.error.authorInput);
                        } else {
                            $('#author-book').removeClass('is-invalid');
                            $('.error-author').html('');
                        }
                        if (response.error.publisherInput) {
                            $('#publisher-book').addClass('is-invalid');
                            $('.error-publisher').html(response.error.publisherInput);
                        } else {
                            $('#publisher-book').removeClass('is-invalid');
                            $('.error-publisher').html('');
                        }

                    } else {
                        Swal.fire(
                            'Good job!',
                            'Book Successfully updated!',
                            'success'
                        )
                        $('#UpdateBuku').modal('hide');
                        bookData();

                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
                }
            });
            return false
        });
    });

    $(document).ready(function() {
        $(document).on('click', '#detail-button', function() {
            var id = $(this).data('id');
            var title = $(this).data('title');
            var writer = $(this).data('writer');
            var publisher = $(this).data('publisher');
            var cover = $(this).data('cover');
            var sipnosis = $(this).data('sipnosis');
            $('#id').text(id);
            $('#title').text(title);
            $('#writer').text(writer);
            $('#publisher').text(publisher);
            $('#cover').text(cover);
            $('#sipnosis').text(sipnosis);
            document.getElementById("profile_pic").src = "./uploads/" +
                cover;
            document.getElementById("banner_pic").src = "./uploads/" + cover;
        })
    })

    $(document).on('click', '#edit-button', function() {
        console.log($(this).data('cover'));
        $('.modal-body #id-book').val($(this).data('id'));
        $('.modal-body #title-book').val($(this).data('title'));
        $('.modal-body #author-book').val($(this).data('writer'));
        $('.modal-body #publisher-book').val($(this).data('publisher'));
        $('.modal-body #sipnosis-book').val($(this).data('sipnosis'));
        // $('.modal-body #cover-book').val($(this).data('cover'));
    })

    function deleteBook(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url('book/delete') ?>',
                    data: {
                        'id': id
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            Swal.fire(
                                'Good job!',
                                response.success,
                                'success'
                            )
                            bookData();
                        }
                    },
                })

            }
        })
    }
</script>
<?= $this->endSection(); ?>