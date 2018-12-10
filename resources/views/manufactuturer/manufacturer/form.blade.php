<div class="form-group {{ $errors->has('manufacturer') ? 'has-error' : ''}}">
    <label for="manufacturer" class="control-label">{{ 'Manufacturer' }}</label>
    <input class="form-control" name="manufacturer" type="text" id="manufacturer" value="{{ $manufacturer->manufacturer or ''}}" >
    {!! $errors->first('manufacturer', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
