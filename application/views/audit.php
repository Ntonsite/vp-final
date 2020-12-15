<?php require_once('includes/lock.php'); ?>

<?php
$portal = $this->session->userdata('role');

if($portal == 2){
	redirect('restricted');
}
?>
<div class="container">
	<br>
	<!-- Button trigger modal -->

	<table id="dataload" class="table table-striped table-hover table-responsive-md">
		<thead class="thead-light">
		<tr>
			<th scope="col">#</th>
			<th scope="col">Event</th>
			<th scope="col">Table Name</th>
			<th scope="col">Old Values</th>
			<th scope="col">New Values</th>
			<th scope="col">URL</th>
			<th scope="col">IP Address</th>
			<th scope="col">User Agent</th>
			<th scope="col">Time</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach($result as $row) {?>
			<tr>
				<th scope="row"><?php echo $row->id; ?></th>
				<td><?php echo $row->event; ?></td>
				<td><?php echo $row->table_name; ?></td>
				<td><?php if (!empty($row->old_values)) {
						echo $row->old_values;
					}else{
					echo 'N/A';
					} ?></td>
				<td><?php echo $row->new_values; ?></td>
				<td><?php echo $row->url; ?></td>
				<td><?php echo $row->ip_address; ?></td>
				<td><?php echo $row->user_agent; ?></td>
				<td><?php echo $row->created_at; ?></td>
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
