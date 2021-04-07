<!doctype html>
<html lang="en">

<head>

    <?php $this->load->view('assets/assets'); ?>
</head>

<body>
    <div id="page-container"
        class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
        <?php $this->load->view('assets/sideoverlay'); ?>
        <?php $this->load->view('assets/sidebar'); ?>
        <?php $this->load->view('assets/header'); ?>
        <?php $this->load->view($view); ?>
        <?php $this->load->view('assets/footer'); ?>

    </div>

    <!--
            Dashmix JS Core

            Vital libraries and plugins used in all pages. You can choose to not include this file if you would like
            to handle those dependencies through webpack. Please check out <?= base_url();?>assets/template/_js/main/bootstrap.js for more info.

            If you like, you could also include them separately directly from the <?= base_url();?>assets/template/js/core folder in the following
            order. That can come in handy if you would like to include a few of them (eg jQuery) from a CDN.

            <?= base_url();?>assets/template/js/core/jquery.min.js
            <?= base_url();?>assets/template/js/core/bootstrap.bundle.min.js
            <?= base_url();?>assets/template/js/core/simplebar.min.js
            <?= base_url();?>assets/template/js/core/jquery-scrollLock.min.js
            <?= base_url();?>assets/template/js/core/jquery.appear.min.js
            <?= base_url();?>assets/template/js/core/js.cookie.min.js
        -->
    <script src="<?= base_url();?>assets/template/js/dashmix.core.min.js"></script>

    <!--
            Dashmix JS

            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at <?= base_url();?>assets/template/_js/main/app.js
        -->
    <script src="<?= base_url();?>assets/template/js/dashmix.app.min.js"></script>

    <!-- Page JS Plugins -->
    <script src="<?= base_url();?>assets/template/js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url();?>assets/template/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url();?>assets/template/js/plugins/datatables/buttons/dataTables.buttons.min.js"></script>
    <script src="<?= base_url();?>assets/template/js/plugins/datatables/buttons/buttons.print.min.js"></script>
    <script src="<?= base_url();?>assets/template/js/plugins/datatables/buttons/buttons.html5.min.js"></script>
    <script src="<?= base_url();?>assets/template/js/plugins/datatables/buttons/buttons.flash.min.js"></script>
    <script src="<?= base_url();?>assets/template/js/plugins/datatables/buttons/buttons.colVis.min.js"></script>

    <!-- Page JS Code -->
    <script src="<?= base_url();?>assets/template/js/pages/be_tables_datatables.min.js"></script>
    <script>
    $(function() {
        $(document).on('click', '.edit_data', function(){  
            $('#modal').modal({
                backdrop: 'static'  ,
                show: true
            });
            id = $(this).attr('id');   
            data :{id:id} ;
            // mengambil nilai data-id yang di click
            $.ajax({
                url: 'sto_edit/' + id,
                success: function(data) {
                    $("input[name='id']").val(data.id);
                    $("input[name='title']").val(data.title);
                    $("textarea[name='datel']").val(data.datel);
                    $('#modal').modal('show');

                }
            });
        });
    });
    </script>
</body>

</html>