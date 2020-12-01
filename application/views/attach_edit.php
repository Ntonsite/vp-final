<?php require_once('includes/lock.php'); ?>
<div class="container">
    <br>
    <br>
    <form enctype="multipart/form-data" method="post" action="<?php echo site_url('attachment/update')?>/<?php if (!empty($row)) {
        echo $row->id_attach;
    } ?>">
        <div class="form-group">
            <label for="exampleInputEmail1">Attachment Name</label>
            <input type="text" class="form-control" name="attach_name" value="<?php echo $row->name; ?>" aria-describedby="emailHelp" placeholder="Attachment name">
        </div>

        <div class="form-group">
            <label for="vendor">Vendor</label>
            <select name="vendor" class="form-control">
                <?php if (!empty($result)) {
                    foreach($result as $vendors){?>
                        <option value="<?php echo $vendors->vendorID; ?>"><?php echo $vendors->v_name; ?></option>
                    <?php }
                } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Attachment</label>
            <input required="" value="<?php echo set_value('file',$row->file); ?>" type="file" class="form-control" name="file" aria-describedby="emailHelp" placeholder="attach file">
        </div>
        <button type="submit" class="btn btn-primary" value="save">Submit</button>
        <a href="<?php echo site_url('attachment')?>"><button type="button" class="btn btn-danger">Cancel</button></a>
    </form>
</div>
<?php $this->load->view('includes/footer'); ?>
</body>
</html>
