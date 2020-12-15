<div class="container">
    <br>
        <form method="post" action="<?php echo site_url('engine/update')?>/<?php if (!empty($row)) {
            echo $row->user_id;
        } ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputEmail1">User Name</label>
                <input value="<?php echo $row->user_name;?>" required="" type="text" class="form-control" name="user_name" aria-describedby="emailHelp" placeholder="User Name">
                <input value="<?php if (!empty($row)) {
                    echo $row->user_id;
                } ?>" required="" type="hidden" class="form-control" name="id" aria-describedby="emailHelp" placeholder="Add username">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Group</label>
               <select name="group" class="form-control">
                   <?php if (!empty($group)) {
                       foreach($group as $groups){?>
                       <option value="<?php echo $groups->id; ?>"><?php echo $groups->name; ?></option>
                       <?php }
                   } ?>
               </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Role</label>
               <select name="role" class="form-control">
                    <?php if (!empty($role)) {
                        foreach($role as $roles){?>
                        <option value="<?php echo $roles->id; ?>"><?php echo $roles->name; ?></option>
                        <?php }
                    } ?>
               </select>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status" id="">
                    <option value="1">Activate</option>
                    <option value="0">Deactivate</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" value="save">Submit</button>
             <a href="<?php echo site_url('engine')?>"><button type="button" class="btn btn-danger">Cancel</button></a>
        </form> 
    </div>
    <?php $this->load->view('includes/footer'); ?>
  </body>
</html>
