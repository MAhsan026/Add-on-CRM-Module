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
        <form action="{{ route('contact.update', $contact->id) }} " method="POST">
            @csrf
            <div class="mb-5">
                <label for="first_name" class="mb-3 block text-base font-medium text-[#07074D]">
                    First Name
                </label>
                <input type="text" name="first_name" id="fitst_name" placeholder="First Name"
                    value="{{ $contact->first_name }}"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                @error('first_name')
                <span class="text-red-400">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-5">
                <label for="last_name" class="mb-3 block text-base font-medium text-[#07074D]">
                    Last Name
                </label>
                <input type="text" name="last_name" id="last_name" placeholder="Last Name"
                    value="{{ $contact->last_name }}"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                @error('last_name')
                <span class="text-red-400">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-5">
                <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                    Email Address
                </label>
                <input type="email" name="email" id="email" placeholder="Enter your email" value="{{ $contact->email }}"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                @error('email')
                <span class="text-red-400">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-5">
                <label for="phone" class="mb-3 block text-base font-medium text-[#07074D]">
                    Phone Number
                </label>
                <input type="text" name="phone" id="phone" placeholder="Enter your phone number"
                    value="{{ $contact->phone }}"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                @error('phone')
                <span class="text-red-400">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="contact_type" class="mb-3 block text-base font-medium text-[#07074D]">
                    Select Type
                </label>
                <select name="type" id="type"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                    <option value="">Select Option</option>
                    @foreach ($type as $type)
                    <option value="{{ $type->id }}" {{ $type->id == $contact->contact_type_id ? 'selected' : '' }}>{{
                        $type->name }}</option>

                    @endforeach
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
                    <option value="">Please Select</option>
                    <option value="pending" {{ ($contact->status === 'pending') ? 'selected' : '' }}>Pending</option>
                    <option value="accepted" {{ ($contact->status === 'accepted') ? 'selected' : '' }}>Accepted</option>
                </select>

                @error('status')
                <span class="text-red-400">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <button type="submit"
                    class="hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">
                    Update Contact

                </button>
            </div>
        </form>
    </div>
</div>
@endsection