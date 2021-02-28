<select name="subcategory" class="form-control  basic">
    <option selected disabled>--Select subcategory--</option>
    @foreach ($subcategories as $sub)
        <option value="{{$sub->id}}">{{$sub->sub_category_name}}</option>
    @endforeach
</select>
