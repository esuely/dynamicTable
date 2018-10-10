

function addData(description,url){

	s="description=" + description + 
			"&url=" + url;

	$.ajax({
		type:"POST",
		url:"php/addData.php",
		data:s,
		success:function(r){
			if(r==1){
				$('#table').load('components/table.php');
				alertify.success("Added successfully :)");
			}else{
				alertify.error("Server is down :(");
			}
		}
	});

}

function addForm(data){

	d=data.split('||');

	$('#idimage').val(d[0]);
	$('#descriptionu').val(d[1]);
	$('#urlu').val(d[2]);
	
}

function updateData(){


	id=$('#idimage').val();
	description=$('#descriptionu').val();

	s= "id=" + id +
			"&description=" + description;

	$.ajax({
		type:"POST",
		url:"php/updateData.php",
		data:s,
		success:function(r){
			
			if(r==1){
				$('#table').load('components/table.php');
				alertify.success("Updated successfully :)");
			}else{
				alertify.error("Server is down :(");
			}
		}
	});

}

function yesOrNot(id){
	alertify.confirm('Delete item', '¿Are you sure?', 
					function(){ deleteData(id) }
                , function(){ alertify.error('Ok not')});
}

function deleteData(id){

	s="id=" + id;

		$.ajax({
			type:"POST",
			url:"php/deleteData.php",
			data:s,
			success:function(r){
				if(r==1){
					$('#table').load('components/table.php');
					alertify.success("Deleted successfully");
				}else{
					alertify.error("Server is down :(");
				}
			}
		});
}