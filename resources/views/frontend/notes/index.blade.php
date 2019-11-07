@extends('frontend.layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col">

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="card mb-4">
                            <div class="card-header">
                                Notes
                                <span onclick="addNotes();" style="float: right;"><i class="fa fa-plus-square" aria-hidden="true"></i></span>
                            </div><!--card-header-->

                            <div class="card-body">
                                <div class="listNotes"></div>
                                <div class="row addNew" style="display: none;">
                                    <textarea  id="newNote" rows="4" cols="50" style=" width: 100%;" >
                                    </textarea>
                                </div>
                            </div><!--card-body-->
                        </div><!--card-->
                    </div><!--col-md-6-->
                </div><!--row-->
            </div><!--row-->
</div><!-- row -->
</div><!-- row -->
@endsection
@push('after-scripts')
<script>
  $.ajax({
     headers: {
        'X-CSRF-Token': '{{csrf_token()}}' 
    },
    type:'GET',
    url:'/notes/list',
    success:function(data) {  

        $('.listNotes').html(data);
    }
});

function addNotes(){
    $('.addNew').show();

}
$('#newNote').focusout(function(){
    var data = $('#newNote').val();

    if(data !=""){
      $.ajax({
         headers: {
            'X-CSRF-Token': '{{csrf_token()}}' 
        },
        type:'POST',
        data:{data:data},
        url:'/notes/add',
        success:function(data) {
            $('#newNote').val('');
            $('.addNew').hide();
            $('.listNotes').html("");
            $('.listNotes').html(data);
        }
    });  
  }
  
});

</script>

@endpush
