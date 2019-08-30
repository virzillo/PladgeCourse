  <div class="row">
        <!-- Column -->
        <div class="col-lg-12">
            @if ($errors->any())
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                 <ul style="list-style-type: none;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
            </div>
            @endif
    </div>
</div>
{{-- @push('script')
  <script type="text/javascript">
@if (count($errors) > 0)
console.log();
     toastr.error($errors);
@endif
 
</script>  
@endpush --}}
