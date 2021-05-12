{{-- @extends('layouts.admin')
  

@section('content')

  <h1>Admin</h1>
    
@endsection --}}

<x-admin-master>

  
@section('content')

@if(auth()->user()->userHasRole('Admin'))
<h1 class="h3 mb-4 text-gray-800">Admin master na component</h1>
@endif
@endsection --}}

</x-admin-master>