<?php require_once('includes/lock.php'); ?>
<div class="container">
    <br>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#lc">
        Add License
        <i class="fas fa-plus"></i>
    </button><br><br>
    <!-- Modal -->
    <div class="modal fade" id="lc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">License Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" method="post" action="<?php echo site_url('License/create')?>">
                        <div class="form-group">
                            <label for="exampleInputEmail1">License Name</label>
                            <input required="" type="text" class="form-control" name="license_name" aria-describedby="emailHelp" placeholder="License Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <input required="" type="text-area" class="form-control" name="description" aria-describedby="emailHelp" placeholder="Description">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Activations Number</label>
                            <input required="" type="number" class="form-control" name="activations_number" aria-describedby="emailHelp" placeholder="Activations number">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Select Vendor</label>
                            <select name="vendor" class="form-control">
                                <?php if (!empty($vendor)) {
                                    foreach($vendor as $vendors){?>
                                        <option value="<?php echo $vendors->vendorID; ?>"><?php echo $vendors->v_name; ?></option>
                                    <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Expiry Date</label>
                            <input required="" type="date" class="form-control" name="date_of_expiry" aria-describedby="emailHelp" placeholder="Expiry Date">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Attachment</label>
                            <input required="" type="file" accept="image/*,.pdf,.doc,.docx" class="form-control" name="file" aria-describedby="emailHelp" placeholder="attach a picture">
                        </div>
                        <button type="submit" class="btn btn-primary" value="save">Submit</button>
                        <button data-dismiss="modal" type="button" class="btn btn-danger">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="save_success" value="<?php echo $this->session->flashdata('license_save'); ?>">
    <input type="hidden" id="update_success" value="<?php echo $this->session->flashdata('license_update'); ?>">
    <table id="dataload" class="table table-striped table-hover table-responsive-md">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Activations#</th>
            <th scope="col">Expiry Date</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($result)) {
            foreach($result as $row) {?>
                <tr>
                    <th scope="row"><?php echo $row->id; ?></th>
                    <td><?php echo $row->license_name; ?></td>
                    <td><?php echo $row->description; ?></td>
                    <td><?php echo $row->activations_number; ?></td>
                    <td><?php echo $row->date_of_expiry; ?></td>
                    <td><a class="btn btn-sm btn-primary" href="<?php echo base_url('uploads/licenses');?>/<?php echo $row->file;?>">View</a>
                        <a class="btn btn-sm btn-warning" href="<?php echo site_url('License/edit');?>/<?php echo $row->id;?>">Edit</a>
                        <a onClick="javascript: return confirm('Please confirm deletion');" class="btn btn-sm btn-danger" href="<?php echo site_url('License/delete');?>/<?php echo $row->id;?>">Delete</a> </td>
                </tr>
            <?php }
        } ?>
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#dataload').DataTable( {

        } );
    } );
</script>
<script>
    if ($("#save_success").val() == 'success') {
        swal(
            {
                title: "Success!",
                text: "License has been added successfully!",
                type: "success",
                timer: 1500
            }
        );
    }if ($("#update_success").val() == 'success') {
        swal(
            {
                title: "Success!",
                text: "License updated successfully!",
                type: "success",
                timer: 1500
            }
        );
    }
</script>
<?php $this->load->view('includes/footer'); ?>
</body>
</html>
