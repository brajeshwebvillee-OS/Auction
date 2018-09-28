<h2>Upload Product Documents</h2>
<form action="<?php echo base_url('wb/upload_document'); ?>" method="post" enctype="multipart/form-data">
<input type="text" name="product_id" value="1"></br></br>
<input type="file" multiple name="files[]"></br></br>
<input type="file" name="files[]"></br></br>
<input type="file" name="files[]"></br></br>
<input type="submit" name="submit" value="submit">
</form>


<h2>Upload Product Images</h2>
<form action="<?php echo base_url('wb/upload_images'); ?>" method="post" enctype="multipart/form-data">
<input type="text" name="product_id" value="1"></br></br>
<input type="file" multiple name="files[]"></br></br>
<input type="file" name="files[]"></br></br>
<input type="file" name="files[]"></br></br>
<input type="submit" name="submit" value="submit">
</form>


<h2>Upload Profile Image Images</h2>
<form action="<?php echo base_url('wb/upload_profile_image'); ?>" method="post" enctype="multipart/form-data">
<input type="text" name="user_id" value="1"></br></br>
<input type="file" name="files"></br></br>
<input type="submit" name="submit" value="submit">
</form>