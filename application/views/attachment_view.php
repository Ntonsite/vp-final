<?php require_once('includes/lock.php'); ?>
<div class="container">
    <br>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#con">
        Add Attachment
        <i class="fas fa-plus"></i></button> <br><br>
    <!-- Modal -->
    <div class="modal fade" id="con" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Attachment Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo site_url('attachment/create')?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="attachmentName">Attachment Name</label>
                            <select required name="attach_name" id="" class="form-control">
                                <option value="business license">Business License</option>
                                <option value="Addendum">Addendum</option>
                                <option value="Service Level Agreement">SLA</option>
                                <option value="BRELA Registration">BRELA Registration</option>
                                <option value="VAT">VAT</option>
                                <option value="TAX Clearence">Tax Clearence</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="File">Attachment</label>
                            <input required="" accept="image/*,.pdf,.doc,.docx" type="file" class="form-control" name="file" placeholder="attach a file">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Select Vendor</label>
                            <select name="vendor" class="form-control">
                                <?php if (!empty($result)) {
                                    foreach($result as $vendors){?>
                                        <option value="<?php echo $vendors->vendorID; ?>"><?php echo $vendors->v_name; ?></option>
                                    <?php }
                                } ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary" value="save">Submit</button>
                        <button data-dismiss="modal" type="button" class="btn btn-danger">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="save_success" value="<?php echo $this->session->flashdata('attachment_save'); ?>">
    <input type="hidden" id="update_success" value="<?php echo $this->session->flashdata('attachment_update'); ?>">
    <table id="dataload" class="table table-striped table-hover table-responsive-md">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Vendor</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
		<?php $portal = $this->session->userdata('group'); ?>
		<?php $role   = $this->session->userdata('role'); ?>
        <?php if (!empty($attachments)) {
            foreach($attachments as $row) {?>
                <tr>
                    <th scope="row"><?php echo $row->id_attach; ?></th>
                    <td><?php echo $row->name; ?></td>
                    <td><?php echo $row->v_name; ?></td>

                    <td><a class="btn btn-sm btn-primary" href="<?php echo base_url('uploads/attachments');?>/<?php echo $row->file;?>">View</a>
						<?php
				          if ($portal == 3 || $role ==1) {
							  ?>
							  <a class="btn btn-sm btn-warning"
								 href="<?php echo site_url('attachment/edit'); ?>/<?php echo $row->id_attach; ?>">Edit</a>
							  <a onClick="javascript: return confirm('Please confirm deletion');"
								 class="btn btn-sm btn-danger"
								 href="<?php echo site_url('attachment/delete'); ?>/<?php echo $row->id_attach; ?>">Delete</a>
							  <?php
						  }

						?>
					</td>
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
                text: "Attachment has been added successfully!",
                type: "success",
                icon: "success",
                timer: 1500
            }
        );
    }if ($("#update_success").val() == 'success') {
        swal(
            {
                title: "Success!",
                text: "Attachment has been updated successfully!",
                type: "success",
                icon: "success",
                timer: 1500
            }
        );
    }
</script>

</body>
</html>
