   <!-- Main Container -->
   <main id="main-container">
       <!-- Hero -->
       <div class="bg-body-light">
           <div class="content content-full">
               <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                   <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Data STO</h1>
                   <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                       <ol class="breadcrumb">
                           <li class="breadcrumb-item">Tables</li>
                           <li class="breadcrumb-item active" aria-current="page">Data STO</li>
                       </ol>
                   </nav>
               </div>
           </div>
       </div>
       <!-- END Hero -->

       <!-- Page Content -->
       <div class="content">


           <!-- Dynamic Table with Export Buttons -->
           <div class="block block-rounded">
               <div class="block-header block-header-default">
                   <h3 class="block-title">Data STO</h3>
               </div>
               <div class="block-content block-content-full">
                   <button type="button" class="btn btn-primary push" data-toggle="modal"
                       data-target="#modal-block-fadein"><i class="fas fa-plus"></i> Add</button>

                   <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                   <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                       <thead>
                           <tr>

                               <th>Nomor</th>
                               <th class="d-none d-sm-table-cell">STO</th>
                               <th class="d-none d-sm-table-cell">Datel</th>
                               <th style="width: 15%;">Action</th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php if(!empty($query)){?>
                           <?php $no=1; ?>
                           <?php foreach($query as $r){?>

                           <tr>
                               <td class="text-center"><?= $no; ?></td>
                               <td><?= $r['title']; ?></td>


                               <td class="d-none d-sm-table-cell"><?= $r['datel']; ?></td>


                               <td>
                                   <a  href="javascript:;" id='btn-edit' class="btn btn-info" data-id='<?php echo $r['id'];?>'>
                                       <i class="fa fa-edit"></i> </a>


                                   <a class="btn btn-danger" title="Tombol Hapus"
                                       href="<?= base_url('sto_hapus/').$r['id']; ?>"><i class="fas fa-trash"></i></a>
                               </td>
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

           <!-- Fade In Block Modal -->
           <div class="modal fade" id="modal-block-fadein" tabindex="-1" role="dialog"
               aria-labelledby="modal-block-fadein" aria-hidden="true">
               <div class="modal-dialog" role="document">

                   <div class="modal-content">
                       <form class="js-validation" action="sto_tambah" method="POST">

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
                                                       <div class="form-group">
                                                           <label for="val-suggestions">Title <span
                                                                   class="text-danger">*</span></label>
                                                           <input type="text" class="form-control" id="val-suggestions"
                                                               name="title" placeholder="STO">
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
                                   <button type="button" class="btn btn-sm btn-light"
                                       data-dismiss="modal">Close</button>
                                   <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                               </div>
                       </form>

                   </div>
               </div>
           </div>
       </div>
       <!-- END Fade In Block Modal -->


             <div class="modal fade in"  tabindex="-1" id="modal">
               <div class="modal-dialog moda-md">
                   <div class="modal-content">
                       <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal"></button>
                           <div class="modal-title">
                               <h5>Edit</h5>
                           </div>
                       </div>
                       <form class="form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>input_activity/update"> 
                           <div class="card-body">
                                   <input type="hidden" name="id" value="">   
                               <div class="form-group">
                                   <label for="exampleInputPassword1">Title</label>
                                   <input type="text" name="title" class="form-control" id="exampleInputPassword1"
                                       placeholder="title" required="" value="">
                               </div>
                               <div class="form-group">
                                   <label for="exampleInputPassword1">Datel</label>
                                   <select class="form-control" id="val-skill" name="datel">
                                       <option value="samarinda">SAMARINDA</option>
                                       <option value="bontang">BONTANG</option>
                                       <option value="tenggarong">TENGGARONG</option>

                                   </select>
                               </div>
                               <div class="form-group clearfix">
                                   <button type="button" data-dismiss="modal">Batal</button>
                                   <button type="button" id='btn' class="btn btn-success pull-right">Simpan</button>
                               </div>
                       </form>
                   </div>
               </div>
           </div>
           </div>