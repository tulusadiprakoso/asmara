   <!-- Main Container -->
   <main id="main-container">

       <!-- Hero -->
       <div class="bg-body-light">
           <div class="content content-full">
               <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                   <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Data Detail</h1>
                   <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                       <ol class="breadcrumb">
                           <li class="breadcrumb-item">Tables</li>
                           <li class="breadcrumb-item active" aria-current="page">Data Detail</li>
                       </ol>
                   </nav>
               </div>
           </div>
       </div>
       <!-- END Hero -->

       <!-- Page Content -->
       <div class="content">
           <!-- ALERT -->
           <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>


           <!--END -->

           <!-- Dynamic Table with Export Buttons -->
           <div class="block block-rounded">
               <div class="block-header block-header-default">
                   <h3 class="block-title">Data Detail</h3>
               </div>
               <div class="block-content block-content-full">
                   <button type="button" class="btn btn-primary push" data-toggle="modal"
                       data-target="#modal-block-fadein"><i class="fas fa-plus"></i> Add</button>

                   <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                   <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                       <thead>
                           <tr>

                               <th>No</th>
                               <th class="d-none d-sm-table-cell">STO</th>
                               <!-- <th class="d-none d-sm-table-cell">Tahun</th> -->
                               <th class="d-none d-sm-table-cell">JAN</th>
                               <th class="d-none d-sm-table-cell">FEB</th>
                               <th class="d-none d-sm-table-cell">MAR</th>
                               <th class="d-none d-sm-table-cell">APR</th>
                               <th class="d-none d-sm-table-cell">MAY</th>
                               <th class="d-none d-sm-table-cell">JUN</th>
                               <th class="d-none d-sm-table-cell">JUL</th>
                               <th class="d-none d-sm-table-cell">AUG</th>
                               <th class="d-none d-sm-table-cell">SEP</th>
                               <th class="d-none d-sm-table-cell">OKT</th>
                               <th class="d-none d-sm-table-cell">NOV</th>
                               <th class="d-none d-sm-table-cell">DEC</th>
                               <th class="d-none d-sm-table-cell">Total</th>
                               <th>Action</th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php if(!empty($query)){?>
                           <?php $no=1; ?>
                           <?php foreach($query as $r){?>

                           <tr>
                               <td class="text-center"><?= $no; ?></td>
                               <td><?= $r['tsto']; ?></td>


                               <!-- <td class="d-none d-sm-table-cell"><?= $r['tahun']; ?></td> -->
                               <td class=""><input type="text" class="form-control" id="val-title" name="jan"
                                       value="<?= $r['jan']; ?>" placeholder=""></td>
                               <td class=""><input type="text" class="form-control" id="val-title" name="feb"
                                       value="<?= $r['feb']; ?>" placeholder=""></td>
                               <td class=""><input type="text" class="form-control" id="val-title" name="mar"
                                       value="<?= $r['mar']; ?>" placeholder=""></td>
                               <td class=""><input type="text" class="form-control" id="val-title" name="apr"
                                       value="<?= $r['apr']; ?>" placeholder=""></td>
                               <td class=""><input type="text" class="form-control" id="val-title" name="may"
                                       value="<?= $r['may']; ?>" placeholder=""></td>
                               <td class=""><input type="text" class="form-control" id="val-title" name="jun"
                                       value="<?= $r['jun']; ?>" placeholder=""></td>
                               <td class=""><input type="text" class="form-control" id="val-title" name="jul"
                                       value="<?= $r['jul']; ?>" placeholder=""></td>
                               <td class=""><input type="text" class="form-control" id="val-title" name="aug"
                                       value="<?= $r['aug']; ?>" placeholder=""></td>
                               <td class=""><input type="text" class="form-control" id="val-title" name="sep"
                                       value="<?= $r['sep']; ?>" placeholder=""></td>
                               <td class=""><input type="text" class="form-control" id="val-title" name="okt"
                                       value="<?= $r['okt']; ?>" placeholder=""></td>
                               <td class=""><input type="text" class="form-control" id="val-title" name="nov"
                                       value="<?= $r['nov']; ?>" placeholder=""></td>
                               <td class=""><input type="text" class="form-control" id="val-title" name="des"
                                       value="<?= $r['des']; ?>" placeholder=""></td>
                               <td class=""><input type="text" class="form-control" id="val-title" name="total"
                                       value="<?= $r['total']; ?>" placeholder=""></td>
                               <td>

                                   <!-- <button id='btn-edit' class="btn btn-info" data-id="<?php echo $r['id'];?>">Edit</button> -->
                                   <button type="button" name="edit" value="" id="<?php echo $r["id"]; ?>"
                                       class="btn btn-info btn-sm"><i class="fas fa-edit"></i></button>
                                   <a class="btn btn-danger btn-sm" title="Tombol Hapus"
                                       href="<?= base_url(); ?>data/ksto_dohapus/<?php echo $r["id"]; ?>"
                                       id="<?php echo $r["id"]; ?>"
                                       onclick="return confirm('Apakah data ini yakin di Hapus');"><i
                                           class="fas fa-trash"></i></a>
                               </td>
                               



                           </tr>
                           <?php $no++; ?>
                           <?php } ?>
                           <?php } ?>
                       </tbody>
                   </table>
               </div>
           </div>
           <!-- END Dynamic Table with Export Buttons -->
       </div>


       <!-- Fade In Block Modal -->
       <div class="modal fade" id="modal-block-fadein" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein"
           aria-hidden="true">
           <div class="modal-dialog" role="document">

               <div class="modal-content">
                   <form class="js-validation" action="<?= base_url("data/target_detail_tambah"); ?>" method="POST">

                       <div class="block block-themed block-transparent mb-0">
                           <div class="block-header bg-primary-dark">
                               <h3 class="block-title">Input</h3>
                               <div class="block-options">
                                   <button type="button" class="btn-block-option" data-dismiss="modal"
                                       aria-label="Close">
                                       <i class="fa fa-fw fa-times"></i>
                                   </button>
                               </div>
                           </div>
                           <div class="block-content">
                               <div class="block block-rounded">

                                   <div class="block-content block-content-full">
                                       <div class="">


                                           <!-- Advanced -->

                                           <div class="row items-push">

                                               <div class="col-lg-12">

                                                   <input type="hidden" class="form-control" id="val-suggestions"
                                                       name="id_tahun" value="<?=$this->uri->segment(3) ?>"
                                                       placeholder="Tahun">
                                                   <div class="form-group">
                                                       <label for="val-suggestions">STO <span
                                                               class="text-danger">*</span></label>
                                                       <select class="form-control" name="id_sto">
                                                           <?php 

            foreach($sto as $row)
            { 
                // print_r($row);
              echo '<option value="'.$row['id'].'">'.$row['title'] .'</option>';
            }
            ?>
                                                       </select>
                                                   </div>


                                               </div>
                                           </div>
                                           <!-- END Advanced -->




                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="block-content block-content-full text-right bg-light">
                               <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                               <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                           </div>
                   </form>

               </div>
           </div>
       </div>
       </div>
       <!-- END Fade In Block Modal -->

       <!-- Fade In Block Modal -->
       <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein"
           aria-hidden="true">
           <div class="modal-dialog" role="document">
               <div class="modal-content">
                   <form class="js-validation" action="<?php echo base_url(); ?>data/ksto_doedit" method="POST">

                       <div class="block block-themed block-transparent mb-0">
                           <div class="block-header bg-primary-dark">
                               <h3 class="block-title">Input</h3>
                               <div class="block-options">
                                   <button type="button" class="btn-block-option" data-dismiss="modal"
                                       aria-label="Close">
                                       <i class="fa fa-fw fa-times"></i>
                                   </button>
                               </div>
                           </div>
                           <div class="block-content">
                               <div class="block block-rounded">
                                   <div class="block-content block-content-full">
                                       <div class="">
                                           <!-- Advanced -->
                                           <input type="hidden" class="form-control" id="val-id" name="id"
                                               placeholder="id">
                                           <div class="row items-push">

                                               <div class="col-lg-12">
                                                   <div class="form-group">
                                                       <label for="val-suggestions">Title <span
                                                               class="text-danger">*</span></label>
                                                       <input type="text" class="form-control" id="val-title"
                                                           name="title" placeholder="KSTO">
                                                   </div>
                                                   <div class="form-group">
                                                       <label for="val-skill">Datel <span
                                                               class="text-danger">*</span></label>
                                                       <select class="form-control" id="val-skill" name="datel">
                                                           <option value="samarinda">SAMARINDA</option>
                                                           <option value="bontang">BONTANG</option>
                                                           <option value="tenggarong">TENGGARONG</option>

                                                       </select>
                                                   </div>
                                               </div>
                                           </div>
                                           <!-- END Advanced -->
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="block-content block-content-full text-right bg-light">
                               <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                               <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                           </div>
                   </form>

               </div>
           </div>
       </div>
       <!-- END Fade In Block Modal -->


       </div>