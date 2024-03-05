<?php
require_once('./../../config.php');

if (isset($_GET['id'])) {
    $qry = $conn->query("SELECT * FROM `client_list` where id = '{$_GET['id']}'");
    if ($qry->num_rows > 0) {
        $res = $qry->fetch_array();
        foreach ($res as $k => $v) {
            if (!is_numeric($k))
                $$k = $v;
        }
    }
}
?>

<div class="container-fluid">
    <form action="" id="upload-report-form">
        <input type="hidden" name="id" value="<?= isset($id) ? $id : '' ?>">
        <div class="form-group">
            <small class="mx-2">Test Report <small><em>(PDF only)</em></small></small>
            <input type="file" name="report" class="form-control form-control-sm form-control-border" accept="application/pdf" required>
        </div>
        <div class="form-group">
            <small class="mx-2">Remarks</small>
            <textarea name="remarks" id="remarks" rows="3" class="form-control form-control-sm rounded-0" required></textarea>
        </div>
    </form>
</div>

<script>
 $(function () {
    $('#uni_modal').on('shown.bs.modal', function () {
        // You can add any initialization code here if needed
    })

    $('#uni_modal #upload-report-form').submit(function (e) {
        e.preventDefault();
        var _this = $(this);
        $('.pop-msg').remove();
        var el = $('<div>');
        el.addClass("pop-msg alert");
        el.hide();
        start_loader();
        $.ajax({
            url: _base_url_ + "classes/Users.php?f=upload_report",
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            dataType: 'json',
            error: function (xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
                alert_toast("An error occurred", 'error');
                end_loader();
            },
            success: function (resp) {
                if (resp.status == 'success') {
                    location.reload();
                } else if (!!resp.msg) {
                    el.addClass("alert-danger");
                    el.text(resp.msg);
                    _this.prepend(el);
                } else {
                    el.addClass("alert-danger");
                    el.text("An error occurred due to an unknown reason.");
                    _this.prepend(el);
                }
                el.show('slow');
                $('html,body,.modal').animate({
                    scrollTop: 0
                }, 'fast');
                end_loader();
            }
        });
    });
});
</script>
