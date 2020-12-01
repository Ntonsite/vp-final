<?php require_once('includes/lock.php'); ?>
    <div class="container">
    <br>
        <form enctype="multipart/form-data" method="post" action="<?php echo site_url('group/update')?>/<?php echo $row->id; ?>">
            <div class="form-group">
                <label for="exampleInputEmail1">Group Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $row->name; ?>" aria-describedby="emailHelp" placeholder="Enter name of a Group">
            </div>
            <button type="submit" class="btn btn-primary" value="save">Update</button>
            <a href="<?php echo site_url('group')?>"><button type="button" class="btn btn-danger">Cancel</button></a>
        </form>  
    </div>
    <?php $this->load->view('includes/footer'); ?>
  </body>
</html>