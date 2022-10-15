<div class="small-section-tittle2">
     <h4>Job Location</h4>
</div>
<div class="select-job-items2">
    <select name="location" id="location" wire:model="location" wire:change="changeLocation()">
    @foreach($locations as $location)
        <option value="{{$location}}">{{$location}}</option>
    @endforeach        
    </select>
</div>


