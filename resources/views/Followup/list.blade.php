@extends('Layout.index')
@section('content')
<div class="flex ml-40 space-x-4 my-10">
    <form action="{{ route('followup.create') }}" method="GET">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded">
            Add follow up
        </button>
    </form>
    <form action="{{ route('contact.list') }}" method="GET">
        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-4 px-8 rounded">
            Contact list
        </button>
    </form>
    <form action="{{ route('reminder.admin') }}" method="GET">
        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-4 px-8 rounded">
            Email Reminder
        </button>
    </form>
</div>

<div class="bg-white container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h2 class="text-2xl font-semibold mb-4">Follow-up list</h2>
    @if (session('success'))
    <div class="p-4 mb-4 rounded-md bg-green-400">
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
                <th class="px-4 py-2">Admin Name</th>
                <th class="px-4 py-2">Date Time</th>
                <th class="px-4 py-2">Type</th>
                <th class="px-4 py-2">Notification Type </th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($followups as $followup)

            <tr>
                <td class="border px-4 py-2">
                    {{ $followup->user->name }}
                </td>
                <td class="border px-4 py-2">{{ $followup->date_time }}</td>
                <td class="border px-4 py-2">{{ $followup->type }}</td>
                <td class="border px-4 py-2">{{ $followup->notification_type }}</td>
                <td class="border px-4 py-2">{{ $followup->status }}</td>
                <td>
                    <button class="bg-blue-500 text-white font-extrabold hover:bg-blue-800 rounded-md py-4 px-10"
                        type="button"><a href="{{ route('followup.edit',$followup->id) }}">Edit</a></button>
                    <button type="button"
                        class="bg-red-500 text-white font-extrabold hover:bg-red-800 rounded-md py-4 px-10"><a
                            href="{{ route('followup.delete',$followup->id) }}">Delete</a></button>
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
