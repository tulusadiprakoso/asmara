<!doctype html>
<html lang="en">

<head>

    <?php $this->load->view('assets/assets'); ?>
</head>

<body>
    <div id="page-container"
        class="<?php if($this->uri->segment(2)=='target_detail'){echo 'sidebar';} else{echo 'sidebar-o';} ?> sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
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
    <?php if($this->uri->segment(2)=="ksto"){ ?>

    <script>
    $(function() {
        $(document).on('click', '.edit_data', function() {
            $('#modal').modal({
                backdrop: 'static',
                show: true
            });
            id = $(this).attr('id');
            data: {
                id: id
            };
            // mengambil nilai data-id yang di click
            $.ajax({
                url: 'ksto_edit/' + id,
                success: function(data) {
                    $("input[name='id']").val(data.id);
                    $("input[id='val-title']").val(data.title);
                    $("textarea[name='datel']").val(data.datel);
                    $('#modal').modal('show');

                }
            });
        });
    });
    </script>
<?php }else if($this->uri->segment(2)=="sto"){ ?>

<script>
    $(function() {
        $(document).on('click', '.edit_data', function() {
            $('#modal').modal({
                backdrop: 'static',
                show: true
            });
            id = $(this).attr('id');
            data: {
                id: id
            };

            // mengambil nilai data-id yang di click
            $.ajax({
                url: 'sto_edit/' + id,
                success: function(data) {

                    $("input[name='id']").val(data.id);
                    $("input[id='val-title']").val(data.title);
                    $("input[name='id_ksto']").val(data.id_ksto);
                    // $("textarea[name='datel']").val(data.datel);
                    $('#modal').modal('show');

                }
            });
        });
    });
    </script>
    <?php } ?>

    <script>
    $(function() {
        $(document).on('click', '.edit_data', function() {
            $('#modal').modal({
                backdrop: 'static',
                show: true
            });
            id = $(this).attr('id');
            data: {
                id: id
            };

            // mengambil nilai data-id yang di click
            $.ajax({
                url: 'target_edit/' + id,
                success: function(data) {

                    $("input[name='id']").val(data.id);
                    $("input[id='val-tahun']").val(data.tahun);
                    // $("input[name='id_ksto']").val(data.id_ksto);
                    // $("textarea[name='datel']").val(data.datel);
                    $('#modal').modal('show');

                }
            });
        });
    });
    </script>

<script type="text/javascript">
    $(document).ready(function(){
        document.getElementById("updateTotal").click(); // Click on the checkbox

        // On text click
        $('.spedit').click(function(){

          // Hide input element
          $('.txtedit').hide();

          // Show next input element
          $(this).next('.txtedit').show().focus();

          // Hide clicked element
          $(this).hide();
        });

        // Focus out from a textbox
        $('.txtedit').focusout(function(){
            // Get edit id, field name and value
            var edit_id = $(this).data('id');
            var fieldname = $(this).data('field');
            var value = $(this).val();
            
            // assign instance to element variable
            var element = this;

            // Sending AJAX request
            $.ajax({
              url: '<?=base_url();?>data/update_detail',
              type: 'post',
              data: { field:fieldname, value:value, id:edit_id },
              success:function(response){
                
                // Hide Input element
                $(element).hide();

                // Update viewing value and display it
                $(element).prev('.spedit').show();
                $(element).prev('.spedit').text(value);
                document.getElementById("updateTotal").click(); // Click on the checkbox
              }
            });
        });
    });
    </script>
    <script type="text/javascript">
// jumlahkan table wal
function addRows(tableId, column, resultId) {

  var table = document.getElementById(tableId);
  var rows = table.rows;
  var total = 0;
  var cell;


    // Assume first row is headers, adjust as required
    // Assume last row is footer, addjust as required
    for (var i=1, iLen=rows.length - 0; i<iLen; i++) {
      for (var j=2, kol =  rows[i].cells.length -2; j<kol; j++) {


        cell = rows[i].cells[j];
                console.log(cell.textContent);

        total += Number(cell.textContent || cell.innerText);
            // document.getElementById(resultId).innerHTML = total.toFixed(2);

      }
      cell = rows[i].cells[j];
      cell.innerHTML = total.toFixed(0);
      total = 0;

    }
}
</script>

</body>

</html>