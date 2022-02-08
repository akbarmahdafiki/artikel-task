<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.css" />
</head>
<body>
    <?php if (isset($notification)) { ?>
        <div class="alert alert-warning"><?= $notification->listErrors() ?></div>
    <?php } ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <?= $title; ?>
                        <a href="<?= base_url('admin/logout'); ?>" class="btn btn-danger btn-sm float-right">Log Out</a>
                        <a href="" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#addModal">Tambah baru</a>
                    </div>

                    <div class="card-body">
                        <table id="user-table" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Thumbnail</td>
                                    <td>Judul</td>
                                    <td>Isi Artikel</td>
                                    <td>Tag</td>
                                    <td>Kategori</td>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="<?= base_url('artikel/save'); ?>" method="POST" enctype="multipart/form-data">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Artikel Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="inputjudul">Judul Artikel</label>
                            <input class="form-control" type="text" name="judul_artikel" id="inputjudul">
                        </div>

                        <div class="form-group mb-3">
                            <label for="inputisi">Isi Artikel</label>
                            <textarea class="ckeditor" id="ckedtor" name="isi_artikel" id="inputisi" cols="30" rows="30"></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="inputgambar">Thumbnail Artikel</label>
                            <input class="form-control" type="file" name="thumbnail_artikel" id="inputgambar">
                        </div>

                        <div class="form-group mb-3">
                            <label for="inputtag">Tag Artikel</label>
                            <input class="form-control" type="text" name="tag_artikel" id="inputtag">
                            <p></p>
                        </div>

                        <div class="form-group mb-3">
                            <label for="inputkategori">Kategori Artikel</label>
                            <select class="form-select form-select-md mb-3" name="kategori_artikel" id="kategori">
                                <option selected disabled>Pilih....</option>
                                <option value="teknologi">Teknologi</option>
                                <option value="olahraga">Olahraga</option>
                                <option value="ekonomi">Ekonomi</option>
                                <option value="kesehatan">Kesehatan</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <input type="submit" name="submit" value="Submit">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var table = $('#user-table').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    "url": "<?= base_url('artikel/ajaxlist') ?>",
                    "type": "POST"
                },
                "columnDefs":[{
                    "targets": [],
                    "orderable": false,
                    
                }]
            });
        });
    </script>

</body>
</html>