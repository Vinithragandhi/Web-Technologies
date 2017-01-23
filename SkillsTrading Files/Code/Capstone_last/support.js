function callAction(action){
	if(action === 'Delete'){
		if(confirm('Are you sure you want to delete this item?')){
		document.getElementById('action').value = 'Delete';
	}
	else{
		return false;
	}
	}
	else{
		document.getElementById('action').value = 'Reply';
	}
	document.getElementById('inboxForm').submit();
}

