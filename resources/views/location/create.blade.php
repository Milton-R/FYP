@extends('layout')

<form action="/locations" method="post">
    @csrf

        <div class="form-group">
            <label for="LocationImagef">Example file input</label>
            <input type="file" class="form-control-file" id="LocationImagef" name="locationpic">
        </div>

        <div class="form-group">
            <label for="LocationNamef">Location</label>
            <input type="text" class="form-control" name="locationNamef">
        </div>



        <div class="form-group">
            <label for="PlantTypeF">Plant Type</label>
            <select class="form-control" name="plantTypeF">
                <option>"Flower"</option>
                <option>"Vegetable"</option>
                <option>"Tree"</option>
                <option>"Herb"</option>
                <option>"Shrubs"</option>
            </select>
        </div>



        <div class="form-group">
            <label for="OtherPlantTypef">Plant Name</label>
            <input type="text" class="form-control" name="otherPlantTypef">
        </div>



        <div class="form-group">
            <label for="LocationNotesF">Notes</label>
            <textarea class="form-control" name="locationNamef" rows="5"></textarea>
        </div>

        <button type="submit"></button>


</form>
