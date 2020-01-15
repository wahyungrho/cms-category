<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

<?php  

	$parent = $parent;
	$category = $category;
	$child = $child;
	$id_situs = $id_situs;
	// print_r($id_situs); exit();

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
          <li class="breadcrumb-item active">Add Category</li>
        </ol>

				

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php echo site_url('admin/cmsCategory/add') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="name">Breadcrumb*</label>
								<input class="form-control <?php echo form_error('breadcrumb') ? 'is-invalid':'' ?>"
								 type="text" name="breadcrumb" />
								<div class="invalid-feedback">
									<?php echo form_error('breadcrumb') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">Nama Merchant*</label>
								<select class="form-control <?php echo form_error('id_situs') ? 'is-invalid':'' ?>"
								 type="text" name="id_situs">
								 	<option></option>
								 	<?php foreach ($id_situs as $i): ?>
								 		<option value="<?php echo $i->id_website;?>"><?php echo $i->nama;?></option>
								 	<?php endforeach; ?>
								 </select>
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
								 		<option value="<?php echo $p->system_name;?>"><?php echo $p->system_name;?></option>
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
								 		<option value="<?php echo $k->system_name;?>"><?php echo $k->system_name;?></option>
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
								 		<option value="<?php echo $c->system_name;?>"><?php echo $c->system_name;?></option>
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