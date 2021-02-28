<select name="area" class="form-control  basic">
    <option selected disabled>--Select area--</option>
    @foreach ($areas as $area)
        <option value="{{$area->id}}">{{$area->area_name}}</option>
    @endforeach
</select>
