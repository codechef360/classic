<select name="sub_category" class="form-control unicase-form-control js-example-basic-single">
    @foreach ($subcategories as $sub)
        <option value="{{$sub->id}}">{{$sub->sub_category_name}}</option>
    @endforeach
</select>
