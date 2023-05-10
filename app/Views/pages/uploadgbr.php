<?= $this->extend('layout/template'); ?>
<?= $this->section('content') ?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch modal
</button>

<?php
if (session()->getFlashdata('status')) {
    echo "<h5>" . session()->getFlashdata('status') . "</h5>";
}
?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('upload/upload') ?> " enctype="multipart/form-data">
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
                        <input type="file" class="form-control" id="cover-input" name="coverInput" placeholder="E.g https://pbs.twimg.com/media/Cjj3BctXIAEljbJ.jpg">
                    </div>
                    <div class="mb-1">
                        <label for="sipnosis-input" class="col-form-label">Sipnosis:</label>
                        <textarea class="form-control" placeholder="description..." id="sipnosis-input" style="height: 100px" name="sipnosisInput"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-submit">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#modal-image-upload-btn').click(function() {
            $('#image-validation-error').empty();

            var form_data = new FormData($('#modal-image-upload-form')[0]);
            $.ajax({
                type: 'POST',
                url: '<?= base_url('upload/upload') ?>',
                data: form_data,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        $('#exampleModal').modal('hide');
                        $('#image-preview').attr('src', '/uploads/' + response.image_name);
                    } else {
                        $.each(response.errors, function(key, value) {
                            $('#image-validation-error').append('<div class="alert alert-danger">' + value + '</div>');
                        });
                    }
                }
            });
        });
    });
</script>

<?= $this->endSection() ?>