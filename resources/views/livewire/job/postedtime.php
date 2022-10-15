                    <!-- select-Categories start -->
                    <div class="select-Categories pb-50">
                        <div class="small-section-tittle2">
                            <h4>Posted Within</h4>
                        </div>
                        <label class="container">Any
                            <input type="radio" wire:model="posttimes.0" wire:change="timeChange(0)">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Today
                            <input type="radio" checked="checked active" wire:model="posttimes.1" wire:change="timeChange(1)">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Last 2 days
                            <input type="radio" wire:model="posttimes.2" wire:change="timeChange(2)">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Last 3 days
                            <input type="radio" wire:model="posttimes.3" wire:change="timeChange(3)">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Last 5 days
                            <input type="radio" wire:model="posttimes.4" wire:change="timeChange(4)">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Last 10 days
                            <input type="radio" wire:model="posttimes.5" wire:change="timeChange(5)">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <!-- select-Categories End -->