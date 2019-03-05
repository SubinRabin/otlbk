<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
   
<style type="text/css">
    
    .table-container span a {
        font-size: 14px;
    }
    .caret {
        font-size: 0px ! important;
    }
    .text {
            word-break: break-all;
        }
    .date {
            min-width: 75px;
        }
    a.llv-active {
            z-index: 2;
            background-color: #f5f5f5;
            border-color: #777;
        }
</style>
<div class="container-fluid log-div hide">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <h1>Log Viewer</h1>
            <div class="list-group">
                <?php if(empty($files)): ?>
                    <a class="list-group-item liv-active">No Log Files Found</a>
                <?php else: ?>
                    <?php foreach($files as $file): ?>
                        <a href="?f=<?= base64_encode($file); ?>"
                           class="list-group-item <?= ($currentFile == $file) ? "llv-active" : "" ?>">
                            <?= $file; ?>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-sm-9 col-md-10 table-container" style="border-left:1px dashed">
            <?php if(is_null($logs)): ?>
                <div>
                    <br><br>
                    <strong>Log file > 50MB, please download it.</strong>
                    <br><br>
                </div>
            <?php else: ?>
                <h1>Log List <span class="pull-right small">
                <?php if($currentFile): ?>
                    <a href="?dl=<?= base64_encode($currentFile); ?>">
                        <span class="glyphicon glyphicon-download-alt"></span>
                        Download file
                    </a>
                    -
                    <a id="delete-log" href="?del=<?= base64_encode($currentFile); ?>"><span
                                class="glyphicon glyphicon-trash"></span> Delete file</a>
                    <?php if(count($files) > 1): ?>
                        -
                        <a id="delete-all-log" href="?del=<?= base64_encode("all"); ?>"><span class="glyphicon glyphicon-trash"></span> Delete all files</a>
                    <?php endif; ?>
                <?php endif; ?>
                </span></h1>
                <table id="table-log" class="table table-striped">
                    <thead>
                    <tr>
                        <th style="width: 70px">Level</th>
                        <th style="width: 150px">Date</th>
                        <th>Content</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach($logs as $key => $log): ?>
                        <tr data-display="stack<?= $key; ?>">

                            <td class="text-<?= $log['class']; ?>" style="font-size: 14px ! important;">
                                <span class="<?= $log['icon']; ?>" aria-hidden="true"></span>
                                &nbsp;<?= $log['level']; ?>
                            </td>
                            <td class="date"><?= $log['date']; ?></td>
                            <td class="text">
                                <?php if (array_key_exists("extra", $log)): ?>
                                    <a style="width: 0px;height: 30px;" class="pull-right expand btn btn-default btn-xs"
                                       data-display="stack<?= $key; ?>">
                                        <span style="line-height: 30px;left: -7px;" class="glyphicon glyphicon-search"></span>
                                    </a>
                                <?php endif; ?>
                                <?= $log['content']; ?>
                                <?php if (array_key_exists("extra", $log)): ?>
                                    <div class="stack" id="stack<?= $key; ?>"
                                         style="display: none; white-space: pre-wrap;">
                                        <?= $log['extra'] ?>
                                    </div>
                                <?php endif; ?>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
           
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.js"></script>
<script>
    $(document).ready(function () {
        $(".log-div").removeClass('hide');
        $('.table-container tr').on('click', function () {
            $('#' + $(this).data('display')).toggle();
        });

        $('#table-log').DataTable({
            "order": [],
            "stateSave": true,
            "stateSaveCallback": function (settings, data) {
                window.localStorage.setItem("datatable", JSON.stringify(data));
            },
            "stateLoadCallback": function (settings) {
                var data = JSON.parse(window.localStorage.getItem("datatable"));
                if (data) data.start = 0;
                return data;
            }
        });
        $('#delete-log, #delete-all-log').click(function () {
            return confirm('Are you sure?');
        });
    });
</script>
