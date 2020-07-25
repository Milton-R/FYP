@extends('layouts.app')
@section('content')
<form action="/locations" method="post" enctype="multipart/form-data">
    @csrf

        <input type="hidden"  name='user_id'  value={{ Auth::user()->id }} >

        <div class="form-group">
            <label for="LocationImagef">Example file input</label>
            <input type="file" class="form-control-file" id="LocationImagef" name="picture">
        </div>

        <div class="form-group">
            <label for="LocationNamef">Location</label>
            <input type="text" class="form-control" name="name">
        </div>



        <div class="form-group">
            <label for="PlantTypeF">Plant Type</label>
            <select class="form-control" name="plantType">
                <option> </option>
                <option>Flower</option>
                <option>Vegetable</option>
                <option>Tree</option>
                <option>Herb</option>
                <option>Shrubs</option>
            </select>
        </div>



        <div class="form-group">
            <label for="OtherPlantTypef">if you could not find the option which one is it?</label>
            <input type="text" class="form-control" name="otherType">
        </div>

        <div class="form-group">
            <label for="DatePlantedf">Date created</label>
            <input type="date" class="form-control" id="DatePlantedf" name="created_at">
        </div>

        <div class="form-group">
            <label for="LocationNotesF">Notes</label>
            <textarea class="form-control" name="notes" rows="5"></textarea>
        </div>

    <div class="form-group">
        <label for="locationType">Is this an Indoor or Outdoor Location?</label>
        <select class="form-control" name="locationType">
            <options></options>
            <option value="1">Indoors</option>
            <option value="2">OutDoors</option>
        </select>
        @error('locationType') <p style="color:red;">{{$message}}</p>@enderror
    </div>

        <button type="submit"></button>


</form>
@endsection
