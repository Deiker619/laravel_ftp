<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="">
        <form class="grid grid-cols-4 justify-center items-center gap-4">
            <flux:input label="Servidor" wire:model='data_connection.host' />
            <flux:input label="Username" wire:model='data_connection.user' />
            <flux:input label="Password" wire:model='data_connection.password' />
            <flux:input label="Port" wire:model='data_connection.port' />
            <flux:select wire:model='data_connection.ssl' placeholder="Select FTP or FTPS  ...">
                <flux:select.option value=true>
                    <div class="flex items-center gap-2">
                        <flux:icon.shield-check variant="mini" class="text-zinc-400" /> True
                    </div>
                </flux:select.option>

                <flux:select.option value=false>
                    <div class="flex items-center gap-2">
                        <flux:icon.key variant="mini" class="text-zinc-400" /> False
                    </div>
                </flux:select.option>



            </flux:select>
            <flux:button variant="primary" wire:click='run'>Sincronize with FTP</flux:button>
        </form>
    </div>
    <div class="flex flex-col mt-4">


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Type
                        </th>
                        <th scope="col" class="px-6 py-3">
                            size
                        </th>
                        <th scope="col" class="px-6 py-3">
                            origin
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($archivos as $archivo)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $archivo['name'] }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $archivo['type'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $archivo['size'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $data_connection['host'] }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="#"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
</div>
