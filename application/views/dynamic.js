$(document).ready(function(){
	var i = 1;
	$('#add').click(function(){
		i++;
		$('#dynamic_field').append('<div id="row'+id+'" class='row'>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" id="dynamic_field" name="attachmentName[]" placeholder="Name">
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="file" name="file[]">
                                    </div>
                                    <div class='col-sm-4'>
                                        <button name='add' id='+i+' class='btn btn-danger btn_remove'><i class='fas fa-plus'></i>X</button>
                                    </div>
                                </div>')
	});
});
