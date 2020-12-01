<?php require_once('includes/lock.php'); ?>
    <div class="container">
    <br>
    <br>
        <form enctype="multipart/form-data" method="post" action="<?php echo site_url('Contract/update')?>/<?php echo $row->id; ?>">
            <div class="form-group">
                <label for="exampleInputEmail1">Contract Name</label>
                <input type="text" class="form-control" name="contract_name" value="<?php echo $row->contract_name; ?>" aria-describedby="emailHelp" placeholder="Enter last name">
            </div>

            <div class="form-group">
                <textarea class="form-control" name="description" value="<?php echo $row->description;?>" id="" cols="30" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Start Date</label>
                <input type="date" class="form-control" name="date_of_start" value="<?php echo $row->date_of_start; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Expiry Date</label>
                <input type="date" class="form-control" name="date_of_expiry" value="<?php echo $row->date_of_expiry; ?>">
            </div>
            <div style="display: none;" class="form-group">
                <label for="exampleInputEmail1">Vendor</label>
                <input type="text" class="form-control" name="vendorID" value="<?php echo $row->vendorID; ?>" aria-describedby="emailHelp" placeholder="Vendor name">
            </div>
            <div style="display: none;" class="form-group">
                <label for="exampleInputEmail1">Attachment</label>
                <input value="<?php echo $row->file; ?>" type="file" class="form-control" name="file" aria-describedby="emailHelp" placeholder="attach a picture">
            </div>
            <button type="submit" class="btn btn-primary" value="save">Submit</button>
            <a href="<?php echo site_url('Contract')?>"><button type="button" class="btn btn-danger">Cancel</button></a>
        </form>  
    </div>
    <?php $this->load->view('includes/footer'); ?>
  </body>
</html>
