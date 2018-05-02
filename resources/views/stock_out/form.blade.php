@extends('layout')

@section('content')
<div class="row">
  
  <div class="col-lg-12 col-md-12">
      <div class="card">
          <div class="header">
              <h4 class="title">Stationary Issue</h4>
          </div>
          <div class="content">
              {!! Form::open(array('route' => ['stock.issue.post'], 'id' => 'stock.issue.post', 'class' => '')) !!}
                  @include('stock_out._form')
                  <div class="text-center1">
                      <button type="submit" class="btn btn-info btn-fill btn-wd">Submit</button>
                  </div>
                  <div class="clearfix"></div>
              </form>
          </div>
      </div>
  </div>


</div>
@stop

@section('pageJs')
<script>
  $('#item_id').change(function() {
    url = data = '';

    url = "{{ route('api.get_item_info') }}";
    data = "&item_id="+$(this).val();

    $.ajax({
      data : data,
      url  : url,

      type : 'get',

      error : function(resp) {

      },

      success: function(resp) {
        $('#stockInHand').val(resp.stock_in_hand);
      }
    });

  });
</script>
@stop