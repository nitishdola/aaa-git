<div class="row">
  <div class="col-md-6">
      <div class="form-group {{ $errors->has('date_of_receive') ? 'has-error' : ''}}">
          {!! Form::label('Date of Receive*', '', array('class' => '')) !!}
           {!! Form::text('date_of_receive', date('d-m-Y'), ['class' => 'form-control border-input zebra', 'id' => 'date_of_receive', 'autocomplete' => 'off', 'required' => 'true']) !!}

           {!! $errors->first('date_of_receive', '<span class="help-inline">:message</span>') !!}
      </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
      <div class="form-group {{ $errors->has('item_id') ? 'has-error' : ''}}">
          {!! Form::label('Item*', '', array('class' => '')) !!}
           {!! Form::select('item_id', $items, null, ['class' => 'selectize border-input', 'id' => 'item_id', 'autocomplete' => 'off', 'required' => 'true']) !!}

           {!! $errors->first('item_id', '<span class="help-inline">:message</span>') !!}
      </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
      <div class="form-group {{ $errors->has('vendor_name') ? 'has-error' : ''}}">
          {!! Form::label('Vendor*', '', array('class' => '')) !!}
           {!! Form::text('vendor_name', 'VEEVEK TRADERS', ['class' => 'form-control border-input', 'id' => 'vendor_name', 'autocomplete' => 'off', 'required' => 'true']) !!}

           {!! $errors->first('vendor_name', '<span class="help-inline">:message</span>') !!}
      </div>
  </div>

  <div class="col-md-6">
        <div class="form-group {{ $errors->has('quantity') ? 'has-error' : ''}}">
          {!! Form::label('Quanity*', '', array('class' => '')) !!}
           {!! Form::text('quantity', null, ['class' => 'form-control border-input', 'id' => 'quantity', 'autocomplete' => 'off', 'required' => 'true']) !!}

           {!! $errors->first('quantity', '<span class="help-inline">:message</span>') !!}
      </div>
    </div>

</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('remarks') ? 'has-error' : ''}}">
          {!! Form::label('Remarks', '', array('class' => '')) !!}
           {!! Form::textarea('remarks', null, ['class' => 'form-control border-input', 'id' => 'remarks', 'autocomplete' => 'off', 'rows' => 3]) !!}

           {!! $errors->first('remarks', '<span class="help-inline">:message</span>') !!}
      </div>
    </div>
</div>