<!DOCTYPE html>
<html lang="en">

<head>

  <?php $this->load->view('admin/_partials/head.php') ?>

</head>

<body id="page-top">



  <?php $this->load->view('admin/_partials/navbar.php') ?>

  <div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view('admin/_partials/sidebar.php') ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <?php $this->load->view('admin/_partials/breadcrumb.php') ?>

        <?php if ($this->session->flashdata('success')): ?>
          <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php endif; ?>

        <!-- Icon Cards-->
        

        <!-- Area Chart Example-->
        

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
           <p>
             <i class="fas fa-table"></i>
            Data Table Category
           </p>
              <a href="<?php echo site_url('admin/cmsCategory/add') ?>"><i class="fas fa-plus"></i> Add New</a>
            
            </div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Hash Breadcrumb</th>
                    <th>Breadcrumb</th>
                    <th>Id Situs</th>
                    <th>Parent Category</th>
                    <th>Sub Category</th>
                    <th>Child Category</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Hash Breadcrumb</th>
                    <th>Breadcrumb</th>
                    <th>Id Situs</th>
                    <th>Parent Category</th>
                    <th>Sub Category</th>
                    <th>Child Category</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted"></div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <?php $this->load->view('admin/_partials/footer.php') ?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <?php $this->load->view('admin/_partials/scrolltop.php') ?>

  <!-- Logout Modal-->
  <?php $this->load->view('admin/_partials/modal.php') ?>

  <?php $this->load->view('admin/_partials/js.php') ?>

  <script type="text/javascript">
    $(document).ready(function(){
      $('#example').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?=site_url('admin/cmsCategory/json')?>",
          "type": "POST"
        },

        "columns": [
        {"targets": [0],"orderable": false},   
        {"targets": [0]},
        {"targets": [0],"orderable": false},
        {"targets": [0],"orderable": false},
        {"targets": [0],"orderable": false},
        {"targets": [0],"orderable": false},
        {"targets": [0],"orderable": false, render: function(a,b,rowData){
          //debugger;
          return "<a class='btn btn-outline-success btn-sm' href='edit?id="+rowData[0]+"'><i class='fa fa-edit'></i> Update</a> <a class='btn btn-outline-danger btn-sm' href='delete?id="+rowData[0]+"'><i class='fa fa-trash'></i> Delete</a>"
        }}
        ]
      });
    });
  </script>

</body>


</html>
