<script type="text/javascript">
var tips = {
	closeTime: 2000
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

var app = {tips: tips};
</script>