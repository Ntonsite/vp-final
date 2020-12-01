<?php require_once('includes/lock.php'); ?>
<div class="container">
    <br>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#con">
        Add Vendor
        <i class="fas fa-plus"></i></button> <br><br>
    <!-- Modal -->
    <div class="modal fade" id="con" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Vendor Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo site_url('Vendor/create')?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input required="" type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Enter vendor name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Location Adress</label>
                            <input required="" type="text" class="form-control" name="address" aria-describedby="emailHelp" placeholder="Enter vendor name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Contact Person</label>
                            <input required="" type="text" class="form-control" name="cperson" aria-describedby="emailHelp" placeholder="Enter a name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Contact Email</label>
                            <input required="" type="text" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Contact email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone Number</label>
                            <input required="" type="text" class="form-control" name="phone" aria-describedby="emailHelp" placeholder="Enter phone number">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Service Offered</label>
                            <input required="" type="text" class="form-control" name="service" aria-describedby="emailHelp" placeholder="Enter service offered">
                        </div>
                        <button type="submit" class="btn btn-primary" value="save">Submit</button>
                        <a href="<?php echo site_url('Vendor');?>"><button type="button" class="btn btn-danger">Cancel</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <table id="dataload" class="table table-striped table-hover table-responsive-md">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Vendor</th>
            <th scope="col">Contact Person</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Email</th>
            <th scope="col">Service Offered</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($vendor)) {
            foreach($vendor as $row) {?>
                <tr>
                    <th scope="row"><?php echo $row->vendorID; ?></th>
                    <td><?php echo $row->v_name; ?></td>
                    <td><?php echo $row->contact_person; ?></td>
                    <td><?php echo $row->contact_email; ?></td>
                    <td><?php echo $row->phone_number; ?></td>
                    <td><?php echo $row->service_offered; ?></td>
                    <td><a class="btn btn-sm btn-warning" href="<?php echo site_url('Vendor/edit');?>/<?php echo $row->vendorID;?>">Edit</a>
                        <a onClick="javascript: return confirm('Please confirm deletion');" class="btn btn-sm btn-danger" href="<?php echo site_url('Vendor/delete');?>/<?php echo $row->vendorID;?>">Delete</a></td>
                </tr>
            <?php }
        } ?>
        </tbody>
    </table>
</div>
<!-- Below script initializes Data table which receive Dynamic Data from MySQL -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#dataload').DataTable( {
        } );
    } );
</script>

</body>
</html>
