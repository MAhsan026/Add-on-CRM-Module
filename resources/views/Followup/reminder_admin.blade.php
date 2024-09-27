@extends('Layout.index')
@section('content')
<div class="bg-white shadow-md rounded-lg p-6 mt-4">
    <h2 class="text-xl font-semibold mb-4">Reminders for Admin</h2>

    <!-- On Create -->
    <div class="flex items-center mb-4">
        <div class="w-1/4">
            <div class="flex items-center">
                <input type="checkbox" name="reminder_type" id="on_create" value="on_create" class="mr-2"
                    onchange="toggleCheckbox('on_create')">
                <label for="on_create" class="text-sm">On Create</label>
            </div>
            <span class="text-xs text-gray-500">Instantly after creation</span>
        </div>
        <div class="w-2/3 px-4">
            <p class="bg-blue-100 text-sm p-2 rounded">Notification is sent to the admin assigned to the contact
                immediately when a follow-up is created.</p>
        </div>
        <div class="w-1/4 flex justify-end">
            <button id="email_on_create" onclick="toggleForm('email', 'on_create')"
                class="px-3 py-1 bg-green-500 text-white text-xs rounded" disabled>EMAIL</button>
        </div>
    </div>

    <!-- Follow-up Due Date -->
    <div class="flex items-center mb-4">
        <div class="w-1/4">
            <div class="flex items-center">
                <input type="checkbox" name="reminder_type" id="follow_up_due_date" value="follow_up_due_date"
                    class="mr-2" onchange="toggleCheckbox('follow_up_due_date')">
                <label for="follow_up_due_date" class="text-sm">Follow-up Due Date</label>
            </div>
            <span class="text-xs text-gray-500">6/15/2023 3:54:24 PM</span>
        </div>
        <div class="w-2/3 px-4">
            <p class="bg-blue-100 text-sm p-2 rounded">Notification is sent to the admin assigned to the contact on the
                set date.</p>
        </div>
        <div class="w-1/4 flex justify-end">
            <button id="email_follow_up_due_date" onclick="toggleForm('email', 'follow_up_due_date')"
                class="px-3 py-1 bg-green-500 text-white text-xs rounded" disabled>EMAIL</button>
        </div>
    </div>

    <!-- Before Follow-up Due Date -->
    <div class="flex items-center">
        <div class="w-1/4">
            <div class="flex items-center">
                <input type="checkbox" name="reminder_type" id="before_follow_up_due_date"
                    value="before_follow_up_due_date" class="mr-2"
                    onchange="toggleCheckbox('before_follow_up_due_date')">
                <label for="before_follow_up_due_date" class="text-sm">Before Follow-up Due Date</label>
            </div>
            <span class="text-xs text-gray-500">e.g. 2 hours before</span>
        </div>
        <div class="w-2/3 px-4">
            <p class="bg-blue-100 text-sm p-2 rounded">Specify time (date/hours/minutes, etc.) before the Follow-up Due
                Date to send notification to the admin assigned to the contact.</p>
        </div>
        <div class="w-1/4 flex justify-end">
            <button id="email_before_follow_up_due_date" onclick="toggleForm('email', 'before_follow_up_due_date')"
                class="px-3 py-1 bg-green-500 text-white text-xs rounded" disabled>EMAIL</button>
        </div>
    </div>
</div>
<div class="bg-white shadow-md rounded-lg p-6 mt-4">
    <h2 class="text-xl font-semibold mb-4">Reminders for Clients</h2>

    <!-- On Create -->
    <div class="flex items-center mb-4">
        <div class="w-1/4">
            <div class="flex items-center">
                <input type="checkbox" name="client_reminder_type" id="client_on_create" value="on_create" class="mr-2"
                    onchange="toggleClientCheckbox('client_on_create')">
                <label for="client_on_create" class="text-sm">On Create</label>
            </div>
            <span class="text-xs text-gray-500">Instantly after creation</span>
        </div>
        <div class="w-2/3 px-4">
            <p class="bg-blue-100 text-sm p-2 rounded">
                Notification is sent to the client immediately when a follow-up is created.
            </p>
        </div>
        <div class="w-1/4 flex justify-end">
            <button id="email_client_on_create" onclick="toggleClientForm('email', 'client_on_create')"
                class="px-3 py-1 bg-green-500 text-white text-xs rounded" disabled>EMAIL</button>
        </div>
    </div>

    <!-- Follow-up Due Date -->
    <div class="flex items-center mb-4">
        <div class="w-1/4">
            <div class="flex items-center">
                <input type="checkbox" name="client_reminder_type" id="client_follow_up_due_date"
                    value="follow_up_due_date" class="mr-2"
                    onchange="toggleClientCheckbox('client_follow_up_due_date')">
                <label for="client_follow_up_due_date" class="text-sm">Follow-up Due Date</label>
            </div>
            <span class="text-xs text-gray-500">6/15/2023 3:54:24 PM</span>
        </div>
        <div class="w-2/3 px-4">
            <p class="bg-blue-100 text-sm p-2 rounded">
                Notification is sent to the client on the set date.
            </p>
        </div>
        <div class="w-1/4 flex justify-end">
            <button id="email_client_follow_up_due_date"
                onclick="toggleClientForm('email', 'client_follow_up_due_date')"
                class="px-3 py-1 bg-green-500 text-white text-xs rounded" disabled>EMAIL</button>
        </div>
    </div>

    <!-- Before Follow-up Due Date -->
    <div class="flex items-center">
        <div class="w-1/4">
            <div class="flex items-center">
                <input type="checkbox" name="client_reminder_type" id="client_before_follow_up_due_date"
                    value="before_follow_up_due_date" class="mr-2"
                    onchange="toggleClientCheckbox('client_before_follow_up_due_date')">
                <label for="client_before_follow_up_due_date" class="text-sm">Before Follow-up Due Date</label>
            </div>
            <span class="text-xs text-gray-500">e.g. 2 hours before</span>
        </div>
        <div class="w-2/3 px-4">
            <p class="bg-blue-100 text-sm p-2 rounded">
                Specify time (date/hours/minutes, etc.) before the Follow-up Due Date to send notification to the
                client.
            </p>
        </div>
        <div class="w-1/4 flex justify-end">
            <button id="email_client_before_follow_up_due_date"
                onclick="toggleClientForm('email', 'client_before_follow_up_due_date')"
                class="px-3 py-1 bg-green-500 text-white text-xs rounded" disabled>EMAIL</button>
        </div>
    </div>
</div>


<!-- On Create Modal -->
<div id="onCreateModal" class="fixed mt-4 inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-xl max-w-md w-full">
        <h3 class="text-lg font-semibold mb-6 text-center">On Create Reminder</h3>

        <!-- Form -->
        <form id="onCreateForm" method="POST" action="{{ route('admin.email') }}">
            @csrf
            <input type="hidden" name="reminderType" value="on_create">

            <!-- Admin Select -->
            <div class="mb-4">
                <label for="admin" class="block text-sm font-medium text-gray-700">Admin</label>
                <select id="admin" name="admin"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Select Admin</option>
                    {{-- @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach --}}
                </select>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end mt-6">
                <button type="button" onclick="closeModal('onCreateModal')"
                    class="mr-3 px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 focus:outline-none">
                    Cancel
                </button>
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Send
                </button>
            </div>
        </form>
    </div>
</div>


<!-- Follow-up Due Date Modal -->
<div id="followUpDueDateModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-xl max-w-md w-full">
        <h3 class="text-lg font-semibold mb-6 text-center">Follow-up Due Date Reminder</h3>

        <!-- Form -->
        <form id="followUpDueDateForm" method="POST" action="{{ route('admin.email') }}">
            @csrf
            <input type="hidden" name="reminderType" value="follow_up_due_date">

            <!-- Admin Select -->
            <div class="mb-4">
                <label for="admin" class="block text-sm font-medium text-gray-700">Admin</label>
                <select id="admin" name="admin"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Select Admin</option>
                    {{-- @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach --}}
                </select>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end mt-6">
                <button type="button" onclick="closeModal('followUpDueDateModal')"
                    class="mr-3 px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 focus:outline-none">
                    Cancel
                </button>
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Send
                </button>
            </div>
        </form>
    </div>
</div>


<!-- Before Follow-up Due Date Modal -->
<div id="beforeFollowUpDueDateModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-xl max-w-md w-full">
        <h3 class="text-lg font-semibold mb-6 text-center">Before Follow-up Due Date Reminder</h3>

        <!-- Form -->
        <form id="beforeFollowUpDueDateForm" method="POST" action="{{ route('admin.email') }}">
            @csrf
            <input type="hidden" name="reminderType" value="before_follow_up_due_date">

            <!-- Admin Select -->
            <div class="mb-4">
                <label for="admin" class="block text-sm font-medium text-gray-700">Admin</label>
                <select id="admin" name="admin"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Select Admin</option>
                    {{-- @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach --}}
                </select>
            </div>

            <!-- Reminder Time -->
            <div class="mb-4">
                <label for="reminderTime" class="block text-sm font-medium text-gray-700">Reminder Time (hours
                    before)</label>
                <input type="datetime-local" id="reminder_date" name="reminder_date"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                    min="1" max="72">
            </div>

            <!-- Buttons -->
            <div class="flex justify-end mt-6">
                <button type="button" onclick="closeModal('beforeFollowUpDueDateModal')"
                    class="mr-3 px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 focus:outline-none">
                    Cancel
                </button>
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Send
                </button>
            </div>
        </form>
    </div>
</div>


<!-- Client On Create Modal -->
<div id="clientOnCreateModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-xl max-w-md w-full">
        <h3 class="text-lg font-semibold mb-6 text-center">Client On Create Reminder</h3>

        <!-- Form -->
        <form id="clientOnCreateForm" method="POST" action="{{ route('client.email') }}">
            @csrf
            <input type="hidden" name="reminderType" value="client_on_create">

            <!-- Client Select -->
            <div class="mb-4">
                <label for="client" class="block text-sm font-medium text-gray-700">Client</label>
                <select id="client" name="client"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Select Client</option>
                    {{-- @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                    @endforeach --}}
                </select>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end mt-6">
                <button type="button" onclick="closeClientModal('clientOnCreateModal')"
                    class="mr-3 px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 focus:outline-none">
                    Cancel
                </button>
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Send
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Client Follow-up Due Date Modal -->
<div id="clientFollowUpDueDateModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-xl max-w-md w-full">
        <h3 class="text-lg font-semibold mb-6 text-center">Client Follow-up Due Date Reminder</h3>

        <!-- Form -->
        <form id="clientFollowUpDueDateForm" method="POST" action="{{ route('client.email') }}">
            @csrf
            <input type="hidden" name="reminderType" value="client_follow_up_due_date">

            <!-- Client Select -->
            <div class="mb-4">
                <label for="client" class="block text-sm font-medium text-gray-700">Client</label>
                <select id="client" name="client"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Select Client</option>
                    {{-- @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                    @endforeach --}}
                </select>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end mt-6">
                <button type="button" onclick="closeClientModal('clientFollowUpDueDateModal')"
                    class="mr-3 px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 focus:outline-none">
                    Cancel
                </button>
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Send
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Client Before Follow-up Due Date Modal -->
<div id="clientBeforeFollowUpDueDateModal"
    class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-xl max-w-md w-full">
        <h3 class="text-lg font-semibold mb-6 text-center">Client Before Follow-up Due Date Reminder</h3>

        <!-- Form -->
        <form id="clientBeforeFollowUpDueDateForm" method="POST" action="{{ route('client.email') }}">
            @csrf
            <input type="hidden" name="reminderType" value="client_before_follow_up_due_date">

            <!-- Client Select -->
            <div class="mb-4">
                <label for="client" class="block text-sm font-medium text-gray-700">Client</label>
                <select id="client" name="client"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Select Client</option>
                    {{-- @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                    @endforeach --}}
                </select>
            </div>

            <!-- Reminder Time -->
            <div class="mb-4">
                <label for="clientReminderTime" class="block text-sm font-medium text-gray-700">Reminder Time (hours
                    before)</label>
                <input type="datetime-local" id="client_reminder_date" name="client_reminder_date"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                    min="1" max="72">
            </div>

            <!-- Buttons -->
            <div class="flex justify-end mt-6">
                <button type="button" onclick="closeClientModal('clientBeforeFollowUpDueDateModal')"
                    class="mr-3 px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 focus:outline-none">
                    Cancel
                </button>
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Send
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    const reminderTypes = ['on_create', 'follow_up_due_date', 'before_follow_up_due_date'];

    function toggleCheckbox(checkedType) {
        reminderTypes.forEach(type => {
            if (type !== checkedType) {
                document.getElementById(type).checked = false;
            }
        });
        toggleButtons();
    }

    function toggleButtons() {
        reminderTypes.forEach(type => {
            const checkbox = document.getElementById(type);
            const emailButton = document.getElementById(`email_${type}`);

            emailButton.disabled = !checkbox.checked;
            emailButton.style.opacity = checkbox.checked ? '1' : '0.5';
        });
    }

    function showModal(modalId) {
        document.getElementById(modalId).classList.remove('hidden');
        document.getElementById(modalId).classList.add('flex');
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
        document.getElementById(modalId).classList.remove('flex');
    }

    function toggleForm(communicationType, reminderType) {
        if (document.getElementById(reminderType).checked) {
            if (communicationType === 'email') {
                let modalId;
                switch (reminderType) {
                    case 'on_create':
                        modalId = 'onCreateModal';
                        break;
                    case 'follow_up_due_date':
                        modalId = 'followUpDueDateModal';
                        break;
                    case 'before_follow_up_due_date':
                        modalId = 'beforeFollowUpDueDateModal';
                        break;
                }
                showModal(modalId);
            }
        }
    }

    const clientReminderTypes = ['client_on_create', 'client_follow_up_due_date', 'client_before_follow_up_due_date'];

    function toggleClientCheckbox(checkedType) {
        clientReminderTypes.forEach(type => {
            if (type !== checkedType) {
                document.getElementById(type).checked = false;
            }
        });
        toggleClientButtons();
    }

    function toggleClientButtons() {
        clientReminderTypes.forEach(type => {
            const checkbox = document.getElementById(type);
            const emailButton = document.getElementById(`email_${type}`);

            emailButton.disabled = !checkbox.checked;
            emailButton.style.opacity = checkbox.checked ? '1' : '0.5';
        });
    }

    function showClientModal(modalId) {
        document.getElementById(modalId).classList.remove('hidden');
        document.getElementById(modalId).classList.add('flex');
    }

    function closeClientModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
        document.getElementById(modalId).classList.remove('flex');
    }

    function toggleClientForm(communicationType, reminderType) {
        if (document.getElementById(reminderType).checked) {
            if (communicationType === 'email') {
                let modalId;
                switch (reminderType) {
                    case 'client_on_create':
                        modalId = 'clientOnCreateModal';
                        break;
                    case 'client_follow_up_due_date':
                        modalId = 'clientFollowUpDueDateModal';
                        break;
                    case 'client_before_follow_up_due_date':
                        modalId = 'clientBeforeFollowUpDueDateModal';
                        break;
                }
                showClientModal(modalId);
            }
        }
    }

    // Initialize button states on page load
    document.addEventListener('DOMContentLoaded', function() {
        toggleButtons();
        toggleClientButtons();
    });
</script>

@endsection