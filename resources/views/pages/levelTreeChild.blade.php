@php use App\User; @endphp
<div class="hv-item-children">
@php $count = count($childs); --$count; @endphp
    @foreach($childs as $key => $member)

	<div class="hv-item-child  @if($key == 0) left @elseif($key == $count) right @endif">
        <!-- Key component -->
        <div class="hv-item">

	    	<div class="hv-item-parent">
	    		<a href="{{ route('levelTreeId',$member->id) }}">
	                <p class="simple-card text-center"><img width="50" src="{{ url('/') }}/public/admin/images/logo3.png" alt=""><br>{{ $member->username }} <br>
                          <span>LT#{{ App\User::myChildLR($member->id, 1) }}</span> - <span>RT#{{ App\User::myChildLR($member->id, 2) }}</span>
                        </p>
	            </a>
            </div>
			@if($defth < 2 )
				@if(count($member->childs))
		            @include('pages.levelTreeChildChild',['childs' => $member->childs, 'defth' => $defth])
		        @endif
	        @endif

		</div>
    </div>
@endforeach
</div>
@php $defth++ @endphp