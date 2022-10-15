<!-- Range Slider Start -->
<aside class="left_widgets p_filter_widgets price_rangs_aside sidebar_box_shadow">
    <div class="small-section-tittle2">
        <h4>Salary in range:</h4>
    </div>

    <div class="widgets_inner">
       
        <div class="range_item">
        
          <input type="range" min="0" max="10000" value="0" step="100" class="slider" id="maxsalary" name="maxsalary" wire:model="maxsalary">
        
            <div class="d-flex align-items-center">
                <div class="price_text">
                    <p>Max Salary :</p>
                </div>
                <div class="price_value d-flex justify-content-center">
                    <input type="text" class="js-input-to" value="{{$maxsalary}}$"/>
                </div>
            </div>
        </div>
    </div>
</aside>
<!-- Range Slider End -->