<div class="row">
  <div class="col-md-6">
      <div class="form-group {{ $errors->has('date_of_issue') ? 'has-error' : ''}}">
          {!! Form::label('Date of Issue*', '', array('class' => '')) !!}
           {!! Form::text('date_of_issue', date('d-m-Y'), ['class' => 'form-control border-input zebra', 'id' => 'date_of_issue', 'autocomplete' => 'off', 'required' => 'true']) !!}

           {!! $errors->first('date_of_issue', '<span class="help-inline">:message</span>') !!}
      </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
      <div class="form-group {{ $errors->has('item_id') ? 'has-error' : ''}}">
          {!! Form::label('Item*', '', array('class' => '')) !!}
           {!! Form::select('item_id', $items, null, ['class' => 'selectize_nocreate border-input', 'id' => 'item_id', 'autocomplete' => 'off', 'required' => 'true', 'placeholder' => 'Select Item']) !!}

           {!! $errors->first('item_id', '<span class="help-inline">:message</span>') !!}
      </div>
  </div>

  <div class="col-md-3">
      <div class="form-group {{ $errors->has('item_id') ? 'has-error' : ''}}">
          {!! Form::label('Stock In Hand', '', array('class' => '')) !!}
           {!! Form::text('stockInHand', null, ['class' => 'form-control border-input', 'id' => 'stockInHand', 'autocomplete' => 'off', 'readonly' => 'readonly']) !!}

           {!! $errors->first('item_id', '<span class="help-inline">:message</span>') !!}
      </div>
  </div>
</div>


<div class="row">
  <div class="col-md-6">
      <div class="form-group {{ $errors->has('employee_id') ? 'has-error' : ''}}">
          {!! Form::label('Employee*', '', array('class' => '')) !!}
           {!! Form::select('employee_id', $employees, null, ['class' => 'selectize_nocreate', 'id' => 'employee_id', 'autocomplete' => 'off', 'required' => 'true', 'placeholder' => 'Select Employee']) !!}

           {!! $errors->first('employee_id', '<span class="help-inline">:message</span>') !!}
      </div>
  </div>

  <div class="col-md-3">
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