@extends('Layout.index')
@section('content')
<div class="container mx-auto flex items-center justify-center p-12">
    <!-- Author: FormBold Team -->
    <div class="mx-auto w-full max-w-[650px] bg-white p-8 shadow-lg rounded-lg">
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
        <form action="{{ route('followup.store') }} " method="POST">
            @csrf
            <div class="mb-5">
                <label for="first_name" class="mb-3 block text-base font-medium text-[#07074D]">
                    Select Admin
                </label>
                <select name="admin" id="admin"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                    <option value="">Select Admin</option>
                    @foreach ($adminuser as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('contact')
                <span class="text-red-400">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-5">
                <label for="contact" class="mb-3 block text-base font-medium text-[#07074D]">
                    Select Contact
                </label>
                <select name="contact" id="contact"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                    <option value="">Select Contact</option>
                    @foreach ($contact as $contact)
                    <option value="{{ $contact->id }}">{{ $contact->first_name }} {{ $contact->last_name }}</option>
                    @endforeach
                </select>
                @error('contact')
                <span class="text-red-400">{{ $message }}</span>
                @enderror
            </div>
            <input type="text" name="email" id="email" placeholder="Enter Email">
            <div class="mb-5">
                <label for="date_time" class="mb-3 block text-base font-medium text-[#07074D]">
                    Date Time
                </label>
                <input type="datetime-local" name="date_time" id="date_time" placeholder="Enter Date and Time"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                @error('date_time')
                <span class="text-red-400">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-5">
                <label for="type" class="mb-3 block text-base font-medium text-[#07074D]">
                    Type
                </label>
                <select name="type" id="type"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                    <option value="">Select Option</option>
                    <option value="email">Email</option>
                    <option value="sms">SMS</option>
                    <option value="meeting">Meeting</option>
                </select>
                @error('type')
                <span class="text-red-400">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="status" class="mb-3 block text-base font-medium text-[#07074D]">
                    Select Status
                </label>
                <select name="status" id="status"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                    <option value="">Select Option</option>
                    <option value="pending">Pending</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>


                </select>

                @error('type')
                <span class="text-red-400">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-5">
                <label for="notification_type" class="mb-3 block text-base font-medium text-[#07074D]">
                    Notification Type
                </label>
                <select name="notification_type" id="notification_type"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                    <option value="">Please Select</option>
                    <option value="email">Email</option>
                    <option value="sms">SMS</option>
                    <option value="popup">Popup</option>
                </select>
                @error('status')
                <span class="text-red-400">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <button
                    class="hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">
                    Add Contact

                </button>
            </div>
        </form>
    </div>
</div>
@endsection