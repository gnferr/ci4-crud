                        <table class="table" id="table-book">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">Cover</th>
                                    <th scope="col" class="text-center">Title</th>
                                    <th scope="col" class="text-center">Author</th>
                                    <th scope="col" class="text-center">Publisher</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($dataBook as $b) : ?>
                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <td><img src="./uploads/<?= $b['cover'] ?>" alt="" width="40"></td>
                                        <td><?= $b['title'] ?></td>
                                        <td><?= $b['writer'] ?></td>
                                        <td><?= $b['publisher'] ?></td>
                                        <td>
                                            <a id="detail-button" type="button" data-bs-toggle="modal" data-bs-target="#DetailBuku" data-id="<?= $b['id'] ?>" data-title="<?= $b['title'] ?>" data-writer="<?= $b['writer'] ?>" data-publisher="<?= $b['publisher'] ?>" data-cover="<?= $b['cover'] ?>" data-sipnosis="<?= $b['sipnosis'] ?>" class="btn btn-warning"><i class="fa fa-info"></i></a>
                                            <a id="edit-button" type="button" data-bs-toggle="modal" data-bs-target="#UpdateBuku" data-id="<?= $b['id'] ?>" data-title="<?= $b['title'] ?>" data-writer="<?= $b['writer'] ?>" data-publisher="<?= $b['publisher'] ?>" data-cover="<?= $b['cover'] ?>" data-sipnosis="<?= $b['sipnosis'] ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                            <a onclick="deleteBook(<?= $b['id'] ?>)" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        <!-- batas  -->
                        <script>
                            $(document).ready(function() {
                                $('#table-book').DataTable({
                                    pageLength: 5,
                                    lengthMenu: [
                                        [5, 10, 15, 20, -1],
                                        [5, 10, 15, 20, 'All']
                                    ]
                                });
                            })
                        </script>