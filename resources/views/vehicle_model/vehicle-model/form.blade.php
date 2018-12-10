<div class="form-group {{ $errors->has('model') ? 'has-error' : ''}}">
    <label for="model" class="control-label">{{ 'Model Name' }}</label>
    <input data-validation="required length"
           data-validation-length="max100" class="form-control" name="model" type="text" id="model" value="{{ $vehiclemodel->model or ''}}" required>
    {!! $errors->first('model', '<p class="help-block">:message</p>') !!}
</div>

<div   class="form-group {{ $errors->has('manufacturer_id') ? 'has-error' : ''}}">
    <label class="control-label" for="manufacturer_id">Manufacturer</label>
    <select  name="manufacturer_id" id="manufacturer_id" class="form-control select2" required >
        @foreach ($manufacturers as $data)
            <option @if (isset($vehiclemodel->manufacturer_id) && $vehiclemodel->manufacturer_id == $data->id) selected @endif value="{{$data->id}}">{{$data->manufacturer}}</option>
        @endforeach
    </select>
    {!! $errors->first('manufacturer_id', '<p class="help-block">:message</p>') !!}
</div>





<div class="form-group {{ $errors->has('registration_number') ? 'has-error' : ''}}">
    <label for="registration_number" class="control-label">{{ 'Registration Number' }}</label>
    <input data-validation="required length"
           data-validation-length="max100" class="form-control" name="registration_number" type="text" id="registration_number" value="{{ $vehiclemodel->registration_number or ''}}" >
    {!! $errors->first('registration_number', '<p class="help-block">:message</p>') !!}
</div>





<div  class="form-group {{ $errors->has('manufacturing_year') ? 'has-error' : ''}}">
    <label class="control-label" for="manufacturing_year">Manufacturing Year</label>
    <select name="manufacturing_year" id="manufacturing_year" class="form-control select2" required >
        @for($i = date('Y'); $i > 1950; $i--)
            <option @if (isset($vehiclemodel->manufacturing_year) && $vehiclemodel->manufacturing_year == $i) selected @endif value="{{$i}}">{{$i}}</option>
        @endfor
    </select>
    {!! $errors->first('manufacturing_year', '<p class="help-block">:message</p>') !!}
</div>


<div  class="form-group {{ $errors->has('color') ? 'has-error' : ''}}">
    <label class="control-label" for="color">Color</label>
    <select name="color" id="color" class="form-control select2" required >
        @foreach ($vehicle_model_color as $data)

            <option @if (isset($vehiclemodel->manufacturer_id) && $vehiclemodel->manufacturer_id == $data['id']) selected @endif value="{{$data['id']}}">{{ucfirst($data['name'])}}</option>

        @endforeach
    </select>
    {!! $errors->first('color', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('note') ? 'has-error' : ''}}">
    <label for="note" class="control-label">{{ 'Note' }}</label>
    <textarea class="form-control" rows="5" name="note" type="textarea" id="note" >{{ $vehiclemodel->note or ''}}</textarea>
    {!! $errors->first('note', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

