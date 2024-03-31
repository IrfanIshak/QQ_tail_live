<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-6">
                <div class="flex">
                    <div class="flex-1">
                        Companies
                    </div>
                    <div class="flex-1 flex justify-end">
                        <button wire:click="logout" class="ml-auto bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded">
                            Logout
                        </button>
                    </div>
                </div>
                @if (session()->has('success'))
                        <div class="bg-green-200 text-green-800 border border-green-400 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Success!</strong>
                            <span class="block sm:inline">{{ session()->get('success') }}</span>
                        </div>
                @endif
                <div class="my-5 flex justify-start  items-center">
                    <a href="{{ route('add') }}" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded">
                        Add New Company
                    </a>
                </div>
                <hr>
                <div id="companyTable_wrapper" class="dt-container dt-tailwindcss dt-empty-footer">
                    <div class="grid grid-cols-2 gap-4 mb-4 mt-4">
                        <div class="justify-self-start ">
                            <div class="dt-length">
                                <select wire:model.live.debounce.300ms="page"  class="border px-3 py-2 rounded-lg border-gray-200 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 " id="dt-length-0">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                <label for="dt-length-0"> entries per page</label>
                            </div>
                        </div>
                        <div class="col-start-2 justify-self-end ">
                            <div class="dt-search">
                                <label for="dt-search-0">Search:</label>
                                <input wire:model.live="search" type="search" class="border placeholder-gray-500 ml-2 px-3 py-2 rounded-lg border-gray-200 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 " id="dt-search-0" placeholder="" aria-controls="companyTable">
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-4 mb-4">
                        <div class="overflow-y-auto max-h-[300px]">
                            <table id="companyTable" class="table-auto dataTable min-w-full text-sm align-middle whitespace-nowrap" aria-describedby="companyTable_info" style="width: 560.217px;">
                                        <colgroup>
                                            <col style="width: 103.633px;">
                                            <col style="width: 140.25px;">
                                            <col style="width: 178.55px;">
                                            <col style="width: 137.783px;">
                                        </colgroup>
                                <thead>
                                    <tr class="border-b border-gray-100 " role="row">
                                        <th data-dt-column="0" wire:click="sorting('name')" class="px-3 py-4 text-gray-900 bg-gray-100/75 font-semibold text-left " rowspan="1" colspan="1" tabindex="0">
                                            <x-datatable-sort :sortCol="$sortCol" :sortDir="$sortDir" thName="name"/>
                                        </th>
                                        <th data-dt-column="1" wire:click="sorting('email')" class="px-3 py-4 text-gray-900 bg-gray-100/75 font-semibold text-left " rowspan="1" colspan="1"  tabindex="0">
                                            <x-datatable-sort :sortCol="$sortCol" :sortDir="$sortDir" thName="email"/>
                                        </th>
                                        <th data-dt-column="2" wire:click="sorting('website')" class="px-3 py-4 text-gray-900 bg-gray-100/75 font-semibold text-left " rowspan="1" colspan="1"  tabindex="0">
                                            <x-datatable-sort :sortCol="$sortCol" :sortDir="$sortDir" thName="website"/>
                                        </th>
                                        <th data-dt-column="3" class="px-3 py-4 text-gray-900 bg-gray-100/75 font-semibold text-left dt-orderable-asc dt-orderable-desc" rowspan="1" colspan="1"  tabindex="0">
                                            <span class="dt-column-title" role="button">Action</span>
                                            <span class="dt-column-order"></span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($companies as $company)
                                        <tr class="even:bg-gray-50 dark:even:bg-gray-900/50">
                                                <td class="p-3 sorting_1">
                                                    <div class="flex items-center">
                                                        @if ($company->logo)
                                                            <img class="rounded w-10 h-10 mr-4" src="{{ asset($company->logo) }}" alt="Company Logo">
                                                        @endif
                                                        <div>{{ $company->name }}</div>
                                                    </div>
                                                </td>
                                                <td class="p-3">{{ $company->email }}</td>
                                                <td class="p-3">{{ $company->website }}</td>
                                                <td class="p-3">
                                                    <a href="{{ route('edit',$company->id) }}" class="bg-purple-500 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded"> Edit</a>
                                                    <button wire:click="delete({{ $company->id }})"  class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded"> Delete </Button>
                                                </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                            <div class="mt-2">
                                {{ $companies->links() }}
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mb-4">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

