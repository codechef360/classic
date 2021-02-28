<select name="area" class="form-control unicase-form-control js-example-basic-single">
    @foreach ($areas as $area)
        <option value="{{$area->id}}">{{$area->area_name}}</option>
    @endforeach
</select>
