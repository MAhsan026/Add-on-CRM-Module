@extends('Layout.index')
@section('content')
<div class=" grid-cols-2 ml-40 flex px-5  my-10 gap-4 max-w-sm">
    <!-- Button 1 -->
    <form action="{{ route('contact.create') }}" method="GET">
        <button type="submit"
            class="bg-blue-500 flex-1 whitespace-nowrap  hover:bg-blue-700 text-white font-bold py-4 px-8 rounded">
            Add Contact
        </button>

    </form>
    <form action="{{ route('followup.list') }}" method="GET">
        <button type="submit"
            class="bg-green-500 flex-1   whitespace-nowrap hover:bg-green -700 text-white font-bold py-4 px-8 rounded">
            Followup list
        </button>
    </form>

</div>

<div class="bg-white container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h2 class="text-2xl font-semibold mb-4">Contact List</h2>
    @if (session('success'))
    <div class="p-4 mb-4 rounded-md  bg-green-400">
        {{ session('success') }}
    </div>
    @endif
    @if (session('error'))
    <div class="p-4 mb-4 rounded-md bg-red-400">
        {{ session('error') }}
    </div>
    @endif
    <table id="example" class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">First Name</th>
                <th class="px-4 py-2">Last Name</th>
                <th class="px-4 py-2">Email Address</th>
                <th class="px-4 py-2">Phone</th>
                <th class="px-4 py-2">Contact Type </th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($contact as $contact)

            <tr>
                <td class="border px-4 py-2">{{ $contact->first_name }}</td>
                <td class="border px-4 py-2">{{ $contact->last_name }}</td>
                <td class="border px-4 py-2">{{ $contact->email }}</td>
                <td class="border px-4 py-2">{{ $contact->phone }}</td>
                <td class="border px-4 py-2">{{ $contact->contact_type_id }}</td>
                <td class="border px-4 py-2">{{ $contact->status }}</td>
                <td>
                    <button class="bg-blue-500 text-white font-extrabold hover:bg-blue-800 rounded-md py-4 px-10"
                        type="button"><a href="{{ route('edit',$contact->id) }}">Edit</a></button>
                    <button type="button"
                        class="bg-red-500 text-white font-extrabold hover:bg-red-800 rounded-md py-4 px-10"><a
                            href="{{ route('delete',$contact->id) }}">Delete</a></button>
                </td>

            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">No data found</td>
            </tr>
            @endforelse



            <!-- Add more rows as needed -->
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            // Add any customization options here
        });

    });
</script>
@endsection