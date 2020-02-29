@extends('layout')

<form action="/locations" method="post">
    @csrf

        <input type="hidden"  name='user_id'  value={{ Auth::user()->id }} >

        <div class="form-group">
            <label for="LocationImagef">Example file input</label>
            <input type="file" class="form-control-file"  value="{{$location->picture}}" id="LocationImagef" name="picture">
        </div>

        <div class="form-group">
            <label for="LocationNamef">Location</label>
            <input type="text" class="form-control" value="{{$location->name}}" name="name">
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
            <label for="OtherPlantTypef">Plant Name</label>
            <input type="text" class="form-control" value="{{$location->otherType}}" name="otherType">
        </div>

        <div class="form-group">
            <label for="DatePlantedf">Plant Name</label>
            <input type="date" class="form-control" id="DatePlantedf" value="{{$location->otherType}}" name="created_at">
        </div>



        <div class="form-group">
            <label for="LocationNotesF">Notes</label>
            <textarea class="form-control" name="notes" value="{{$location->note}}" rows="5" ></textarea>
        </div>

        <button type="submit"></button>


</form>
