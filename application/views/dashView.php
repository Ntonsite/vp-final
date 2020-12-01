<?php require_once('includes/lock.php'); ?>

<?php $success_msg= $this->session->flashdata('success_msg'); ?>
    <?php if($success_msg){
      ?>
      <div class="alert alert-success">
        <?php echo $success_msg; ?>
      </div>
      <?php
    } ?>
    <div class="container">
  <!-- Arranging some cards for the dashboard -->
        <br>
        <div class="row">
          <div class="col-sm-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Total Contracts</h5>
                <p class="card-text"><?php if (!empty($result)) {
                        echo $result;
                    }else{echo "0";} ?></p>
                <a href="<?php echo site_url('contract') ?>" class="btn btn-block btn-primary">View</a>
              </div>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Total Licenses</h5>
                <p class="card-text"><?php if (!empty($lresult)) {
                        echo $lresult;
                    }else{echo "0";} ?></p>
                <a href="<?php echo site_url('license') ?>" class="btn btn-block btn-primary">View</a>
              </div>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Total Vendors</h5>
                <p class="card-text"><?php if (!empty($vendorNo)) {
                        echo $vendorNo;
                    }else{echo "0";} ?></p>
                <a href="<?php echo site_url('Vendor'); ?>" class="btn btn-block btn-primary">View</a>
              </div>
            </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('includes/footer'); ?>
  </body>
</html>
