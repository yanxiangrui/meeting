@if (count($errors) > 0)
	var errorstr = '';

	@foreach ($errors->all() as $error)
		errorstr += '<p><cite>{{ $error }}</cite></p>';
    @endforeach	

	view.error(errorstr, {title: '错误提示',offset: '15px'}); 	
@endif