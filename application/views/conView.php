<?php require_once('includes/lock.php'); ?>
<div class="container">
    <br>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#con">
        Add Contract
        <i class="fas fa-plus"></i></button> <br><br>
    <!-- Modal -->
    <div class="modal fade" id="con" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Contract Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo site_url('Contract/create')?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Contract Name</label>
                            <input id="contractName" required="" type="text" class="form-control" name="contract_name" aria-describedby="emailHelp" placeholder="Contract Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea class="form-control" placeholder="contract description" name="description" id="" cols="30" rows="3"></textarea>
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
                            <label for="exampleInputEmail1">Start Date</label>
                            <input required="" type="date" class="form-control" name="date_of_start" aria-describedby="emailHelp" placeholder="Date">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Expiry Date</label>
                            <input required="" type="date" class="form-control" name="date_of_expiry" aria-describedby="emailHelp" placeholder="Date">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Attachment (PDF& DOC)</label>
                            <input required="" accept="image/*,.pdf,.doc,.docx" type="file" class="form-control" name="file" aria-describedby="emailHelp" placeholder="attach a picture">
                        </div>
                        <button type="submit" class="btn btn-primary" value="save">Submit</button>
                        <button data-dismiss="modal" type="button" class="btn btn-danger">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php echo $this->session->userdata('user_id'); ?>
    <input type="hidden" id="save_success" value="<?php echo $this->session->flashdata('contract_save');?>">
    <input type="hidden" id="update_success" value="<?php echo $this->session->flashdata('contract_update');?>">
    <table id="dataload" class="table table-striped table-hover table-responsive-md">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Start Date</th>
            <th scope="col">Expiry Date</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($result)) {
            foreach($result as $row) {?>
                <tr>
                    <th scope="row"><?php echo $row->id; ?></th>
                    <td><?php echo $row->contract_name; ?></td>
                    <td><?php echo $row->description; ?></td>
                    <td><?php echo $row->date_of_start; ?></td>
                    <td><?php echo $row->date_of_expiry; ?></td>
                    <td><a class="btn btn-sm btn-primary" href="<?php echo base_url('uploads/contracts');?>/<?php echo $row->file;?>">View</a>
                        <a class="btn btn-sm btn-warning" href="<?php echo site_url('Contract/edit');?>/<?php echo $row->id;?>">Edit</a>
                        <a onClick="javascript: return confirm('Please confirm deletion');" class="btn btn-sm btn-danger" href="<?php echo site_url('Contract/delete');?>/<?php echo $row->id;?>">Delete</a></td>
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
<script>
    if ($("#save_success").val() == 'success') {
        swal(
            {
                title: "Success!",
                text: "Contract added successfully!",
                type: "success",
                icon: "success",
                timer: 1500
            }
        );
    }if ($("#update_success").val() == 'success') {
        swal(
            {
                title: "Success!",
                text: "Contract updated successfully!",
                type: "success",
                icon: "success",
                timer: 1500
            }
        );
    }
</script>


</body>
</html>
