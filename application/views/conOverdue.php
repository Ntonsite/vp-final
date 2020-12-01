<?php require_once('includes/lock.php'); ?>
    <div class="container">
      <br>
      <a class="btn btn-primary" href="<?php echo site_url('Dashboard');?>">Go Back  <span class="fas fa-arrow-left"></span></button></a>
      <br><br>
        <table id="dataload" class="table table-striped table-hover table-responsive-md">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Expiry Date</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($result as $row) {?>
                <tr>
                <th scope="row"><?php echo $row->id; ?></th>
                <td><?php echo $row->contract_name; ?></td>
                <td><?php echo $row->description; ?></td>
                <td><?php echo $row->date_of_expiry; ?></td>
                <td><a class="btn btn-sm btn-primary" href="<?php echo base_url('uploads/contracts');?>/<?php echo $row->file;?>">View</a>
                 <a class="btn btn-sm btn-warning" href="<?php echo site_url('Contract/edit');?>/<?php echo $row->id;?>">Edit</a>
                   <a onClick="javascript: return confirm('Please confirm deletion');" class="btn btn-sm btn-danger" href="<?php echo site_url('Contract/delete');?>/<?php echo $row->id;?>">Delete</a> </td>
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
    <?php $this->load->view('includes/footer'); ?>
  </body>
</html>