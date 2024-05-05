<div>
    <form wire:submit.prevent="searchForm">
        <div class="flex  items-center">
            <input wire:model.lazy="search" class="lms-input h-10 rounded-none" placeholder="Search..." type="text" required>
            <button class="lms-button rounded-none" type="submit">Search</button>
        </div> 
    </form>

    <form wire:submit.prevent="admit">
        @if (count($leads) > 0)
            <div class="my-4">
                <select wire:model.lazy="lead_id" id="" class="lms-input">
                    <option value="">Select Lead</option>
                    @foreach ($leads as $lead)
                        <option value="{{$lead->id}}"> {{$lead->name}} - {{$lead->phone}}</option>
                    @endforeach
                </select>
            </div>
        @endif
        
        @if (!empty($lead_id))
            <div class="my-4">
                <select wire:change="courseSelected" wire:model.lazy="course_id" id="" class="lms-input">
                    <option value="">Select Course</option>
                    @foreach ($courses as $course)
                        <option value="{{$course->id}}"> {{$course->name}}</option>
                    @endforeach
                </select>
            </div>
        @endif 
        @if (!empty($selectedCourse))
            <p class="mb-4"> Price: $ {{number_format($selectedCourse->price, 2)}} </p>
            
            <div class="mb-4">
                <input wire:model.lazy="payment" type="number" step=".01" max="{{number_format($selectedCourse->price, 2)}}" class="lms-input" placeholder="Payment now!">
            </div>

            @include('components.icons.loading-btn')
        @endif
    </form>
</div>
