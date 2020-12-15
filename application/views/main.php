<?php require_once('includes/lock.php'); ?>
<div class="container">
    <br>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#user">
        Add User
        <i class="fas fa-plus"></i></button> <br><br>
    <!-- Modal -->
    <div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">User Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo site_url('engine/create')?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input required="" type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Add username">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Select Group</label>
                            <select name="group" class="form-control">
                                <?php if (!empty($group)) {
                                    foreach($group as $groups){?>
                                        <option value="<?php echo $groups->id; ?>"><?php echo $groups->name; ?></option>
                                    <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Select Role</label>
                            <select name="role" class="form-control">
                                <?php if (!empty($role)) {
                                    foreach($role as $roles){?>
                                        <option value="<?php echo $roles->id; ?>"><?php echo $roles->name; ?></option>
                                    <?php }
                                } ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" value="save">Submit</button>
                        <a href="<?php echo site_url('engine')?>"><button type="button" class="btn btn-danger">Cancel</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <table id="dataload" class="table table-striped table-hover table-responsive-md">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">User</th>
            <th scope="col">Role</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($result)) {
            foreach($result as $row) {?>
                <tr>
                    <th scope="row"><?php echo $row->user_id; ?></th>
                    <td><?php echo $row->user_name; ?></td>
                    <th scope="row"><?php if($row->role==1){echo "engine";}else{echo "Member";} ?></th>
                    <th scope="row"><?php if($row->is_active==1){echo "Active";}else{echo "Not Active";} ?></th>
                    <td><a class="btn btn-sm btn-warning" href="<?php echo site_url('engine/edit');?>/<?php echo $row->user_id;?>">Edit</a>
                        <a onClick="javascript: return confirm('Please confirm deletion');" class="btn btn-sm btn-danger" href="<?php echo site_url('engine/delete');?>/<?php echo $row->user_id;?>">Delete</a></td>
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
