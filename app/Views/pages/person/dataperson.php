<table class="table" id="table-person">
    <thead>
        <tr>
            <th scope="col" class="text-center">No</th>
            <th scope="col" class="text-center">Name</th>
            <th scope="col" class="text-center">Phone Number</th>
            <th scope="col" class="text-center">Email</th>
            <th scope="col" class="text-center">Country</th>
            <th scope="col" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($dataPerson as $b) : ?>
            <tr>
                <th scope="row"><?= $no++ ?></th>
                <td><?= $b['name'] ?></td>
                <td><?= $b['phone'] ?></td>
                <td><?= $b['email'] ?></td>
                <td><?= $b['country'] ?></td>
                <td>
                    <a id="detail-person" type="button" data-bs-toggle="modal" data-bs-target="#DetailPerson" class="btn btn-warning"><i class="fa fa-info"></i></a>
                    <a id="edit-person" type="button" data-bs-toggle="modal" data-bs-target="#UpdatePerson" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                    <a onclick="deleteBook(<?= $b['id'] ?>)" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
    $(document).ready(function() {
        $('#table-person').DataTable({
            pageLength: 5,
            lengthMenu: [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, 'All']
            ]
        });
    })
</script>