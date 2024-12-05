@extends('layouts.main')

@section('content')
<h1 class="flex justify-between border-b mb-4 font-medium text-xl">
    Roles

</h1>

<button type="button" data-modal-target="create-role-modal" data-modal-toggle="create-role-modal"
    class="mb-2 text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
    Create
</button>



<table class="w-full text-sm shadow-md text-left text-gray-500  overflow-y-auto">
    <thead class="text-xs text-white uppercase bg-navside text-center">
        <tr>
            <th scope="col" class="rounded-tl-lg py-3 text-center">No</th>
            <th scope="col" class="px-4 py-3 text-left">
                Name
            </th>
            <th scope="col" class="rounded-tr-lg px-4 py-3 text-left">
                Action
            </th>
        </tr>
    </thead>
    <tbody>
        
    </tbody>
</table>

@include('roles.create-modal')
@endsection