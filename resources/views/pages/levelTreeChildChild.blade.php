@php use App\User; @endphp
<div class="hv-item-children">
@php $count = count($childs); --$count; @endphp
    @foreach($childs as $key => $member)

	<div class="hv-item-child  @if($key == 0) left @elseif($key == $count) right @endif">
        <!-- Key component -->
        <div class="hv-item">

	    	<div class="hv-item-parent">
	    		<a href="{{ route('levelTreeId',$member->id) }}">
                	<p class="simple-card  text-center"><img width="50" src="{{ url('/') }}/public/admin/images/logo2.png" alt=""><br> ID# {{ $member->id }} MC# {{ User::myChild($member->id) }} <br> {{ $member->name }} <br>
				
				{{-- <span>LT#{{ App\User::myChild($member->id, 1) }}</span> - <span>RT#{{ App\User::myChild($member->id, 2) }}</span> --}}
            	</p>
            </div>
		</div>
    </div>
@endforeach
</div>