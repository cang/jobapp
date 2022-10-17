<div class="small-section-tittle2">
     <h4>Job Category</h4>
</div>
<!-- Select job items start -->
<div class="select-job-items2">
    <select name="category" class="form-control" id="category" wire:model="category">
        @foreach ($categories as $category)
            <option value="{{$category}}">{{$category}}</option>
        @endforeach    
    </select>
</div>
<!--  Select job items End-->