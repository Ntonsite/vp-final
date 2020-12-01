<?php require_once('includes/lock.php'); ?>
    <div class="container">
    <br>
        <form enctype="multipart/form-data" method="post" action="<?php echo site_url('License/update')?>/<?php if (!empty($row)) {
            echo $row->id;
        } ?>">
            <div class="form-group">
                <label for="exampleInputEmail1">License Name</label>
                <input type="text" class="form-control" name="license_name" value="<?php echo $row->license_name; ?>" aria-describedby="emailHelp" placeholder="Enter License Name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <input type="text-area" class="form-control" name="description" value="<?php echo $row->description; ?>" aria-describedby="emailHelp" placeholder="Enter Description">
            </div>
             <div class="form-group">
                <label for="exampleInputEmail1">Activations Number</label>
                <input type="number" class="form-control" name="activations_number" value="<?php echo $row->activations_number; ?>" aria-describedby="emailHelp" placeholder="Number of Activations">
            </div>
            <select name="vendor" class="form-control">
                <?php if (!empty($vendor)) {
                    foreach($vendor as $vendors){?>
                    <option value="<?php echo $vendors->vendorID; ?>"><?php echo $vendors->name; ?></option>
                    <?php }
                } ?>
            </select>
            <div class="form-group">
                <label for="exampleInputEmail1">Expiry Date</label>
                <input type="date" class="form-control" name="date_of_expiry" value="<?php echo $row->date_of_expiry; ?>" aria-describedby="emailHelp" placeholder="Expiry Date">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Attachment</label>
                <input type="file" class="form-control" value="<?php echo $row->file; ?>" name="file" aria-describedby="emailHelp" placeholder="attach a picture">
            </div>
            <button type="submit" class="btn btn-primary" value="save">Submit</button>
            <a href="<?php echo site_url('License')?>"><button type="button" class="btn btn-danger">Cancel</button></a>
        </form>  
    </div>
    <?php $this->load->view('includes/footer'); ?>
  </body>
</html>
