<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

<?php  
	
	$data = $mapping_schema[0];
	// print_r($data); exit();
	$parent = $parent;
	$category = $category;
	$child = $child;

?>

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Update Category</li>
        </ol>

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php echo site_url('admin/cmsCategory/update') ?>" method="post" enctype="multipart/form-data" >
						<input class="form-control" type="hidden" name="id" value="<?php echo $data->hash_breadcrumb ?>" />

							<div class="form-group">
								<label for="name">Breadcrumb*</label>
								<input class="form-control <?php echo form_error('breadcrumb') ? 'is-invalid':'' ?>"
								 type="text" name="breadcrumb" value="<?php echo $data->breadcrumb ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('breadcrumb') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">Id Merchant*</label>
								<input class="form-control <?php echo form_error('id_situs') ? 'is-invalid':'' ?>"
								 type="text" name="id_situs" min="0" value="<?php echo $data->id_website ?>" readonly/>
								<div class="invalid-feedback">
									<?php echo form_error('id_situs') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="name">Parent Category</label>
								<select class="form-control <?php echo form_error('p_cat_sd') ? 'is-invalid':'' ?>"
								 type="text" name="p_cat_sd">
								 	<option></option>
								 	<?php foreach ($parent as $p): ?>
								 		<option value="<?php echo $p->system_name;?>" <?php if ($data->p_cat_sd == $p->system_name) {
		   						echo 'selected';
		   					} ?>><?php echo $p->system_name;?></option>
								 	<?php endforeach; ?>
								 </select>
								<div class="invalid-feedback">
									<?php echo form_error('p_cat_sd') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Sub Category</label>
								<select class="form-control <?php echo form_error('k_cat_sd') ? 'is-invalid':'' ?>"
								 type="text" name="k_cat_sd">
								 <option></option>
								 	<?php foreach ($category as $k): ?>
								 		<option value="<?php echo $k->system_name;?>" <?php if ($data->k_cat_sd == $k->system_name) {
		   						echo 'selected';
		   					} ?>><?php echo $k->system_name;?></option>
								 	<?php endforeach; ?>
								 </select>
								<div class="invalid-feedback">
									<?php echo form_error('k_cat_sd') ?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="name">Child Category</label>
								<select class="form-control <?php echo form_error('c_cat_sd') ? 'is-invalid':'' ?>"
								 type="text" name="c_cat_sd">
								 <option></option>
								 	<?php foreach ($child as $c): ?>
								 		<option value="<?php echo $c->system_name;?>" <?php if ($data->c_cat_sd == $c->system_name) {
		   						echo 'selected';
		   					} ?>><?php echo $c->system_name;?></option>
								 	<?php endforeach; ?>
								 </select>
								<div class="invalid-feedback">
									<?php echo form_error('c_cat_sd') ?>
								</div>
							</div>

							

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
					</div>


				</div>
				<!-- /.container-fluid -->

				<!-- Sticky Footer -->
				<?php $this->load->view("admin/_partials/footer.php") ?>

			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->


		<?php $this->load->view("admin/_partials/scrolltop.php") ?>

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>