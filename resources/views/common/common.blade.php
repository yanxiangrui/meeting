<script type="text/javascript">
var tips = {
	closeTime: 1000
};    

@if (Session::has('message')) 
	tips.message = '{{ Session::get('message') }}';
@endif

@if (Session::has('success')) 
	tips.success = '{{ Session::get('success') }}';
@endif

@if (Session::has('danger')) 
    tips.danger = '{{ Session::get('danger') }}';
@endif


@if (count($errors) > 0)
	tips.formError = '';

	@foreach ($errors->all() as $error)
		tips.formError += "<p><cite>{{ $error }}</cite></p>";
    @endforeach		
@endif

var app = {tips: tips};

</script>