<?php require_once('includes/lock.php'); ?>
    <div class="container">
    <br>
        <form enctype="multipart/form-data" method="post" action="<?php echo site_url('Vendor/update')?>/<?php echo $row->vendorID; ?>">
            <div class="form-group">
                <label for="exampleInputEmail1">Vendor Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $row->v_name; ?>" aria-describedby="emailHelp" placeholder="Enter name of vendor">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Location Adress</label>
                <input required="" type="text" class="form-control" name="address" aria-describedby="emailHelp" value="<?php echo $row->location_address; ?>" placeholder="Enter vendor name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Contact Person</label>
                <input value="<?php echo $row->contact_person; ?>" required="" type="text" class="form-control" name="cperson" aria-describedby="emailHelp" placeholder="Enter a name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Contact Email</label>
                <input value="<?php echo $row->contact_email; ?>" required="" type="text" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Contact email">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Phone Number</label>
                <input value="<?php echo $row->phone_number; ?>" required="" type="text" class="form-control" name="phone" aria-describedby="emailHelp" placeholder="Enter phone number">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Service Offered</label>
                <input value="<?php echo $row->service_offered; ?>" required="" type="text" class="form-control" name="service" aria-describedby="emailHelp" placeholder="Enter service offered">
            </div>
            <button type="submit" class="btn btn-primary" value="save">Update</button>
            <a href="<?php echo site_url('Vendor')?>"><button type="button" class="btn btn-danger">Cancel</button></a>
        </form>  
    </div>
    <?php $this->load->view('includes/footer'); ?>
  </body>
</html>
