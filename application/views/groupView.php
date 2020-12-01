<?php require_once('includes/lock.php'); ?>
    <div class="container">
    <br>
   <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#con">
        Add Group
        <i class="fas fa-plus"></i></button> <br><br>
       <!-- Modal -->
        <div class="modal fade" id="con" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Group Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?php echo site_url('group/createGroup')?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Group Name</label>
                                <input required="" type="text" class="form-control" name="group_name" aria-describedby="emailHelp" placeholder="Group Name">
                            </div>
                            <button type="submit" class="btn btn-primary" value="save">Submit</button>
                             <a href="<?php echo site_url('group')?>"><button type="button" class="btn btn-danger">Cancel</button></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <table id="dataload" class="table table-striped table-hover table-responsive-md">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($result as $row) {?>
                <tr>
               <th scope="row"><?php echo $row->id; ?></th>
                <td><?php echo $row->name; ?></td>
                <td><a class="btn btn-sm btn-warning" href="<?php echo site_url('group/editGroup');?>/<?php echo $row->id;?>">Edit</a>
                   <a onClick="javascript: return confirm('Please confirm deletion');" class="btn btn-sm btn-danger" href="<?php echo site_url('group/delete');?>/<?php echo $row->id;?>">Delete</a></td>
                </tr>
                <?php } ?>
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