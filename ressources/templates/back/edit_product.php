
<?php   
// check if we have product
if(isset($_GET['id'])){
    $query = query("SELECT * FROM produit WHERE ID_pro = " . escape_string($_GET['id']). " ");
    confirm($query);

    while($row = fetch_array($query)){
        $product_title         = escape_string($row["nom"]);
        $product_category_id   = escape_string($row['id_ca']);
        $product_price         = escape_string($row["prix"]);
        // $product_description   = escape_string($row["product_description"]);
        // $short_desc            = escape_string($row["short_desc"]);
        $product_quantity      = escape_string($row["Qte"]);
        $product_image         = escape_string($row["img"]);
    }
update_product();

}

?>

<div class="col-md-12">
	<div class="row">
    	<h1 class="page-header">
   			Edit Product
		</h1>
	</div>
	
	<!-- enctype is for using multiform data -->
	<form action="" method="post" enctype="multipart/form-data">

		<div class="col-md-8">
			<div class="form-group">
				<label for="product-title">Product Title </label>
					<input type="text" name="product_title" class="form-control" value="<?php echo $product_title; ?>">
			</div>
			<div class="form-group">
				<label for="product-description">Product Description</label>
				<textarea name="product_description" id="" cols="30" rows="10" class="form-control"><?php echo $product_description; ?></textarea>
			</div>
			<div class="form-group row">
				<div class="col-xs-3">
					<label for="product-price">Product Price</label>
					<input type="number" name="product_price" class="form-control" size="60" value="<?php echo $product_price; ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="product-description">Product Short Description</label>
				<textarea name="short_desc" id="" cols="30" rows="5" class="form-control"><?php echo $short_desc; ?></textarea>
			</div>
			
		</div>

		<!--Main Content-->
		<!-- SIDEBAR-->
		<aside id="admin_sidebar" class="col-md-4">
			<div class="form-group">
				<input type="submit" name="draft" class="btn btn-warning btn-lg" value="Draft">
				<input type="submit" name="update" class="btn btn-primary btn-lg" value="Update">
			</div>

			<!-- Product Categories-->
			<div class="form-group">
				<label for="product-title">Product Category</label>
				<select name="product_category_id" id="" class="form-control">
					<option value="">Select Category</option>
					<?php show_categories_add_product_page(); ?>
				</select>
			</div>

			<!-- Product Brands-->
			<div class="form-group">
				<label for="product-title">Product Quantity</label>
				<input type="number" name="product_quantity" class="form-control" value="<?php echo $product_quantity; ?>">
			</div>

			<!-- Product Image -->
			<div class="form-group">
				<label for="product-title">Product Image</label>
                <input type="file" name="file"><br>
                <img width="100" src="../../ressources/uploads/<?php echo $product_image; ?>">
			</div>
		</aside>
		<!--SIDEBAR-->   
	</form>
</div>

