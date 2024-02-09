<table class="min-w-full">
    <thead class="bg-gray-50 dark:bg-gray-700">
        <tr>
            <th scope="col"
                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                Name
            </th>
            <th scope="col"
                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                Email
            </th>
            <th scope="col"
                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                Date
            </th>
            <th scope="col"
                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                Table
            </th>
            <th scope="col"
                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                Guests
            </th>
            <th scope="col" class="relative py-3 px-6">
                <span class="sr-only">Edit</span>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reservations as $reservation)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td
                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $reservation->first_name }} {{ $reservation->last_name }}
                </td>
                <td
                    class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                    {{ $reservation->email }}
                </td>
                <td
                    class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                    {{ $reservation->res_data }}
                </td>
                <td
                    class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                    {{ $reservation->table->name }}
                </td>
                <td
                    class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                    {{ $reservation->guet_number }}
                </td>
                <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                    <div class="flex space-x-2">
                        <a href="#"
                        wire:click.prevent="$dispatch('servicUpdate', { id: {{ $item->id }} })"
                            class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg  text-white">Edit</a>
                            
                       
                    </div>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>