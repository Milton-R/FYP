@extends('layout')

<form action="/locations/{{$location->id}}" method="post">
    @method('PUT')
    @csrf

        <input type="hidden"  name='user_id'  value={{ Auth::user()->id }} >

        <div class="form-group">
            <label for="picture">Example file input</label>
            <input type="file" class="form-control-file"  value="{{$location->picture}}" id="LocationImagef" name="picture">
            @error('picture') <p style="color:red;">{{$message}}</p>@enderror
        </div>

        <div class="form-group">
            <label for="name">Location</label>
            <input type="text" class="form-control" value="{{$location->name}}" name="name">
            @error('name') <p style="color:red;">{{$message}}</p>@enderror
        </div>



        <div class="form-group">
            <label for="plantType">Plant Type</label>
            <select class="form-control" name="plantType">
                <option> </option>
                <option>Flower</option>
                <option>Vegetable</option>
                <option>Tree</option>
                <option>Herb</option>
                <option>Shrubs</option>
            </select>
            @error('plantType') <p style="color:red;">{{$message}}</p>@enderror
        </div>


        <div class="form-group">
            <label for="othertype">Plant Name</label>
            <input type="text" class="form-control" value="{{$location->otherType}}" name="otherType">
            @error('othertype') <p style="color:red;">{{$message}}</p>@enderror
        </div>


        <div class="form-group">
            <label for="created_at">Date created</label>
            <input type="date" class="form-control" id="DatePlantedf" value="{{$location->created_at->toDateString()}}" name="created_at">
            @error('DatePlantedf') <p style="color:red;">{{$message}}</p>@enderror
        </div>


        <div class="form-group">
            <label for="notes">Notes</label>
            <textarea class="form-control" name="notes" rows="10">{{$location->notes}}</textarea>
            @error('notes') <p style="color:red;">{{$message}}</p>@enderror
        </div>


        <button class="btn-primary" type="submit">Edit</button>


</form>
