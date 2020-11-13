<div class="hv-item-children">

    @foreach($childs as $member)

	<div class="hv-item-child @if($member->hand == 1) left @else right @endif">
        <!-- Key component -->
        <div class="hv-item">

	    	<div class="hv-item-parent">
	    		<a href="{{ route('memberListId',$member->id) }}">
                	<p class="simple-card"><img width="50" src="{{ url('/') }}/public/admin/dist/img/avatar1.png" alt=""><br> ID# {{ $member->id }} <br> {{ $member->name }} <br>
				
				<span>LT#{{ App\User::myChild($member->id, 1) }}</span> - <span>RT#{{ App\User::myChild($member->id, 2) }}</span>
            	</p>
            </div>
			@if($defth < 4 )
				@if(count($member->childs))
					@php $defth++ @endphp
		            @include('pages.manageChild',['childs' => $member->childs, 'defth' => $defth])
		        @endif
	        @endif

		</div>
    </div>

@endforeach
</div>